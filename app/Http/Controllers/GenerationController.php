<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Log;

class GenerationController extends Controller
{
    
    // Retrieve UserInput record by ID with enhanced error handling
     
    private function getUserInputById($id)
    {
        $userInput = DB::table('user_input')
            ->where('id', $id)
            ->first();

        if (!$userInput) {
            throw new \Exception("UserInput with ID {$id} not found.");
        }

        return $userInput;
    }



    /**
     * Retrieve components with advanced filtering and validation
     *
     * @param int $userInputId
     * @return \Illuminate\Support\Collection
     * @throws \Exception
     */
    private function getComponentsByUserInputId($userInputId)
    {
        $components = DB::table('component_content')
            ->join('component', 'component_content.component_id', '=', 'component.id')
            ->where('component_content.userInput_id', $userInputId)
            ->select(
                'component.id as component_id',
                'component.name as component_name',
                'component.htmlStructure',
                'component.cssStyle',
                'component_content.content as component_content'
            )
            ->get();

        if ($components->isEmpty()) {
            throw new \Exception('No components found for the given UserInput.');
        }

        return $components;
    }

    /**
     * Advanced content injection with more robust replacement
     */
    private function injectContentIntoHtml($htmlStructure, $contentData)
    {
        try {
            $contentData = json_decode($contentData, true, 512, JSON_THROW_ON_ERROR);

            foreach ($contentData as $key => $value) {
                $placeholder = "{{" . preg_quote($key, '/') . "}}";

                if ($key === 'contact_fields' && is_array($value)) {
                    // Specialized handling for dynamic form fields
                    $replacement = $this->generateFormFields($value);
                } elseif ($key === 'footer_links' && is_array($value)) {
                    // Handling for footer links
                    $replacement = $this->generateFooterLinks($value);
                } elseif (is_array($value)) {
                    // Advanced array handling (e.g., menu items, list items)
                    $replacement = $this->generateArrayReplacement($value, $key);
                } elseif (Str::contains($key, ['image', 'src', 'url'])) {
                    // Special handling for image/URL placeholders
                    $replacement = htmlspecialchars($value);
                } else {
                    // General content replacement
                    $replacement = htmlspecialchars($value);
                }

                // Replace placeholders in the HTML structure
                $htmlStructure = preg_replace("/{$placeholder}/", $replacement, $htmlStructure);
            }

            return $htmlStructure;
        } catch (\JsonException $e) {
            Log::error('JSON Parsing Error: ' . $e->getMessage());
            return $htmlStructure;
        }
    }

    /**
     * Generate HTML for footer links
     *
     * @param array $links
     * @return string
     */
    private function generateFooterLinks($links)
    {
        $html = '';

        foreach ($links as $link) {
            $text = htmlspecialchars($link['text'] ?? '');
            $url = htmlspecialchars($link['url'] ?? '#');

            $html .= <<<HTML
<li>
    <a class="text-blueGray-600 hover:text-blueGray-800 font-semibold block pb-2 text-sm" href="{$url}">{$text}</a>
</li>
HTML;
        }

        return <<<HTML
<ul class="list-unstyled">{$html}
</ul>
HTML;
    }



    private function generateFormFields($fields)
    {
        $formHtml = '';

        foreach ($fields as $field) {
            $label = htmlspecialchars($field['label'] ?? '');
            $type = htmlspecialchars($field['type'] ?? 'text');
            $name = Str::slug($label, '_');

            if ($type === 'textarea') {
                $formHtml .= <<<HTML
<div class="form-group">
    <label for="{$name}">{$label}</label>
    <textarea id="{$name}" name="{$name}" rows="5" placeholder="Enter your {$label}" required></textarea>
</div>
HTML;
            } else {
                $formHtml .= <<<HTML
<div class="form-group">
    <label for="{$name}">{$label}</label>
    <input type="{$type}" id="{$name}" name="{$name}" placeholder="Enter your {$label}" required />
</div>
HTML;
            }
        }

        return $formHtml;
    }


    /**
     * Generate replacement for array-type content
     *
     * @param array $items
     * @param string $key
     * @return string
     */
    private function generateArrayReplacement($items, $key)
    {
        // If items is not an array, return it as a string
        if (!is_array($items)) {
            return htmlspecialchars((string) $items);
        }

        // If key is 'menu_items', generate nav links
        if ($key === 'menu_items') {
            $result = '';
            foreach ($items as $item) {
                // If the item is an array or an object, we need a nested loop or a recursive call
                if (is_array($item) || is_object($item)) {
                    $result .= $this->generateArrayReplacement($item, $key); // Recursive call for nested structures
                } else {
                    $result .= "<a href='#' class='nav-link'>" . htmlspecialchars((string) $item) . "</a>";
                }
            }
            return $result;
        }

        // For other array types, escape each item
        $result = '';
        foreach ($items as $item) {
            // If the item is an array or an object, we need a nested loop or a recursive call
            if (is_array($item) || is_object($item)) {
                $result .= $this->generateArrayReplacement($item, $key); // Recursive call for nested structures
            } else {
                $result .= htmlspecialchars((string) $item); // Escape and add to result
            }
        }

        return $result;
    }

    /**
     * Comprehensive template rendering with download support
     *
     * @param bool $forceDownload Optional flag to control download behavior
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function renderTemplateWithComponents($forceDownload = true)
    {
        try {
            // Fetch necessary data
            $templatesController = new TemplatesController();
            $userInputId = $templatesController->getUserInputId();
            $userInput = $this->getUserInputById($userInputId);

            if (!$userInput->template_id) {
                throw new \Exception('No template associated with this UserInput.');
            }

            $templateDetails = $this->getTemplateDetails($userInput->template_id);
            $components = $this->getComponentsByUserInputId($userInputId);

            // Render components
            $renderedComponents = $components->map(function ($component) {
                return [
                    'component_id' => $component->component_id,
                    'component_name' => $component->component_name,
                    'html' => $this->injectContentIntoHtml($component->htmlStructure, $component->component_content),
                    'css' => $component->cssStyle,
                ];
            });

            // Generate complete HTML
            $htmlOutput = $this->generateFullHtmlDocument($renderedComponents, $templateDetails);

            // Generate filename
            $filename = $this->generateDownloadFilename($templateDetails);

            // If forceDownload is true, return a download response
            if ($forceDownload) {
                return response($htmlOutput, 200, [
                    'Content-Type' => 'text/html',
                    'Content-Disposition' => "attachment; filename=\"{$filename}\""
                ]);
            }

            // If not forcing download, return a view response or the HTML content
            return response($htmlOutput);
        } catch (\Exception $e) {
            Log::error('Template Rendering Error: ' . $e->getMessage());

            // Return error response
            return response()->json([
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
            ], 500);
        }
    }

    /**
     * Generate a complete HTML document
     *
     * @param \Illuminate\Support\Collection $components
     * @param object $templateDetails
     * @return string
     */
    private function generateFullHtmlDocument($components, $templateDetails)
    {
        // Safely handle CSS collection
        $cssCollection = $components->pluck('css')
            ->filter(function ($css) {
                return !empty(trim($css));
            })
            ->unique()
            ->values();
        $cssStyles = $cssCollection->count() > 0
            ? $cssCollection->implode("\n")
            : '/* No custom styles */';

        // Safely handle body content
        $bodyContent = $components->pluck('html')
            ->filter()
            ->implode("\n");

        // Use heredoc with proper escaping
        $title = htmlspecialchars($templateDetails->name ?? 'Rendered Template');

        return <<<HTML
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link
            href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
            rel="stylesheet"
    />
    <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
    />
 <link href="https://cdn.tailwindcss.com" rel="stylesheet">
    <title>{$title}</title>
    <style>
        /* Reset and Base Styles */
        :root {
        --primary-color: #2563eb;
        --primary-dark: #1d4ed8;
        --text-color: #1f2937;
        --bg-light: #f3f4f6;
        --spacing-unit: 1rem;
      }
        * { box-sizing: border-box; margin: 0; padding: 0; }
        body { font-family: Arial, sans-serif; line-height: 1.6; }
        
        {$cssStyles}
    </style>
</head>
<body>
<link rel="stylesheet" href="https://demos.creative-tim.com/notus-js/assets/styles/tailwind.css">
<link rel="stylesheet" href="https://demos.creative-tim.com/notus-js/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css">
    {$bodyContent}
</body>
</html>
HTML;
    }

    /**
     * Generate a unique filename for download
     *
     * @param object $templateDetails
     * @return string
     */
    private function generateDownloadFilename($templateDetails)
    {
        return Str::slug($templateDetails->name ?? 'template') .
            '_' .
            now()->format('YmdHis') .
            '.html';
    }
}
