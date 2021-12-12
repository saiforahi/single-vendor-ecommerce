<?php
if (! function_exists('convert_json_2_string')) {
    function convert_json_2_string($array, $index)
    {
        return json_decode($array->storage_specs, true)['drive_capacity'] == null ? '' : json_decode($storage->storage_specs, true)['drive_capacity'] ;
    }
}
if (! function_exists('generateRandomString')) {
    function generateRandomString($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
}
?>