<?php
require_once('../init.php');
$delete_ourself = Session::get('user') == Input::get('id');

if ($delete_ourself) {
    $user = new User;
    Database::getInstance()->delete('users', ['id', '=', Session::get('user')]);
    $user->logout();
    Redirect::to('../index.php');
} else {
    $user = new User(Input::get('id'));
    Database::getInstance()->delete('users', ['id', '=', Input::get('id')]);
    Redirect::to('index.php');
}
