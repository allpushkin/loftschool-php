<?php


?>

<html lang="en">
<?php require "components/head.php"; ?>

<body>
<?php include "components/header.php"; ?>

<div class="container">
    <div class="form-container">
        <form class="form-horizontal" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post"
              accept-charset="UTF-8">
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Логин</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="login" placeholder="Логин" name="login"
                           value="<?php echo $login; ?>">
                    <?php echo $loginErr; ?>
                </div>
            </div>
            <div class="form-group">
                <label for="inputPassword4" class="col-sm-2 control-label">Имя</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="name" placeholder="Имя" name="name" required>
                </div>
            </div>
            <div class="form-group">
                <label for="inputPassword4" class="col-sm-2 control-label">Возраст</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" id="age" placeholder="Возраст" name="age" required>
                </div>
            </div>
            <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">Пароль</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control" id="pass1" placeholder="Пароль" name="password"
                           required>
                    <?php echo $passwordErr; ?>
                </div>
            </div>
            <div class="form-group">
                <label for="inputPassword4" class="col-sm-2 control-label">Пароль (Повтор)</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control" id="pass2" placeholder="Пароль" name="password2"
                           required>
                    <?php echo $password2Err; ?>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button id="submit" class="btn btn-default">Зарегистрироваться</button>
                    <br><br>
                    Зарегистрированы? <a href="index.php">Авторизируйтесь</a>
                </div>
            </div>
        </form>
    </div>

</div><!-- /.container -->
<script type="text/javascript">
    var submit = document.getElementById('submit');

    submit.addEventListener("click", function () {
        var login = document.getElementById('login').value;
        var name = document.getElementById('name').value;
        var age = document.getElementById('age').value;
        var pass1 = document.getElementById('pass1').value;
        var pass2 = document.getElementById('pass2').value;
        var data = [login, name, age, pass1, pass2].join("&");

        console.log(data);

        var xhr = new XMLHttpRequest();
        xhr.open("POST", "registration/validation.php", true);
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.send(data);
        xhr.onreadystatechange = function () {
            if (this.readyState === 4 && this.status === 200) {
                alert(this.responseText);
                // document.getElementById("txtHint").innerHTML = this.responseText;
            }
        };
    });
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="js/main.js"></script>
<script src="js/bootstrap.min.js"></script>

</body>
</html>
