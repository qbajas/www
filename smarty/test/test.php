<?php
 
require '../libs/Smarty.class.php';
 
$smarty = new Smarty;
 
 $smarty->assign('produkty', array(
                             array('nazwa' => 'mleko',
                                   'cena' => '2.5',),
                             array('nazwa' => 'mas³o',
                                   'cena' => '4',),
                             array('nazwa' => 'ser',
                                   'cena' => '3',),
                             array('nazwa' => 'chleb',
                                   'cena' => '3')
                             ));
 
$smarty->display('test.tpl');
 
?>