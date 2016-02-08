<?php

	$pages = array(
		'view' => array('file' => 'view', 'text' => 'Nézet'),
		'holiday' => array('file' => 'holiday', 'text' => 'Nyaralás'),
		'customer' => array('file' => 'customer', 'text' => 'Ügyfél'),
		'connection' => array('file' => 'connection', 'text' => 'Kapcsolat')
	);

	$error_page = array (
		'text' => 'A keresett oldal nem található'
	);

	$search = current($pages);
		if (isset($_GET['page'])) {
		  if (isset($pages[$_GET['page']])) {
			$search = $pages[$_GET['page']];
		  } else {
			$search = $error_page;
			header("HTTP/1.0 404 Not Found");
		  }
		} else $search = $pages['view'];