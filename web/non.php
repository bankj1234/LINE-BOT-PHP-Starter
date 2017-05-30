<?php
$dom = new DOMDocument();
libxml_use_internal_errors(true);
$dom->loadHTMLFile('https://m.investing.com/economic-calendar/');
$data = $dom->getElementById("ec_wrapper");


echo '<pre>';
print_r($data);
echo '</pre>';
