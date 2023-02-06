<?php

namespace app\controllers\portal;

use app\controllers\ContainerController;

class CursoController extends ContainerController {

    public function index(){
        echo 'aaaaaaaaaaa';

    }

    public function show($request){

        $this->view([

            'title' => 'Curso',
            'curso' => 'PHP MVC',

        ], 'portal.cursos');

    }


}