
<?php
//boostrap contem todos os autoloads e o vendor, o Use só é possivel após o require
require '../bootstrap.php';
use core\Controller;
use core\Method;
use core\Parameters;

//pegar/instanciar controler com base na URL URI, sendo a primeira / o controller e as segunda / o Method
try{
    $controller = new Controller;
    $controller = $controller->load();

    $method = new Method;
    $method = $method->load($controller);

    $parameters = new Parameters;
    $parameters = $parameters->load();

    //passando o method do controller apartir da variavel que precisa estar com () afinal é um method SEU ANIMAl!!!
    $controller->$method($parameters);
}
//aprensentar a exception de Controller exception
catch(\Exception $e){
    echo $e->getMessage();
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