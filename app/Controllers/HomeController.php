<?php
    namespace App\Controllers;
    use App\Libraries\Controller;
    use App\Libraries\Pagination;
    use App\Models\Consult;

    class HomeController extends Controller{
        public function index(){
            echo $this->view->render('web/index.twig');
        }
    }