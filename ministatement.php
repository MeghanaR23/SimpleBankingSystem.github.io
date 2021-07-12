<?php
session_start();
$con = mysqli_connect('localhost', 'root', '', 'banking_system');
$name1 = $_SESSION['name'];
$sql = "select sender,receiver,amount from mini_statement where sender='$name1'";
$result = mysqli_query($con, $sql);
?>
<!DOCTYPE html>
<html>

<head>
    <title>Mini Statement</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/button2.css">
    <style>
        #user2 {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        #user2 td,
        #user2 th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        #user2 tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        #user2 tr:hover {
            background-color: #ddd;
        }

        #user2 th {
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

        .buttons {
            position: absolute;
            bottom: 8%;
            right: 42%;
            text-align: center;
        }
    </style>
</head>

<body>
    <ul class="nav-ul">
        <a href="getdetails.php">
            <li class="nav-li"><button class="btn3"><i class="fa fa-home"></i></button></li>
        </a>
    </ul><br>
    <h2><?php echo "Mini Statement of " . $name1 ?></h2>
    <table id="user2">
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
    </table>
    <br>
    <br>
    <br>
    <br>
    <form action="users.php" method="post">
        <div class="buttons">
            <a href="users.php">
                <button class="bt2" style="width:100%" type="submit" name="name" value="<?php echo $name1 ?>">BACK</button>
            </a>
        </div>
    </form>


</body>

</html>