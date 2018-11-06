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

        public function create(Request $request){
            $sucursal = new Sucursal();
            $form_create = $this->createForm(SucursalType::class,$sucursal);
            $form_create->handleRequest($request);
            if ($form_create->isSubmitted() && $form_create->isValid()){
                $sucursal = $form_create->getData();
                $orm = $this->getDoctrine()->getManager();
                $orm->persist($sucursal);
                $orm->flush();
                return $this->redirectToRoute('admin_mantenimiento_sucursal');
            }
            return $this->render("admin/sucursal/create.html.twig",[
                'form_create' => $form_create->createView(),
                'sucursal' => $sucursal,
            ]);
        }

        public function update(Request $request, $id){
            $sucursal = new Sucursal();
            $sucursal = $this->getDoctrine()->getRepository(Sucursal::class)->find($id);

            $form_update = $this->createForm(SucursalType::class,$sucursal);
            $form_update->handleRequest($request);

            if ($form_update->isSubmitted() && $form_update->isValid()){
                $this->getDoctrine()->getManager()->flush();
                return $this->redirectToRoute('admin_mantenimiento_sucursal');
            }
            return $this->render("admin/sucursal/update.html.twig",[
                'sucursal'                => $sucursal,
                'form_update'           => $form_update->createView(),
            ]);
        }

        public function delete(Request $request, $id){
            $sucursal = $this->getDoctrine()->getRepository(Sucursal::class)->find($id);

            $orm = $this->getDoctrine()->getManager();
            $orm->remove($article);
            $orm->flush();
      
            $response = new Response();
            $response->send();
            // return $this->redirectToRoute('admin_mantenimiento_sucursal');
        }
    }