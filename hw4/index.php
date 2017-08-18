<html lang="en">
    <?php require_once "components/head.php"; ?>

  <body>
    <?php require_once "components/header.php";
    session_start();
    ?>

    <div class="container">

      <div class="form-container">
        <form class="form-horizontal" method="post" action="registration/authorization.php">
            <h1>Авторизация:</h1>
            <span id="feedback"><?php echo $_SESSION['error']; $_SESSION['error'] = "";?></span>
          <div class="form-group">
            <div class="col-sm-12">
              <input type="text"
                     class="form-control"
                     id="inputEmail3"
                     name="login"
                     placeholder="Логин"
                    required>
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-12">
              <input type="password"
                     class="form-control"
                     id="inputPassword3"
                     name="password"
                     placeholder="Пароль"
                     required>
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-12">
              <button type="submit" class="btn btn-basic">Войти</button>
              <br><br>
              Нет аккаунта? <a href="registration/reg.php">Зарегистрируйтесь</a>
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
