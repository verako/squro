<?php 
require_once 'simple_html_dom.php';

$url='http://max-gsm.com.ua';
$html = file_get_html($url);
foreach($html->find('a') as $element){
	if ( !strpos($element, '://')&&!strpos($element, '//')) {
		echo $element = $url . $element->href.'<br>';
	}
	elseif (strpos($element, '/')&&!strpos($element, '//')) {
		echo $element = $url . $element->href.'<br>';
	}
	elseif (strpos($element, '//')&&!strpos($element, '://')) {
		echo $element ='http:' . $element->href.'<br>';
	}
	else
	 echo $element->href . '<br>';
} 


      


