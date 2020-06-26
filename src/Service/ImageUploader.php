<?php

namespace App\Service;

use Symfony\Component\HttpFoundation\File\UploadedFile;

class ImageUploader 
{


    public function saveAndMoveFile (?UploadedFile $file,?string $directory = null)
    {
        if ($file === null) {
            return null;
        }

        $newFilename = $this->getNewFileName($file->guessExtension());

        if ($directory === null) {
            $directory = $_ENV['IMAGES_DIR'];
        }

        $file->move($directory, $newFilename);
        return $newFilename;
    }
    public function getNewFileName($extension)
    {
        return preg_replace('/[+=\/]/', random_int(0, 9), base64_encode(random_bytes(6))).'.'.$extension;
    }
}