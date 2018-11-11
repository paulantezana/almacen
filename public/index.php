<?php
    require_once __DIR__ . '/../config/app.php';
    use App\Libraries\Router;

    session_start();

    // conprobando si el url inicia con  === admin 
    $isAdmin = fnmatch("[admin]*",$_GET['url'] ?? false);

    // verificando si esta tratando de ingresar al dashboard para
    // administrar el sistema
    if($isAdmin){
        // Get public routes
        $url = PUBLIC_ROUTES[$_GET['url'] ?? ''] ?? false;
        if($url){
            // Rutas publicas del admin
            Router::any($url['controller'],$url['action']);
        }else{
            // Verificando la session
            if(isset($_SESSION['user'])){
                // Get secret urls
                $url = ROUTERS[$_GET['url'] ?? ''] ?? false;
                if($url){
                    // Toda las rutas del admin
                    Router::any($url['controller'],$url['action']);
                }else{
                    // Pagina 404 no encontrada
                    Router::any('Page','E404');
                }
            }else{
                // Session login new user
                header('location:/admin/user/login');
            }
        }
    };


    if(!$isAdmin){
        $url = PUBLICROUTER[$_GET['url'] ?? ''] ?? false;
        if($url){
            Router::any($url['controller'],$url['action']);
        }else{
            header('location:/');
        }
    }