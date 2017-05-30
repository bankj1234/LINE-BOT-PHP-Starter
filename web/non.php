<?php
$dom = new DOMDocument();
libxml_use_internal_errors(true);
$dom->loadHTMLFile('https://m.investing.com/economic-calendar/');
//$data = $dom->getElementById("ec_wrapper");
$data = $dom->getElementsByTagName('article');

foreach ($data as $row) {
    echo $row->nodeValue;
    echo '<br/>';
}
//

