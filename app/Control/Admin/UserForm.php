<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Control\Admin;

/**
 * Description of UserForm
 *
 * @author franf
 */
class UserForm {

       public function __construct()
       {
              $response = [
                  'data'    => [],
                  'errors'  => [],
                  'message' => []
              ];
              require 'templates/teste/layout.php';              
       }

       public function onSave()
       {
              echo 'salva o usuário';
       }
}
