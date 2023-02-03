<?php

namespace app\classes;

class Uri{
    
    public static function uri(){

        //função para retornar somente a URI, desconsiderando todos os parametros após ?

        return parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    }
}