<?php

namespace app\controllers;

class HomeController{

    public function index(){
        return $this->view("HomeView");
    }

    public function view($view){

        if(file_exists("../app/views/$view.php")){
            ob_start();

            include "../app/views/$view.php";
            $contenido = ob_get_clean();

            return $contenido;
        }

        else echo "Ruta no encontrada";

        return "Hola desde HomeView";
    }
}
?>