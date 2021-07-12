<?php
session_start();
$con = mysqli_connect('localhost', 'root', '', 'banking_system');
$sql = "select * from mini_statement";
$result = mysqli_query($con, $sql);
?>
<!DOCTYPE html>
<html>

<head>
    <title>Mini Statement</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/button1.css">
    <style>
        #user1 {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        #user1 td,
        #user1 th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        #user1 tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        #users tr:hover {
            background-color: #ddd;
        }

        #user1 th {
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

        /*.nav-li a {

            display: block;
            color: #010114;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
            text-transform: uppercase;
        }

        .nav-li a:hover:not(.active) {
            background-color: #00ccff;
        }*/

        .btn4 {
            background-color: orange;
            border: none;
            color: black;
            border-radius: 23px;
            padding: 12px 16px;
            font-size: 23px;
            cursor: pointer;
        }

        .btn4:hover {
            background-color: white;
        }
    </style>
</head>

<body>
    <h2 style=" font-size:35px;color:black;text-shadow: 2px 2px black;">All Transactions</h2>
    <form action="index.php" method="post">
        <div class="buttons">
            <button class="btn"><span>HOME</span></button>
        </div>
    </form>
    <br>
    <br>
    <table id="user1">
        <tr>
            <th>Sender</th>
            <th>Receiver</th>
            <th>Amount</th>
        </tr>
        <tr>

            <?php while ($row = $result->fetch_assoc()) { ?>

        <tr>
            <td><?php echo $row["sender"]; ?></td>
            <td><?php echo $row["receiver"]; ?></td>
            <td><?php echo $row["amount"]; ?></td>
        </tr>
    <?php } ?>
    </table>
</body>

</html>