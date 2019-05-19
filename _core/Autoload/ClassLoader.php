<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Core\Autoload;

/**
 * Description of newPHPClass
 *
 * @author franf
 */
class classLoader {

       private $namespaces;

       public function addNamespace($baseName, $baseDir)
       {
              $this->namespaces[$baseName] = str_replace(array('\\', '/'), DIRECTORY_SEPARATOR, $baseDir);
       }

       public function register()
       {
              spl_autoload_register(array($this, 'loader'));
       }

       public function loader($class)
       {
              $classArray = explode('\\', $class);
              $hasNamespace = count($classArray) > 1;
              if ($hasNamespace) {
                     $baseNamespace = $classArray[0];
                     unset($classArray[0]);
                     $class = implode(DIRECTORY_SEPARATOR, $classArray);
                     foreach ($this->namespaces as $name => $baseDir):
                            if ($baseNamespace == $name):
                                   require_once $baseDir . $class . '.php';
                            endif;
                     endforeach;
              }
       }
}
