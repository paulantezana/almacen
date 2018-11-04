<?php
    namespace App\Controller\Admin;

    use Symfony\Component\HttpFoundation\Response;
    use Symfony\Component\Routing\Annotation\Route;
    use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
    
    class UsuarioController extends AbstractController
    {
        public function index()
        {
            return $this->render('admin/usuario/index.html.twig');
        }
    }