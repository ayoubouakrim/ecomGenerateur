<?php

namespace App\Service;

//class TemplateService
//{
//    public function getTemplatePath($templateName)
//    {
//        return public_path("templateso/original/{$templateName}");
//    }
//    public function saveModifiedTemplate($templateName, $content)
//    {
//        $modifiedPath = storage_path("templateso/modified/{$templateName}");
//        file_put_contents($modifiedPath, $content);
//    }
//    public function createZip($templateName)
//    {
//        $zip = new \ZipArchive();
//        $zipFileName = storage_path("templateso/modified/{$templateName}.zip");
//        $zip->open($zipFileName, \ZipArchive::CREATE | \ZipArchive::OVERWRITE);
//
//        $modifiedPath = storage_path("templateso/modified/{$templateName}");
//        $zip->addFile($modifiedPath, $templateName);
//
//        $zip->close();
//
//        return $zipFileName;
//    }
//}
class TemplateService
{
    public function getTemplatePath($templateName)
    {

        // Pour la prévisualisation, vous pouvez utiliser le dossier original
        return public_path("templatesss\original\{$templateName}");
    }

    public function saveModifiedTemplate($templateName, $content)
    {
        // Sauvegarde dans storage pour protéger l’original
        $modifiedDir = storage_path("templateso\modified");
        if (!file_exists($modifiedDir)) {
            mkdir($modifiedDir, 0755, true);
        }
        $modifiedPath = $modifiedDir . "/{$templateName}";
        file_put_contents($modifiedPath, $content);
    }

    public function createZip($templateName)
    {
        $zip = new \ZipArchive();
        $modifiedDir = storage_path("templateso/modified");
        $zipFileName = $modifiedDir . "/{$templateName}.zip";
        if ($zip->open($zipFileName, \ZipArchive::CREATE | \ZipArchive::OVERWRITE) !== true) {
            throw new \Exception("Impossible d'ouvrir le fichier zip.");
        }

        $modifiedPath = $modifiedDir . "/{$templateName}";
        if (file_exists($modifiedPath)) {
            $zip->addFile($modifiedPath, $templateName);
        } else {
            throw new \Exception("Le fichier modifié n'existe pas.");
        }

        $zip->close();

        return $zipFileName;
    }
}
