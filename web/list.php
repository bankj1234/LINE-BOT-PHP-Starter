<?php
class MyDB extends SQLite3
{
    function __construct()
    {
        $this->open('database.db');
    }
}
$db = new MyDB();
if(!$db){
    echo $db->lastErrorMsg();
} else {
    echo "Opened database successfully<br/>";
}

$sql =<<<EOF
      SELECT * from INSTAGRAM;
EOF;

$ret = $db->query($sql);
while($row = $ret->fetchArray(SQLITE3_ASSOC) ){
    echo "ID = ". $row['ID'] . "<br/>";
    echo "DESCRIPTION = ". $row['DESCRIPTION'] ."<br/>";
    echo "TASK = ". $row['TASK'] ."<br/>";
}
echo "Operation done successfully";
$db->close();
?>