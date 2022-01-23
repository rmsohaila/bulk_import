<?php

if (!function_exists('is_date')) {

    /**
     * Check if the value is a valid date
     *
     * @param mixed $value
     * @return boolean
     */
    function is_date($value)
    {
        if (!$value) {
            return false;
        }

        try {
            new \DateTime($value);
            return true;
        } catch (\Exception $e) {
            return false;
        }
    }
}
