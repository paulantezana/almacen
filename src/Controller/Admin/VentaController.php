<?php
    namespace App\Controller\Admin;

    use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
    use Symfony\Component\HttpFoundation\Response;
    use Symfony\Component\HttpFoundation\Request;
    use Symfony\Component\Routing\Annotation\Route;

    use App\Entity\Venta;
    use App\Form\VentaType;
    
    class VentaController extends AbstractController
    {
        public function index($currentPage = 1, $limit = 3)
        {
            $repository = $this->getDoctrine()->getRepository(Venta::class);
            $ventas = $repository->findAll();
            return $this->render('admin/venta/index.html.twig',[
                'ventas' => $ventas,
            ]);
        }

        public function create(Request $request){
            $venta = new Venta();
            $form_create = $this->createForm(VentaType::class,$venta);
            $form_create->handleRequest($request);
            if ($form_create->isSubmitted() && $form_create->isValid()){
                $venta = $form_create->getData();
                $orm = $this->getDoctrine()->getManager();
                $orm->persist($venta);
                $orm->flush();
                return $this->redirectToRoute('admin_mantenimiento_venta');
            }
            return $this->render("admin/venta/create.html.twig",[
                'form_create' => $form_create->createView(),
                'venta' => $venta,
            ]);
        }

        public function update(Request $request, $id){
            $venta = new Venta();
            $venta = $this->getDoctrine()->getRepository(Venta::class)->find($id);

            $form_update = $this->createForm(VentaType::class,$venta);
            $form_update->handleRequest($request);

            if ($form_update->isSubmitted() && $form_update->isValid()){
                $this->getDoctrine()->getManager()->flush();
                return $this->redirectToRoute('admin_mantenimiento_venta');
            }
            return $this->render("admin/venta/update.html.twig",[
                'venta'                => $venta,
                'form_update'           => $form_update->createView(),
            ]);
        }

        public function delete(Request $request, $id){
            $venta = $this->getDoctrine()->getRepository(Venta::class)->find($id);

            $orm = $this->getDoctrine()->getManager();
            $orm->remove($article);
            $orm->flush();
      
            $response = new Response();
            $response->send();
            // return $this->redirectToRoute('admin_mantenimiento_venta');
        }
    }