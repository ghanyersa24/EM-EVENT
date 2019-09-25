<?php
defined('BASEPATH') or exit('No direct script access allowed');

function r($value)
{
	$search = array("'",  '"');
	$replace = array(" ");
	if (is_null($value)) {
		return "";
	}
	return str_replace($search, $replace, $value);
}

function checkCIAM($nim, $auth)
{
	$auth = base64_decode($auth);
	$url = file_get_contents("https://em.ub.ac.id/redirect/login/loginAppsCiam/?nim=" . $nim . "&password=" . $auth);
	return json_decode($url);
}

function pilihan($data)
{
	$res = array();
	foreach ($data as $pilihan) {
		if ($pilihan['HAK'] == 'BPH') { 
			$temp= array(
				'ID_PILIHAN'=>$pilihan['ID_PILIHAN'],
				'TB_PILIHAN'=>$pilihan['TB_PILIHAN'],
			);
			array_push($res,$temp);
		}
	}
	return $res;
}
