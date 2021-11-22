<?php
if (! function_exists('convert_json_2_string')) {
    function convert_json_2_string($array, $index)
    {
        return json_decode($array->storage_specs, true)['drive_capacity'] == null ? '' : json_decode($storage->storage_specs, true)['drive_capacity'] ;
    }
}
?>