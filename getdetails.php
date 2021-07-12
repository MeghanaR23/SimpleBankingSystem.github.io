<?php
session_start();
$con = mysqli_connect('localhost', 'root', '', 'banking_system');
$sql = "SET @column=0";
$result = mysqli_query($con, $sql);
$sql = "SELECT @column:=@column+1 AS id,name,email,amount FROM `users`";
$result = mysqli_query($con, $sql);
?>
<html>

<head>
    <title>View Users</title>
    <link rel="stylesheet" href="css/button1.css">
    <style>
        #users {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        #users td,
        #users th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        #users tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        #users tr:hover {
            background-color: #ddd;
        }

        #users th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #04AA6D;
            color: white;
        }
    </style>
</head>

<body>
    <h1 style="color:black;text-shadow: 2px 2px black;">User Information</h1>
    <div class="buttons">
        <a href="index.php">
            <button class="btn"><span>HOME</span></button>
        </a>
    </div>
    <br>
    <br>
    <table id="users">
        <thead>
            <th>NO</th>
            <th>Name</th>
            <th>Email</th>
            <th>Amount</th>
            <th></th>
        </thead>
        <tbody>
            <?php
            while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            ?>
                <tr>
                    <td> <?php echo $row['id']; ?></td>
                    <td><?php echo  $row["name"]; ?></td>
                    <td><?php echo  $row["email"]; ?></td>
                    <td><?php echo  $row["amount"]; ?></td>
                    <td>


                        <form action="users.php" method="post" class="view">
                            <button class="button1" type="submit" name="name" value="<?php echo $row["name"] ?>">View</button>
                        </form>

                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table><br><br>

</body>

</html>