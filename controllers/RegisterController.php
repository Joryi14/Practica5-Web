<?php

  // file: controllers/RegisterController.php  
  require_once('models/users.php');

  class RegisterController extends Controller {

    public function showRegistrationForm() {
      return view('Auth/registration',
        ['login'=>Auth::check()]); 
    }

    public function register() {
      $name = Input::get('name');  
      $email = Input::get('email');  
      $password = Input::get('password');
      $user = [
        'name'=>$name,'email'=>$email,  
        'password'=>$password];
        DB::table('users')->insert($user);
      return redirect('/');
    }
  }
?>