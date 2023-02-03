<?php

namespace core;

use app\classes\Uri;
use app\exceptions\ControllerNotExistException;

class Controller {

    private $uri;
    private $controller;
    private $namespace;

    //folders com controllers
    private $folders = [
        'app\controllers\portal','app\controllers\admin'
        
    ];

    public function __construct(){

        //obtem a Uri apartir da classe URI em uri.php

        $this->uri = Uri::uri();

    }

    //carrega a home
    public function load(){
        if($this->ishome()){
            return $this->controllerHome();
        }
        return $this->controllerNotHome();
    }

    //verifica se o controller existe
    private function controllerHome(){

        if (!$this->controllerExist('HomeController')){
            throw new ControllerNotExistException("esse controller nao existe");
        }

        return $this->instantiateController();

    }

    private function controllerNotHome(){
        
    }

    //verifica se URI = home

    private function ishome(){
        return ($this->uri == '/');
    }

    //verica se a classe do controller existe em cada uma das pastas selecionadas em $folders
    //caso exista atribui seu local a variavel $namespace nesta classe, exemplo "controllers\admin"
    //$this->$controller armazena o controller.php em si no local "controllers\admin"

    private function controllerExist($controller){

        $controllerExist = false;

        foreach ($this->folders as $folder){
            if(class_exists($folder.'\\'.$controller)){
                $controllerExist = true;
                $this->namespace = $folder;
                $this->controller = $controller;
            }
        }

        return $controllerExist;

    }

    //unifica $namespace e $controller para formar o namespace completo do crontroller a ser instanciado em $controller
    private function instantiateController(){

        $controller = $this->namespace . '\\' . $this->controller;
        return new $controller;
    }
}