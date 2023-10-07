<?php
namespace BitApps\WPValidator;

trait SanitizationMethods
{
    protected function sanitizeEmail($value)
    {
        return sanitize_email($value);
    }

    protected function sanitizeFileName($value)
    {
        return sanitize_file_name($value);
    }

    protected function sanitizeKey($value)
    {
        return sanitize_key($value);
    }

    // protected function sanitizeMeta($value)
    // {
    //     return sanitize_meta($value);
    // }

    protected function sanitizeHtmlClass($value)
    {
        return sanitize_html_class($value);
    }

    // protected function sanitizeOption($value)
    // {
    //     return sanitize_option($value);
    // }
    // protected function sanitizeTermField($value)
    // {
    //     return sanitize_term_field($value);
    // }

    protected function sanitizeText($value)
    {
        return sanitize_text_field($value);
    }

    protected function sanitizeTitle($value)
    {
        return sanitize_title($value);
    }

    protected function sanitizeUser($value)
    {
        return sanitize_user($value);
    }

    protected function sanitizeUrl($value)
    {
        return sanitize_url($value);
    }

    protected function sanitizeTrim($value)
    {
        return is_string($value) ? trim($value) : $value;
    }

    protected function sanitizeEscape($value)
    {
        return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');

    }

    protected function sanitizeCapitalize($value)
    {
        return ucwords(strtolower($value));
    }

}
