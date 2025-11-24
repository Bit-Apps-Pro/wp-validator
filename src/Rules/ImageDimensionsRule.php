<?php
namespace BitApps\WPValidator\Rules;

use BitApps\WPValidator\Helpers;
use BitApps\WPValidator\Rule;

class ImageDimensionsRule extends Rule
{
    use Helpers;

    protected $message = "The :attribute must not be larger than :width x :height pixels";

    protected $requireParameters = ['width', 'height'];

    public function validate($value)
    {
        $this->checkRequiredParameter($this->requireParameters);

        if ($this->isEmpty($value)) {
            return false;
        }

        $maxWidth  = (int) $this->getParameter('width');
        $maxHeight = (int) $this->getParameter('height');

        $dimensions = $this->getImageDimensions($value);
        if (! $dimensions) {
            return false;
        }

        $width  = $dimensions['width'];
        $height = $dimensions['height'];

        return $width <= $maxWidth && $height <= $maxHeight;
    }

    private function getImageDimensions($value)
    {
        $filePath = null;

        if (is_numeric($value)) {
            $attachmentId = (int) $value;
            $filePath     = get_attached_file($attachmentId);
            if (empty($filePath) || ! file_exists($filePath)) {
                return null;
            }

            $metadata = wp_get_attachment_metadata($attachmentId);
            if ($metadata && isset($metadata['width']) && isset($metadata['height'])) {
                return [
                    'width'  => (int) $metadata['width'],
                    'height' => (int) $metadata['height'],
                ];
            }
        }

        if (is_array($value) && isset($value['tmp_name'])) {
            if (empty($value['tmp_name']) || ! is_uploaded_file($value['tmp_name'])) {
                return null;
            }
            $filePath = $value['tmp_name'];
        }

        if ($filePath && file_exists($filePath)) {
            $imageSize = @getimagesize($filePath);
            if ($imageSize && isset($imageSize[0]) && isset($imageSize[1])) {
                return [
                    'width'  => (int) $imageSize[0],
                    'height' => (int) $imageSize[1],
                ];
            }
        }

        return null;
    }

    public function getParamKeys()
    {
        return $this->requireParameters;
    }

    public function message()
    {
        return $this->message;
    }
}
