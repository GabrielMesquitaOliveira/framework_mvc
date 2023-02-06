<?php

namespace core;

use app\classes\Uri;
use app\exceptions\MethodNotExistException;

//class para trabalhar com os metodos dentro do controller caso existam
class Method{

    private $uri;

    //captura a atual uri e atribui a $uri
    public function __construct(){
        $this->uri = Uri::uri();
    }

    //verifica se o metodo existe dentro do controller, caso sim retorna o method senao retorna exception
    public function load($controller){
        $method = $this->getMethod();

        if (!method_exists($controller, $method)){
            throw new MethodNotExistException('esse metodo não existe');
        }

        return $method;

    }

    // verifica se existe algo apos o controller para instanciar o method
    public function getMethod(){

        if (substr_count($this->uri, '/') > 1) {

            // explode a uri no controller e depois no metodo
            list($controller, $method) = array_values(array_filter(explode('/', $this->uri)));
            return $method;
        }

        return 'index';

    }

}