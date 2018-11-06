<?php
    namespace App\Controller\Admin;

    use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
    use Symfony\Component\HttpFoundation\Response;
    use Symfony\Component\HttpFoundation\Request;
    use Symfony\Component\Routing\Annotation\Route;

    use App\Entity\UnidadMedida;
    use App\Form\UnidadMedidaType;
    
    class UnidadMedidaController extends AbstractController
    {
        public function index($currentPage = 1, $limit = 3)
        {
            $repository = $this->getDoctrine()->getRepository(UnidadMedida::class);
            $unidadmedidas = $repository->findAll();
            return $this->render('admin/UnidadMedida/index.html.twig',[
                'unidadmedidas' => $unidadmedidas,
            ]);
        }

        public function create(Request $request){
            $unidadmedida = new UnidadMedida();
            $form_create = $this->createForm(UnidadMedidaType::class,$unidadmedida);
            $form_create->handleRequest($request);
            if ($form_create->isSubmitted() && $form_create->isValid()){
                $unidadmedida = $form_create->getData();
                $orm = $this->getDoctrine()->getManager();
                $orm->persist($unidadmedida);
                $orm->flush();
                return $this->redirectToRoute('admin_almacen_unidad_medida');
            }
            return $this->render("admin/unidadmedida/create.html.twig",[
                'form_create' => $form_create->createView(),
                'unidadmedida' => $unidadmedida,
            ]);
        }

        public function update(Request $request, $id){
            $unidadmedida = new UnidadMedida();
            $unidadmedida = $this->getDoctrine()->getRepository(UnidadMedida::class)->find($id);

            $form_update = $this->createForm(UnidadMedidaType::class,$unidadmedida);
            $form_update->handleRequest($request);

            if ($form_update->isSubmitted() && $form_update->isValid()){
                $this->getDoctrine()->getManager()->flush();
                return $this->redirectToRoute('admin_almacen_unidad_medida');
            }
            return $this->render("admin/unidadmedida/update.html.twig",[
                'unidadmedida'                => $unidadmedida,
                'form_update'           => $form_update->createView(),
            ]);
        }

        public function delete(Request $request, $id){
            $unidadmedida = $this->getDoctrine()->getRepository(UnidadMedida::class)->find($id);

            $orm = $this->getDoctrine()->getManager();
            $orm->remove($article);
            $orm->flush();
      
            $response = new Response();
            $response->send();
            // return $this->redirectToRoute('admin_almacen_unidad_medida');
        }
    }