<?php

namespace core;

use app\classes\Uri;

//class para pegar os parameters do method na URI caso existam
class Parameters {

    private $uri;

    public function __construct(){
        $this->uri = Uri::uri();
    }

    public function load(){

        return $this->getParameter();

    }

    private function getParameter(){

        if (substr_count($this->uri, '/') > 2) {

            $parameter = array_values(array_filter(explode('/', $this->uri)));


            return (object) [

                'parameter' => htmlspecialchars($parameter[2]),
                'next' => htmlspecialchars($this->getNextParameter(2))

            ];
            
        }
    }

    //verifica o se existe um proximo parametro e retorna atual +1
    private function getNextParameter($actual){

        $parameter = array_values(array_filter(explode('/', $this->uri)));

        return $parameter[$actual+1] ?? $parameter[$actual];

    }


}