<?php
    namespace App\Controllers;
    use App\Libraries\Controller;
    use App\Libraries\Pagination;
    use App\Models\Consult;

    class AdminController extends Controller{
        public function index()
        {
            echo $this->view->render('admin/dashboard/index.twig');
        }
    }