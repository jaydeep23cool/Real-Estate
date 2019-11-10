<?php
include('indexDB.php');
if($_SESSION['username']!='manassinkar')
{
    $x1="DROP TRIGGER IF EXISTS after_insert;";
    $res1=$conn->query($x1);
}
session_destroy();
header('Location: index.html')
?>