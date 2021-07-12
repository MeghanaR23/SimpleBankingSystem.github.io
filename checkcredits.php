<?php
session_start();
$con = mysqli_connect('localhost', 'root', '', 'banking_system');
$name1 = $_SESSION['name'];
$sql = "select amount from users where name='$name1'";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_array($result);
$var = $row['amount'];
$from = $_SESSION['name'];
$to = $_POST['receiver'];
$sql1 = "select amount from users where name='$to'";
$result1 = mysqli_query($con, $sql1);
$row = mysqli_fetch_array($result1);
$var1 = $row['amount'];
session_destroy();

if ($var >= $_POST["transfer"]) {
    $sub = $var - $_POST["transfer"];
    $sql = "update users set amount='$sub' where name='$from' ";
    $result = mysqli_query($con, $sql);
    $sum = $var1 + $_POST["transfer"];
    $sql = "update users set amount='$sum' where name='$to' ";
    $result = mysqli_query($con, $sql);
    $c = $_POST["transfer"];
    $sql = "insert into mini_statement(sender,receiver,amount)
values('$from','$to',$c)";
    $result = mysqli_query($con, $sql);
    include 'getdetails.php';
    $message = "Successful transfer";
    echo "<script type='text/javascript'>
    alert('$message');
</script>";
} else {
    include 'getdetails.php';
    $message = "Insufficient Balance";
    echo "<script type='text/javascript'>
    alert('$message');
</script>";
}
