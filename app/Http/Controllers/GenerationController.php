<?php

namespace App\Http\Controllers;

use App\Models\Type;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use App\Models\UserInput;

class GenerationController extends Controller
{

    // Retrieve UserInput record by ID with enhanced error handling     
    public function getUserInputId()
    {
        $siteName = Session::get('siteName', 'Default Site Name');

        $userInput = UserInput::where('id', 16)->first();

        if (!$userInput) {
            throw new \Exception("UserInput with siteName {$siteName} not found.");
        }

        return $userInput;
    }



    // Retrieve components with advanced filtering and validation    
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
                'component.type_id',
                'component_content.content as component_content'
            )
            ->get();

            

        if ($components->isEmpty()) {
            throw new \Exception('No components found for the given UserInput.');
        }

        return $components;
    }


    // Advanced content injection with more robust replacement
    private function injectContentIntoHtml($htmlStructure, $contentData, $componentType)
    {
        try {
            $contentData = json_decode($contentData, true, 512, JSON_THROW_ON_ERROR);
            $logo_path = $this->getLogoPath();

            // Call specific injection method based on component type
            switch ($componentType) {
                case 1:
                    return $this->injectNavbarContent($htmlStructure, $contentData, $logo_path);
                case 4:
                    return $this->injectContactFormContent($htmlStructure, $contentData);
                case 2:
                    return $this->injectHeroContent($htmlStructure, $contentData);
                case 3:
                    return $this->injectFeaturesContent($htmlStructure, $contentData);
                default:
                    return $this->injectFooterContent($htmlStructure, $contentData);
            }
        } catch (\JsonException $e) {
            Log::error('JSON Parsing Error: ' . $e->getMessage());
            return $htmlStructure;
        }
    }

    public function injectNavbarContent($htmlStructure, $contentData, $logo_path)
    {
        $htmlStructure = str_replace('{{website_name}}', htmlspecialchars($contentData['website_name'] ?? 'Brand Name'), $htmlStructure);
        $htmlStructure = str_replace('{{logo_path}}', htmlspecialchars($logo_path), $htmlStructure);
        $htmlStructure = str_replace('{{menu_item_1}}', htmlspecialchars($contentData['menu_item_1'] ?? 'Home'), $htmlStructure);
        $htmlStructure = str_replace('{{menu_item_2}}', htmlspecialchars($contentData['menu_item_2'] ?? 'Features'), $htmlStructure);
        $htmlStructure = str_replace('{{menu_item_3}}', htmlspecialchars($contentData['menu_item_3'] ?? 'Contact'), $htmlStructure);
        $htmlStructure = str_replace('{{menu_item_4}}', htmlspecialchars($contentData['menu_item_4'] ?? 'About'), $htmlStructure);

        return $htmlStructure;
    }

    public function injectHeroContent($htmlStructure, $contentData)
    {
        $htmlStructure = str_replace('{{hero_title}}', htmlspecialchars($contentData['hero_title'] ?? 'Hero Title'), $htmlStructure);
        $htmlStructure = str_replace('{{hero_subtitle}}', htmlspecialchars($contentData['hero_subtitle'] ?? 'Hero Subtitle'), $htmlStructure);
        $htmlStructure = str_replace('{{hero_cta_text}}', htmlspecialchars($contentData['hero_cta_text'] ?? 'Get Started'), $htmlStructure);
        $htmlStructure = str_replace('{{hero_cta_url}}', htmlspecialchars($contentData['hero_cta_url'] ?? '#'), $htmlStructure);

        return $htmlStructure;
    }

    public function injectFeaturesContent($htmlStructure, $contentData)
    {
        $htmlStructure = str_replace('{{section_title}}', htmlspecialchars($contentData['section_title'] ?? 'Features'), $htmlStructure);
        $htmlStructure = str_replace('{{feature_1_title}}', htmlspecialchars($contentData['feature_1_title'] ?? 'Feature 1'), $htmlStructure);
        $htmlStructure = str_replace('{{feature_1_desc}}', htmlspecialchars($contentData['feature_1_description'] ?? 'Feature 1 Description'), $htmlStructure);
        $htmlStructure = str_replace('{{feature_2_title}}', htmlspecialchars($contentData['feature_2_title'] ?? 'Feature 2'), $htmlStructure);
        $htmlStructure = str_replace('{{feature_2_desc}}', htmlspecialchars($contentData['feature_2_description'] ?? 'Feature 2 Description'), $htmlStructure);
        $htmlStructure = str_replace('{{feature_3_title}}', htmlspecialchars($contentData['feature_3_title'] ?? 'Feature 3'), $htmlStructure);
        $htmlStructure = str_replace('{{feature_3_desc}}', htmlspecialchars($contentData['feature_3_description'] ?? 'Feature 3 Description'), $htmlStructure);

        return $htmlStructure;
    }

    public function injectContactFormContent($htmlStructure, $contentData)
    {
        $htmlStructure = str_replace('{{form_title}}', htmlspecialchars($contentData['form_title'] ?? 'Contact Us'), $htmlStructure);
        $htmlStructure = str_replace('{{contact_field_1_label}}', htmlspecialchars($contentData['contact_field_1_label'] ?? 'Full Name'), $htmlStructure);
        $htmlStructure = str_replace('{{contact_field_1_type}}', htmlspecialchars($contentData['contact_field_1_type'] ?? 'text'), $htmlStructure);
        $htmlStructure = str_replace('{{contact_field_2_label}}', htmlspecialchars($contentData['contact_field_2_label'] ?? 'Email'), $htmlStructure);
        $htmlStructure = str_replace('{{contact_field_2_type}}', htmlspecialchars($contentData['contact_field_2_type'] ?? 'email'), $htmlStructure);
        $htmlStructure = str_replace('{{contact_field_3_label}}', htmlspecialchars($contentData['contact_field_3_label'] ?? 'Message'), $htmlStructure);

        return $htmlStructure;
    }

    public function injectFooterContent($htmlStructure, $contentData)
    {
        $htmlStructure = str_replace('{{footer_text}}', htmlspecialchars($contentData['footer_text'] ?? '© 2021 Company Name'), $htmlStructure);
        $htmlStructure = str_replace('{{facebook_url}}', htmlspecialchars($contentData['facebook_link_url'] ?? '#'), $htmlStructure);
        $htmlStructure = str_replace('{{youtube_url}}', htmlspecialchars($contentData['youtube_link_url'] ?? '#'), $htmlStructure);
        $htmlStructure = str_replace('{{x_url}}', htmlspecialchars($contentData['x_link_url'] ?? '#'), $htmlStructure);

        $htmlStructure = str_replace('{{product_1_name}}', htmlspecialchars($contentData['product_1_name'] ?? 'Product 1'), $htmlStructure);
        $htmlStructure = str_replace('{{product_1_url}}', htmlspecialchars($contentData['product_link_3_url'] ?? '#'), $htmlStructure);
        $htmlStructure = str_replace('{{product_2_name}}', htmlspecialchars($contentData['product_2_name'] ?? 'Product 2'), $htmlStructure);
        $htmlStructure = str_replace('{{product_2_url}}', htmlspecialchars($contentData['product_link_2_url'] ?? '#'), $htmlStructure);
        $htmlStructure = str_replace('{{product_3_name}}', htmlspecialchars($contentData['product_3_name'] ?? 'Product 3'), $htmlStructure);
        $htmlStructure = str_replace('{{product_3_url}}', htmlspecialchars($contentData['product_link_3_url'] ?? '#'), $htmlStructure);

        return $htmlStructure;
    }

    public function getLogoPath()
    {
        $userInput = $this->getUserInputId();
        $logoPath = $userInput->logoUrl ?? '/path/to/default/logo.png';

        return $logoPath;
    }



    // Comprehensive template rendering with download support
    public function renderTemplateWithComponents($forceDownload = true)
    {
        try {

            $userInput = $this->getUserInputId();


            $components = $this->getComponentsByUserInputId($userInput->id);


            $renderedComponents = $components->map(function ($component) {
                return [
                    'component_id' => $component->component_id,
                    'component_name' => $component->component_name,
                    'html' => $this->injectContentIntoHtml($component->htmlStructure, $component->component_content, $component->type_id),
                    'css' => $component->cssStyle,
                ];
            });

            // Generate complete HTML
            $htmlOutput = $this->generateFullHtmlDocument($renderedComponents, $userInput);

            // Generate filename
            $filename = $this->generateDownloadFilename();

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














    // Generate a complete HTML document
    private function generateFullHtmlDocument($components, $userInput)
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
        $title = $userInput->siteName ?? 'Generated Site';
        $nav_color = $userInput->color1 ?? '#2563eb';
        $hero_color = $userInput->color2 ?? '#2563eb';
        $texto_color = $userInput->color3 ?? '#2563eb';
        $favicon_path = $userInput->faveIcon ?? '/path/to/default/favicon.ico';
        $logo_path = $userInput->logoUrl ?? '/path/to/default/logo.png';
        $description = $userInput->description ?? 'Default description for the site.';
        return <<<HTML
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{$favicon_path}" type="image/x-icon">
    <link rel="apple-touch-icon" href="{$favicon_path}">

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />

    <link href="https://cdn.tailwindcss.com" rel="stylesheet">
    <title>{$title}</title>
    <style>
        /* Reset and Base Styles */
        :root {
        --navfooter-color: $nav_color;
        --hero-color: $hero_color;
        --texto-color: $texto_color;
        --primary-color: #2563eb;
        --primary-dark: #1d4ed8;
        --text-color: #1f2937;
        --bg-light: #f3f4f6;
        --spacing-unit: 1rem;
        --gradient: linear-gradient(135deg, #2563eb 0%, #7c3aed 100%);
        --custom_gradient: linear-gradient(135deg, #2563eb 0%, $hero_color 100%);
        --text-dark: #1f2937;
        --text-light: #f9fafb;
        --spacing: 2rem;
      }
      * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: "Poppins", sans-serif;
    }
        
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
    private function generateDownloadFilename()
    {
        return Str::slug('template') .
            '_' .
            now()->format('YmdHis') .
            '.html';
    }
}
