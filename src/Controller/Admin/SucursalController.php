<?php
    namespace App\Controller\Admin;

    use Symfony\Component\HttpFoundation\Response;
    use Symfony\Component\Routing\Annotation\Route;
    use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

    use App\Entity\Sucursal;
    
    class SucursalController extends AbstractController
    {
        public function index()
        {
            $entityManager = $this->getDoctrine()->getManager();
            $sucursal = $entityManager->getRepository(Sucursal::class);
            return $this->render('admin/sucursal/index.html.twig',[
                'sucursales' => $sucursal,
            ]);
        }

        public function showForm(){

        }

        public function create(){

        }

        public function update(){

        }

        public function delete(){

        }
    }