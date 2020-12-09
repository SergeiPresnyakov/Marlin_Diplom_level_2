<?php 
require_once('init.php');

$user = new User;

if (Input::exists()) {
  if (Token::check(Input::get('token'))) {
    $validate = new Validate();

    $validation = $validate->check($_POST, [
      'username' => [
        'required' => true,
        'min' => 3
      ],
      'status' => [
        'max' => 255
      ]
    ]);

    if ($validation->passed()) {
      $user->update([
        'username' => Input::get('username'),
        'status' => Input::get('status')
      ]);
      Session::flash('success', 'Profile successfully updated.');

    } else {
      Session::flash('danger', 'Error. Please check your data.');

    }
  }
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
            <li class="nav-item">

              <!-- Управление пользователями для админа -->
              <?php if ($user->hasPermissions('admin')):?>
              <a class="nav-link" href="users/index.php">Управление пользователями</a>
              <?php endif;?>

            </li>
          </ul>

          <ul class="navbar-nav">
            <li class="nav-item">
              <li class="nav-item">
                <a href="profile.php" class="nav-link">Профиль</a>
              </li>
              <a href="logout.php" class="nav-link">Выйти</a>
            </li>
          </ul>
        </div>
    </nav>

   <div class="container">
     <div class="row">
       <div class="col-md-8">

         <h1>Профиль пользователя - <?php echo $user->data()->username;?></h1>


         <?php if (Session::flashExists('success')):?>
          <div class="alert alert-success"><?php echo Session::flash('success');?></div>
         <?php endif;?>


        <?php if (Session::flashExists('danger')):?>
         <div class="alert alert-danger">
           <?php echo Session::flash('danger');?>
           <ul>
            <?php foreach ($validation->errors() as $error):?>
              <li><?php echo $error;?></li>
            <?php endforeach;?>
           </ul>
         </div>
        <?php endif;?>


         <ul>
           <li><a href="changepassword.php">Изменить пароль</a></li>
         </ul>

          <!-- Чтобы данные в форме менялись сразу после изменения -->
          <?php $user = new User;?>

         <form action="" class="form" method="post">
           <div class="form-group">
             <label for="username">Имя</label>
             <input type="text" id="username" name="username" class="form-control" value="<?php echo $user->data()->username;?>">
           </div>
           <div class="form-group">
             <label for="status">Статус</label>
             <input type="text" id="status" name="status" class="form-control" value="<?php echo $user->data()->status;?>">
           </div>
           <div class="form-group">
            <input type="hidden" name="token" value="<?php echo Token::generate();?>">
            <button class="btn btn-warning">Обновить</button>
           </div>
         </form>


       </div>
     </div>
   </div>
</body>
</html>