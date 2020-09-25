<?php
// get_info.php
// called by /examples/core_lab_ext.php

function getInfo($url, $search, $encode)
{
	$ch = curl_init($url);
	if (!is_resource($ch)) return FALSE;
	
	$result = [];
	curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HEADER, false);
	$codes = curl_exec($ch);
	if ($codes) {
		$codes = ($codes) ? json_decode($codes) : [];
		if ($codes) {
			foreach ($codes->data as $item) {
				$found = mb_strrpos($item->city, $search, $encode);
				if ($found) $result[] = $item;
			}
		}
	}
	return $result;
}
