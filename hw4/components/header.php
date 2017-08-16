<?php
echo '<nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>;
          <a class="navbar-brand" href="/index.php">Chirkov M.A.</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="index.php">Авторизация</a></li>
            <li><a href="reg.php">Регистрация</a></li>';

if (!isset($_SESSION['loggedin'])) {
    echo '
      <li><a href="list.php">Список пользователей</a></li>
      <li><a href="filelist.php">Список файлов</a></li>
    ';
}
          echo '</ul>
        </div>
    </nav>';
