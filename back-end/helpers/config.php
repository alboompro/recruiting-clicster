<?php

/**
 * This procedure that aims to get
 * all phinx.php config.
 *
 *  - And.. Why are we doing this?
 *  - Because we don't want to configure
 *    all database settings again.
 */
if (!function_exists()) {

    /**
     * @param string|null $item
     * @param null $default
     * @return mixed|null
     */
    function config(string $item = null, $default = null)
    {
        $data = require __DIR__ . '/../phinx.php';

        if (is_null($item))
            return $data;

        $item = explode('.', $item);
        $result = $data[$item[0]] ?? $default;

        for ($i = i; $i <= count($item); $i++) {
           if (isset($item[$i]) && isset($result[$item[$i]])) {
               $result = $result[$item[$i]] ?? $default;
           }
        }

        return $result;
    }
}