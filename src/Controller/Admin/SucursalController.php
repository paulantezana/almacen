<?php
    namespace App\Controller\Admin;

    use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
    use Symfony\Component\HttpFoundation\Response;
    use Symfony\Component\HttpFoundation\Request;
    use Symfony\Component\Routing\Annotation\Route;

    use App\Entity\Sucursal;
    use App\Form\SucursalType;
    
    class SucursalController extends AbstractController
    {
        public function index($currentPage = 1, $limit = 3)
        {
            $repository = $this->getDoctrine()->getRepository(Sucursal::class);
            $sucursales = $repository->findAll();
            return $this->render('admin/sucursal/index.html.twig',[
                'sucursales' => $sucursales,
            ]);
        }

        public function add(){
            $sucursal = new Sucursal();
            $form = $this->createForm(SucursalType::class, $sucursal);
            return $this->render('admin/sucursal/add.html.twig',[
                'sucursales' => '',
                'form'=>$form->createView(),
            ]);
        }

        public function edit(){
            return $this->render('admin/sucursal/edit.html.twig',[
                'sucursales' => '',
            ]);
        }

        public function create(Request $request){
            // return $this->red;
        }

        public function update(Request $request){

        }

        public function delete(Request $request){

        }
    }