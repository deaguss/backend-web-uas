<?php

namespace App\Utils;

class UploadImg
{
    public static function data($file)
    {
        if ($file['error'] === UPLOAD_ERR_OK) {
            $allowedTypes = ['image/jpeg', 'image/png', 'image/jpg'];
            if (in_array($file['type'], $allowedTypes)) {
                $fileName = uniqid() . '_' . $file['name'];
                $uploadPath = __DIR__ . '/../../public/assets/menu/' . $fileName;

                move_uploaded_file($file['tmp_name'], $uploadPath);
                return $fileName;
            } else {
                $_SESSION['error'] = [
                    'title' => "Image upload failed.",
                    'message' => "The image type is not allowed."
                ];
                return false;
            }
        } else {
            $_SESSION['error'] = [
                'title' => "Image upload failed.",
                'message' => "An error occurred while uploading the image."
            ];
        }
    }
}