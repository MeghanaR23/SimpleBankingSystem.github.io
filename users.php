<?php
session_start();
$con = mysqli_connect('localhost', 'root', '', 'banking_system');
$name = $_POST['name'];
$sql = "SELECT * FROM `users` WHERE name='$name'";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_array($result);
$mail = $row['email'];
$amount = $row['amount'];
$_SESSION['name'] = $name;

?>

<html>

<head>
    <title><?php echo $name ?></title>
    <link rel="stylesheet" href="css/button2.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        #user {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        #user td,
        #user th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        #user tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        #user tr:hover {
            background-color: #ddd;
        }

        #user th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #04AA6D;
            color: white;
        }

        .nav-ul {
            list-style-type: none;
            margin: 0;
            padding: 10px;
            overflow: hidden;

        }

        .nav-li {
            float: left;
        }

        .nav-li a {

            display: block;
            color: #010114;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
            text-transform: uppercase;
        }

        .nav-li a:hover:not(.active) {
            background-color: #00ccff;
        }

        .btn3 {
            background-color: orange;
            border: none;
            color: black;
            border-radius: 23px;
            padding: 12px 16px;
            font-size: 23px;
            cursor: pointer;
        }

        .btn3:hover {
            background-color: white;
        }
    </style>
</head>

<body>
    <ul class="nav-ul" style="height:53px;">
        <a href="getdetails.php">
            <li class="nav-li"><button class="btn3"><i class="fa fa-home" style="font-size:24px"></i></button></li>
        </a>
        <li class="nav-li" style="float:right;height:53px;text-align:center;font-size:20px"><a class="nav-link"><?php echo $name ?></a></li>
    </ul>
    <br><br><br>
    <div class="view">
        <table id="user">
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Amount</th>

            </tr>

            <tr>
                <?php
                $row = mysqli_fetch_array($result);
                ?>
                <td><?php echo $name ?></td>
                <td><?php echo $mail ?></td>
                <td><?php echo $amount ?></td>
            </tr>

        </table>
    </div>
    <br>
    <br>
    <div class="center">

        <a href="transferto.php">
            <button class="bt2" style="width:100%">Transfer To</button>
        </a>
        <br>
        <br>
        <a href="ministatement.php">
            <button class="bt2" style="width:100%">Mini Statement</button>
        </a>

    </div>


</body>

</html>