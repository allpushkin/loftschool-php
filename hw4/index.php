<html lang="en">
    <?php require "components/head.php"; ?>

  <body>
    <?php require "components/header.php"; ?>

    <div class="container">

      <div class="form-container">
        <form class="form-horizontal" method="post" action="registration/authorization.php">
            <div class="header">
                <h1>Авторизация:</h1>
            </div>
          <div class="form-group">
            <div class="col-sm-12">
              <input type="text" class="form-control" id="inputEmail3" name="login" placeholder="Логин">
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-12">
              <input type="password" class="form-control" id="inputPassword3" name="password" placeholder="Пароль">
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-12">
              <button type="submit" class="btn btn-basic">Войти</button>
              <br><br>
              Нет аккаунта? <a href="reg.php">Зарегистрируйтесь</a>
            </div>
          </div>
        </form>
      </div>

    </div><!-- /.container -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/main.js"></script>
    <script src="js/bootstrap.min.js"></script>

  </body>
</html>
