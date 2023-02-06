<?php

namespace core;
use Twig\Extra\String\StringExtension;

class Twig {

    private $twig;
    private $functions = [];
    
    public function loadTwig(){

        $this->twig = new \Twig\Environment($this->loadViews(), [

            'debug' => true,

            'auto_reload' => true,

        ]);

        return $this->twig;

    }

    private function loadViews(){

        return new \Twig\Loader\FilesystemLoader('../app/views');


    }

    public function loadExtensions()
    {
        return $this->twig->addExtension(new StringExtension());
    }
}