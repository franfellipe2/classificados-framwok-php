<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Core\Control;

/**
 * Description of Page
 *
 * @author franf
 */
class PageAdmin {

       private $itens = [];

       public function add(Element $children)
       {
              $this->itens[] = $children;
       }

       public function show()
       {
              foreach ($this->itens as $item):
                     $item->show();
              endforeach;
       }
}
