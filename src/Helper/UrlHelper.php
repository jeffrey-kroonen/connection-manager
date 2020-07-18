<?php

    namespace ConnectionManager\Src\Helper;

    /**
     * UrlHelper
     * 
     * @param string $contains   The path needs to contain this string.
     * @param boolean $exactMatch   Only true when path needs to be exact to given $contains param.
     * @return void
     * @access public
     */
    class UrlHelper
    {
        public static function navigationActive($contains, $exactMatch = false)
        {

            $toCheck = str_replace(SUBDIR, "", $_SERVER['REQUEST_URI']);
            
            if ($exactMatch) {
                if ($toCheck == $contains) {
                    echo "text-primary";
                } else {
                    echo "text-light";
                }
            } else {
                if (strpos($toCheck, $contains) !== false) {
                    echo "text-primary";
                } else {
                    echo "text-light";
                }
            }
        }
    }