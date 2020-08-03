<?php
	if (!defined('IN_PHPBB')) {
		exit;
	}
	
	if (empty($lang) || !is_array($lang)) {
		$lang = array();
	}
	
	$lang = array_merge($lang, array(
	'HIDE_LINK_FOR_GUESTS'=>'<span class="hidelink"><a href="ucp.php?mode=login">Трябва да си влязъл в системата, за да можеш да виждаш линковете</a></span>',
));