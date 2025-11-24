<?php
namespace BitApps\WPValidator\Rules;

use BitApps\WPValidator\Helpers;
use BitApps\WPValidator\Rule;

class ImageRule extends Rule
{
    use Helpers;

    protected $message = "The :attribute must be an image";

    public function validate($value)
    {
        if ($this->isEmpty($value)) {
            return false;
        }

        $fileInfo = $this->getFileInfo($value);
        if (!$fileInfo) {
            return false;
        }

        $fileType = $fileInfo['type'];
        $fileName = $fileInfo['name'];

        $allowedImageTypes = wp_get_image_mime_types();

        if (in_array($fileType, $allowedImageTypes, true)) {
            return true;
        }

        $wpFileType = wp_check_filetype($fileName);
        if ($wpFileType && isset($wpFileType['type'])) {
            if (in_array($wpFileType['type'], $allowedImageTypes, true)) {
                return true;
            }
        }

        return false;
    }

    private function getFileInfo($value)
    {
        // Handle attachment ID
        if (is_numeric($value)) {
            $attachmentId = (int) $value;
            $filePath = get_attached_file($attachmentId);
            if (empty($filePath) || !file_exists($filePath)) {
                return null;
            }

            $wpFileType = wp_check_filetype(basename($filePath));
            return [
                'name' => basename($filePath),
                'type' => $wpFileType['type'] ?? '',
            ];
        }

        // Handle $_FILES format
        if (is_array($value) && isset($value['name']) && isset($value['type'])) {
            return [
                'name' => $value['name'],
                'type' => $value['type'],
            ];
        }

        return null;
    }

    public function message()
    {
        return $this->message;
    }
}

