<?php
// FROM Richard and Andrew
// get_info.php
// called by /examples/core_lab_ext.php

function getInfo(...$info)
{
    $ch = curl_init($info[0]);

    if (!is_resource($ch) && !$ch instanceof CurlHandle) return FALSE;

        $result = [];
        curl_setopt($ch, CURLOPT_URL, $info[0]);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_HEADER, false);
        $codes = curl_exec($ch);
        if ($codes) {
            $codes = ($codes) ? json_decode($codes) : [];
            if ($codes) {
                foreach ($codes->data as $item) {
                    $found = mb_strrpos($item->city, $info[1], 0, $info[2]);
                    if ($found) $result[] = $item;
                }
            }
        }
        return $result;
}
