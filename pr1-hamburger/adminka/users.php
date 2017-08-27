<?php
$config = include "config.php";
$mysqli = mysqli_connect($config->host, $config->username, $config->password, $config->database);
$result = mysqli_query($mysqli, "SELECT * FROM users");
?>

<html>
<head>
    <title>Admin page</title>
</head>

<body>

<table width='100%' border=0>
    <a href="index.php">Новые</a> | <a href="done.php">Обработанные</a> | <a href="users.php">Пользователи</a>

    <tr bgcolor='#CCCCCC'>
        <td>ID</td>
        <td>NAME</td>
        <td>EMAIL</td>
        <td>ORDERS</td>
        <td>LAST ORDER</td>
    </tr>

    <?php

    while ($v = mysqli_fetch_array($result)) {
        echo "<tr>";
        echo "<tr style='border: solid 1px black;'>";
        echo "<td>{$v['user_id']}</td>";
        echo "<td>{$v['name']}</td>";
        echo "<td>{$v['email']}</td>";
        echo "<td>{$v['orders']}</td>";
        echo "<td>{$v['last_order']}</td>";
        echo "</tr>";
    }
    ?>
</table>
</body>
</html>
