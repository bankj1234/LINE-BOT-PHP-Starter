<?php
$html = file_get_contents('http://livescore.siamsport.co.th/widget/live_table');
/*** a new dom object ***/
$dom = new domDocument;

/*** load the html into the object ***/
$dom->loadHTML($html);

/*** discard white space ***/
$dom->preserveWhiteSpace = false;

/*** the table by its tag name ***/
$tables = $dom->getElementsByTagName('table');

/*** get all rows from the table ***/
$rows = $tables->item(0)->getElementsByTagName('tr');

/*** loop over the table rows ***/
foreach ($rows as $row) {
    /*** get each column by tag name ***/
    $cols = $row->getElementsByTagName('td');

    /*** echo the values ***/
    echo 'Designation: '.$cols->item(0)->nodeValue.'<br />';
    echo 'Manager: '.$cols->item(1)->nodeValue.'<br />';
    echo 'Team: '.$cols->item(2)->nodeValue;
    echo '<hr />';
}
?>