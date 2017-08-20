<?php
include_once("config.php");
$result = mysqli_query($mysqli, "SELECT * FROM orders WHERE proceeded = '1' ORDER BY id DESC"); // using mysqli_query instead
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
		<td>PHONE</td>
		<td>EMAIL</td>
		<td>ADRESS</td>
		<td>CALLBACK</td>
		<td>PAYMENT</td>
		<td>COMMENT</td>
	</tr>

	<?php
    //while($res = mysql_fetch_array($result)) { // mysql_fetch_array is deprecated, we need to use mysqli_fetch_array
    while ($v = mysqli_fetch_array($result)) {
        echo "<tr>";
        echo "<tr style='border: solid 1px black;'>";
        echo "<td>{$v['id']}</td>";
        echo "<td>{$v['name']}</td>";
        echo "<td>{$v['phone']}</td>";
        echo "<td>{$v['email']}</td>";
        echo "<td style='width:400px;'>{$v['adress']}</td>";
        echo "<td>{$v['callback']}</td>";
        echo "<td>{$v['payment']}</td>";
        echo "<td>{$v['comment']}</td>";
        echo "</tr>";
    }
    ?>
	</table>
</body>
</html>
