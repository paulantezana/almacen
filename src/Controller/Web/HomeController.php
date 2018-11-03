<?php
    namespace App\Controller\Web;

    use Symfony\Component\HttpFoundation\Response;
    use Symfony\Component\Routing\Annotation\Route;
    use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
    
    class HomeController extends AbstractController
    {
        public function index()
        {
            return $this->render('web/index.html.twig');
        }
    }