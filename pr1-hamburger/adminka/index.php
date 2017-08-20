<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

// На этой странице отображаем необработанные заказы

include_once("config.php");
$query = "SELECT * FROM orders WHERE proceeded = '0' ORDER BY id DESC";
$result = mysqli_query($mysqli, $query);
?>

<html>
<head>
	<title>Admin page</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>

	<table width='100%' border=0>
		<a href="index.php">Новые</a> | <a href="done.php">Обработанные</a>

	<tr bgcolor='#CCCCCC'>
		<td>ID</td>
		<td>NAME</td>
		<td>PHONE</td>
		<td>ADRESS</td>
		<td>CALLBACK</td>
		<td>PAYMENT</td>
		<td>COMMENT</td>
		<td>ACTION</td>
	</tr>

	<?php
    while ($v = mysqli_fetch_array($result)) {
        echo "<tr>";
        echo "<tr style='border: solid 1px black;'>";
        echo "<td>{$v['id']}</td>";
        echo "<td>{$v['name']}</td>";
        echo "<td>{$v['phone']}</td>";
        echo "<td style='width:400px;'>{$v['adress']}</td>";
        echo "<td>{$v['callback']}</td>";
        echo "<td>{$v['payment']}</td>";
        echo "<td>{$v['comment']}</td>";
        echo "<td><a href=\"proceed.php?id=$v[id]\">Обработать</a></td>";
        echo "</tr>";
    }
    ?>
	</table>
</body>
</html>
