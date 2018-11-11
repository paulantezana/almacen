<?php
    namespace App\Libraries;
    class Controller{
        protected $view;
        function __construct(){
            $loader = new \Twig_Loader_Filesystem(__DIR__ . '/../../views');
            $this->view = new \Twig_Environment($loader,[
                'debug' => true,
            ]);
            $this->view->addExtension(new \Twig_Extension_Debug());
        }
    }