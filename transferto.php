<?php
session_start();
$con = mysqli_connect('localhost', 'root', '', 'banking_system');
$name1 = $_SESSION['name'];
$sql = "select name from users where not name='$name1'";
$result = mysqli_query($con, $sql);
?>
<html>

<head>
    <title>Transfer</title>
    <link rel="stylesheet" href="css/button2.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        .btn {
            cursor: pointer;
        }

        .nav-ul {
            list-style-type: none;
            margin: 0;
            padding: 5px;
            overflow: hidden;

        }

        .nav-li {
            float: left;
        }

        .nav-li a {

            display: block;
            color: #010114;
            text-align: center;
            padding: 5px 5px;
            text-decoration: none;
            text-transform: uppercase;
        }

        body {

            background-color: white;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }

        .form {
            text-align: center;

        }

        .button {
            text-align: center;

        }

        .c {
            background-color: #E0115F;
            border-radius: 20px;
        }

        .c:hover {
            background-color: #26abff;
        }

        table {
            background-color: skyblue;
            padding: 50px;
            border: 2px ridge black;
        }

        .btn1 {
            background-color: orange;
            border: none;
            border-radius: 24px;
            color: black;
            padding: 12px 16px;
            font-size: 23px;
            cursor: pointer;
        }

        .btn1:hover {
            background-color: white;
        }
    </style>
</head>

<body>
    <ul class="nav-ul">
        <a href="getdetails.php">
            <li class="nav-li"><button class="btn1"><i class="fa fa-home"></i></button></li>
        </a>
    </ul>
    <center>
        <div class="view">
            <br><br>
            <h2 style=" font-size:45px;color:black;text-shadow: 2px 2px black;">Transfer Amount</h2>
            <form action="checkcredits.php" method="post">
                <div class="border">
                    <table>
                        <tr>
                            <td style="font-size:12pt;color:black;">
                                <label for="sender" align="left">Receiver Name:</label>
                                &nbsp; <select name="receiver" style="font-size: 12pt; height: 28px; width:290px;">
                                    <?php while ($row = $result->fetch_assoc()) { ?>
                                        <option value="<?php echo $row["name"]; ?>"><?php echo $row["name"]; ?></option>
                                    <?php } ?>
                            </td>
                        </tr><br>
                        <tr>
                            <td>
                                <br><label for="transfer">Amount:</label>
                                &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<input type="number" name="transfer" style="font-size: 12pt; height: 28px; width:290px;" min="0" required>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="button">
                                    <br>&nbsp;&nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp;<button type="submit" class="c" onMouseOver="this.style.color='Royalblue'" onMouseOut="this.style.color='black'" value="Credit" style="color:black;font-size:18px;height:40px; width:100px;">Transfer</button>
                                </div>
                            </td>
                        </tr>
                    </table>
                </div>
            </form>
        </div><br>
        <form action="users.php" method="post">
            <div class="buttons">
                <button class="bt2" width="100%" type="submit" name="name" value="<?php echo $name1 ?>">BACK</button>
            </div>
        </form>
    </center>
</body>

</html>