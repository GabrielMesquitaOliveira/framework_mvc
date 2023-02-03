
<?php
//boostrap contem todos os autoloads e o vendor, o Use só é possivel após o require
require '../bootstrap.php';
use core\Controller;

dd(app\classes\Uri::uri());

//pegar/instanciar controler com base na URL URI
try{
    $controller = new Controller;
    $controller = $controller->load();
    dd($controller);
}
//aprensentar a exception de Controller exception
catch(\Exception $e){
    dd($e->getMessage());
}

//pegar metodo na URI
/*
$method = new Method;
$method = $method->getMethod();

//pegar parametros na URI

$parameters = new Parameters;
$parameters = $parameters->getParameters();

//Junção da URI completa 

$controller->$method($parameters);
*/