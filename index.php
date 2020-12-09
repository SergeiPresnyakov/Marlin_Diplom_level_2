<?php 
require_once('init.php');
$allUsers = Database::getInstance()->query('SELECT * FROM users')->results();

// залогиненный пользователь, если такой есть
$current_user = new User;

if (!$current_user->isLoggedIn()) {
  $nav_title = 'Войти';
  $nav_href = 'login.php';
} else {
  $nav_title = 'Выйти';
  $nav_href = 'logout.php';
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Profile</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
<body>
    
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <a class="navbar-brand" href="#">User Management</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link" href="index.php">Главная</a>
          </li>
        </ul>

        <ul class="navbar-nav">
          <li class="nav-item">

            <!-- "Войти" для незалогиненного пользователя, и "Выйти" для залогиненного -->
            <a href="<?php echo $nav_href;?>" class="nav-link"><?php echo $nav_title?></a>

          </li>
          <li class="nav-item">
            <a href="register.php" class="nav-link">Регистрация</a>
          </li>
        </ul>
      </div>
    </nav>

  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="jumbotron">
          <h1 class="display-4">Привет, мир!</h1>
          <p class="lead">Это дипломный проект по разработке на PHP. На этой странице список наших пользователей.</p>
          <hr class="my-4">
          <p>Чтобы стать частью нашего проекта вы можете пройти регистрацию.</p>
          <a class="btn btn-primary btn-lg" href="register.php" role="button">Зарегистрироваться</a>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-12">
        <h1>Пользователи</h1>
        <table class="table">
          <thead>
            <tr>
              <th>ID</th>
              <th>Имя</th>
              <th>Email</th>
              <th>Дата</th>
            </tr>
          </thead>

          <tbody>
          <?php foreach($allUsers as $user):?>
            <tr>
              <td><?php echo $user->id;?></td>
              <td><a href="user_profile.php?id=<?php echo $user->id;?>"><?php echo $user->username;?></a></td>
              <td><?php echo $user->email;?></td>
              <td><?php echo date('d/m/Y', strtotime($user->registration_date));?></td>
            </tr>
          <?php endforeach;?>

          </tbody>
        </table>
      </div>
    </div>
  </div>
</body>
</html>