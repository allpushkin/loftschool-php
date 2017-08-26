<?php

function selected($requestUri)
{
    $current_file_name = basename($_SERVER['REQUEST_URI'], ".php");
    if ($current_file_name == $requestUri) return 'class="active"';
    else return"";
}

?>

<nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" 
          class="navbar-toggle collapsed" 
          data-toggle="collapse" 
          data-target="#navbar" 
          aria-expanded="false" 
          aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>;
          <a class="navbar-brand">Chirkov M.A.</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">';
<?php

$index = selected("index");
$reg = selected("reg");

if (!$_SESSION['logedin']) {
    echo "<li {$index}><a href=\"/index.html\">Авторизация</a></li>";
    echo "<li {$reg}><a href=\"../registration/reg.php\">Регистрация</a></li>";
}

$list = selected("list");
$filelist = selected("filelist");
$personal = selected("personal");

if ($_SESSION['logedin'] === 1) {
    echo "
      <li {$personal}><a href=\"../useractions/personal.php\">Личный кабинет</a></li>
      <li {$list}><a href=\"../useractions/list.php\">Список пользователей</a></li>
      <li {$filelist}><a href=\"../useractions/filelist.php\">Список файлов</a></li>
      <li><a style='color:red;'href=\"../registration/logout.php\">Выйти</a></li>
    ";
}

echo '</ul></div></nav>';