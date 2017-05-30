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



    $message = '
';
    $html = file_get_contents('https://m.investing.com/economic-calendar/');
    $dom = new domDocument();
    $dom->loadHTML($html);
    $dom->preserveWhiteSpace = false;
    $data = $dom->getElementsByTagName('article');

    foreach ($data as $row) {
        $message .=  $row->nodeValue. '
' ;
    }
    $message = strip_tags($message);
    $text = $message;
    $case = 1;
    echo $message;

