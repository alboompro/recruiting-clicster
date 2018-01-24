<?php
/**
 * This procedure, try to get all the modules
 * of the modules folder and return them.
 */

if (!function_exists('path_modules')) {

    /**
     * @param string $suffix
     * @return array
     */
    function path_modules($suffix = '')
    {
        $paths = glob(__DIR__.'/../src/Modules/*', GLOB_ONLYDIR);

        if (empty($suffix))
            return $paths;

        foreach($paths as &$path) {
            $path = $path . $suffix;
        }

        return $paths;
    }
}