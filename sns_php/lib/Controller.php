<?php

namespace Myapp;

class Controller{

  protected function isLoggedIn(){
 /* $_SESSION['me'] もしSESSION[me]がセットされていて
 なおかつ空じゃなかったら*/
    return isset($_SESSION['me'])&& !empty($_SESSION['me']);
  }
}

 ?>
