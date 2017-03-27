<?php
$myfile = fopen("data.txt", "w") or die("Unable to open file!");
$txt = "1";
fwrite($myfile, $txt);
fclose($myfile);
?>