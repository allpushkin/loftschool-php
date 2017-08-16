<?php


?>

<html lang="en">
<?php require "components/head.php"; ?>

<body>
<?php include "components/header.php"; ?>

<div class="container">
    <div class="form-container">
        <form class="form-horizontal" action="registration/validation.php" method="post"
              accept-charset="UTF-8">
                <div class="header">
                    <h1>Регистрация:</h1>
                </div>
            <div class="form-group">
                <div class="col-sm-12">
                    <input type="text"
                           class="form-control"
                           id="login"
                           placeholder="Логин"
                           name="login"
                           required>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-12">
                    <input type="text"
                           class="form-control"
                           id="name"
                           placeholder="Имя"
                           name="name"
                           required>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-12">
                    <input type="number"
                           class="form-control"
                           id="age"
                           placeholder="Возраст"
                           name="age"
                           required>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-12">
                    <input type="password"
                           class="form-control"
                           id="pass1"
                           placeholder="Пароль"
                           name="password"
                           required>
                    <?php echo $password_err; ?>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-12">
                    <input type="password"
                           class="form-control"
                           id="pass2"
                           placeholder="Пароль ещё разок"
                           name="password2"
                           required>
                    <?php echo $password2_err; ?>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-12">
                    <button id="submit"
                            class="btn btn-basic">Зарегистрироваться</button>
                    <br><br>
                    Зарегистрированы? <a href="index.php">Авторизируйтесь</a>
                </div>
            </div>
        </form>
    </div>

</div><!-- /.container -->
<script type="text/javascript">
    var submit = document.getElementById('submit');

    submit.addEventListener("click", function (e) {
        e.preventDefault();

        var login = 'login=' + document.getElementById('login').value;
        var name = 'name=' + document.getElementById('name').value;
        var age = 'age=' + document.getElementById('age').value;
        var pass1 = 'password=' + document.getElementById('pass1').value;
        var pass2 = 'password2=' + document.getElementById('pass2').value;
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
