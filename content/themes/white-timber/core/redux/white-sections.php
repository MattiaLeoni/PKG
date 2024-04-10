<?php 

/* As of Redux 3.5+, there is an extensive API. This API can be used in a mix/match mode allowing for. */

/* -> START Basic Fields. */

$kses_exceptions = array(
	'a'      => array(
		'href' => array(),
	),
	'strong' => array(),
	'br'     => array(),
);

include ('sections/general.php');
include ('sections/header.php');
include ('sections/social.php'); 
include ('sections/footer.php'); 

/*
 * <--- END SECTIONS
 */
