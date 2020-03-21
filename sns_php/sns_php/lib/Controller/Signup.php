<?php

namespace MyApp\Controller;

class SignUp extends \MyApp\Controller{

  public function run(){
    if(!$this->isLoggedIn()){
      //islogedinがfalse(!)ならログイン画面へ飛ばす
      header('Location: '.SITE_URL);
      exit;
    }

    if($_SERVER['REQUEST_METHOD'] === 'POST'){
      $this->postProcess();
    }
  }

  protected function postProcess(){
    //validate
    try{
      $this->_validate();
    }catch(\MyApp\Exception\InvalidEmail $e){
      echo $e->getMessage();
      exit;
    }catch(\MyApp\Exception\InvalidPassword $e){
      echo $e->getMessage();
      exit;
    }

    echo "success";
    exit;

    //create users

    //redirect to login
  }
  private function _validate(){
    if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
      throw new \MyApp\Exception\InvalidEmail();
    }

    if (!preg_match('/\A[a-zA-Z0-9]+\z/', $_POST['password'])) {
         throw new \MyApp\Exception\InvalidPassword();
    }
  }
}
