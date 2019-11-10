<?php
    include('indexDB.php');
    session_start();
    $n=$_POST['name'];
    $c=$_POST['cno'];
    $e=$_POST['email'];
    if($_SESSION['username']!='manassinkar')
    {
        $x1="DROP TRIGGER IF EXISTS after_insert;";
        $res1=$conn->query($x1);
        $q1="CREATE TRIGGER after_insert AFTER INSERT ON packers_movers
        FOR EACH
        ROW
        BEGIN
            DELETE from packers_movers where name_org='$n' and email_id='$e';
        END;";
        $res=$conn->query($q1);
        if($res==false)
        echo $q1;
    }
    $q="insert into packers_movers(name_org,contact_no,email_id) values('$n',$c,'$e')";
    $result = $conn->query($q);
 header('Location: PackersAndMovers.php');
?>