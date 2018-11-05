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
            // $sucursal = new Sucursal();
            // $form = $this->createForm(SucursalType::class, $sucursal);
            // return $this->render('admin/sucursal/add.html.twig',[
            //     'sucursales' => '',
            //     'form'=>$form->createView(),
            // ]);
        }

        public function edit(){
            return $this->render('admin/sucursal/edit.html.twig',[
                'sucursales' => '',
            ]);
        }

        public function create(Request $request){
            $sucursal = new Sucursal();
            $form_new = $this->createForm(SucursalType::class,$sucursal);
            $form_new->handleRequest($request);
            if ($form_new->isSubmitted() && $form_new->isValid()){
                $orm = $this->getDoctrine()->getManager();
                $orm->flush();
                return $this->redirectToRoute('admin_mantenimiento_sucursal');
            }
            return $this->render("admin/sucursal/add.html.twig",[
                'form_new' => $form_new->createView(),
                'sucursal' => $sucursal,
            ]);
        }

        public function update(Request $request, Sucursal $sucursal){
            $form_update = $this->createForm(SucursalType::class,$sucursal);
            $form_update->handleRequest($request);
            if ($form_update->isSubmitted() && $form_update->isValid()){
                $this->getDoctrine()->getManager()->flush();
                $this->redirectToRoute('admin_mantenimiento_sucursal');
            }
            return $this->render("AdminBundle:Article:update.html.twig",[
                'sucursal'                => $sucursal,
                'form_update'           => $form_update->createView(),
            ]);
        }

        public function delete(Request $request){

        }
    }