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
       private $totalNames = 0;

       public function addNamespace($baseName, $baseDir)
       {
              $this->namespaces[$baseName] = str_replace(array('\\', '/'), DIRECTORY_SEPARATOR, $baseDir);
              $this->totalNames += 1;
       }

       public function register()
       {
              spl_autoload_register(array($this, 'loader'));
       }

       public function loader($class)
       {
              $strClass = $class;
              $classArray = explode('\\', $class);
              $hasNamespace = count($classArray) > 1;
              $baseDir = '';
              $found = false;
              if ($hasNamespace) {
                     $baseNamespace = $classArray[0];
                     unset($classArray[0]);
                     $class = implode(DIRECTORY_SEPARATOR, $classArray);
                     if (isset($this->namespaces[$baseNamespace])):
                            $baseDir = $this->namespaces[$baseNamespace];
                            if (file_exists($baseDir . $class . '.php')) {
                                   require_once $baseDir . $class . '.php';
                                   $found = true;
                            } else {
                                   echo 'Classe "' . $strClass . '" não encontrada em: ' . $baseDir . $class . '.php!';
                                   exit();
                            }
                     endif;
              }
              if (!$found) {
                     echo 'Classe "' . $strClass . '" não encontrada!';
                     exit();
              }
       }
}
