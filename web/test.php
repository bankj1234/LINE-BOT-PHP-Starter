<?php
include_once('dom.php');
$item = array();
echo '1';
$html = file_get_html('http://livescore.siamsport.co.th/widget/live_table');
echo '2';
$task = array();
$team = array();
$message = '
';
echo '3';
var_dump($html);
foreach ($html->find('table') as $tbody) {
    echo 'i';
    $data = $tbody->children(0)->children(1)->children(0);
    $num = 0;
    foreach ($data as $key => $font) {
        if ($num == 5) {
            $num2 = 0;
            foreach ($font->find('table') as $key2 => $table) {
                if ($num2 <= 1) {
                    foreach ($table->find('tr') as $key3 => $tr) {
                        if ($key3 == 1) {
                            $task[] = $tr->children(0)->children(0)->children(0)->innertext;
                            $message .= '----- '.$tr->children(0)->children(0)->children(0)->innertext . ' -----
';
                        } elseif ($key3 > 1) {
                            $team[] = $tr->innertext;
                            $message .= $tr->children(0)->children(0)->innertext . ' | ';
                            $message .= $tr->children(1)->innertext . ' | ';
                            $message .= $tr->children(2)->innertext . '
';
                        }
                    }
                }

                $num2++;
            }
            //echo $font;
        }
        $num++;
    }
}
echo '4';
$message = strip_tags($message);
$text = $message;
$case = 1;

echo $text;
?>