<?php
require_once"../components/logincheck.php";
require_once"../components/helpers.php";
require_once "db/db.php";

//Получаем описание
$login = $_SESSION['login'];
$description = $mysqli->query("SELECT description FROM users WHERE login = '$login'")->fetch_object()->description;

// Определяем есть ли аватарка
if (file_exists("pictures/" . $_SESSION['login'] . ".jpg")) {
    $userImage = $_SESSION['login'] . ".jpg";
} else {
    $userImage = "default.jpg";
}

?>

<html lang="en">
<?php require "../components/head.php"; ?>

<body>
<?php require "../components/header.php"; ?>

<div class="container">
    <div class="row">
        <div class="col-md-4 col-xs-1">
            <!-- Корректирующий по бокам -->
        </div>
        <div class="col-md-4 col-xs-10">
            <div>
                <h2 class="text-center"><?php echo $_SESSION['username']; ?></h2>
            </div>
            <div>
                <img
                        width="300"
                        height="300"
                        class="img-circle"
                        src="pictures/<?php echo $userImage ?>"
                />
            </div>
            <div class="text-center">
                <form action="uploadava.php" method="post" enctype="multipart/form-data">
                    <input class="btn" type="file" name="file" id="fileToUpload">
                    <input class="btn btn-default" type="submit" value="Upload Image" name="submit">
                </form>
            </div>
            <form action="uploaddescription.php" method="post" enctype="multipart/form-data">
                <h4>Описание:</h4>
                <textarea id="description" name="description" class="col-md-4 form-control"><?php echo $description ?>
                </textarea>
                <input class="btn btn-default" type="submit" value="Обновить" name="submit">
            </form>
            <div class="col-md-4 col-xs-1">
                <!-- Корректирующий по бокам -->
            </div>
        </div>
    </div>

</div><!-- /.container -->


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="../js/main.js"></script>
<script src="../js/bootstrap.min.js"></script>

</body>

</html>
