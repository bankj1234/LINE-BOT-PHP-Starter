<?php

phpinfo();
//class MyDB extends SQLite3
//{
//    function __construct()
//    {
//        $this->open('database.db');
//    }
//}
//
//
//$db = new MyDB();
//if (!$db) {
//    echo $db->lastErrorMsg();
//} else {
//    echo "Opened database successfully<br/>";
//    $sql = <<<EOF
//      CREATE TABLE INSTAGRAM
//      (ID INTEGER PRIMARY KEY    AUTOINCREMENT,
//      DESCRIPTION           TEXT    NOT NULL,
//      TASK            INT     NOT NULL);
//EOF;
//
//    $ret = $db->exec($sql);
//    if (!$ret) {
//        echo $db->lastErrorMsg();
//
//        $sql = <<<EOF
//      INSERT INTO INSTAGRAM (DESCRIPTION,TASK)
//      VALUES ('https://www.instagram.com/nuchcheeber/', 1 );
//EOF;
//
//        $ret = $db->exec($sql);
//        if (!$ret) {
//            echo $db->lastErrorMsg();
//        } else {
//            echo "Records created successfully<br/>";
//        }
//
//    } else {
//        echo "Table created successfully<br/>";
//
//
//        $sql = <<<EOF
//      INSERT INTO INSTAGRAM (DESCRIPTION,TASK)
//      VALUES ('https://www.instagram.com/nuchcheeber/', 1 );
//
//EOF;
//
//        $ret = $db->exec($sql);
//        if (!$ret) {
//            echo $db->lastErrorMsg();
//        } else {
//            echo "Records created successfully<br/>";
//        }
//
//    }
//    $db->close();
//}