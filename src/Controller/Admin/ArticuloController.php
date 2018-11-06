<?php
    namespace App\Controller\Admin;

    use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
    use Symfony\Component\HttpFoundation\Response;
    use Symfony\Component\HttpFoundation\Request;
    use Symfony\Component\Routing\Annotation\Route;

    use App\Entity\Articulo;
    use App\Form\ArticuloType;
    
    class ArticuloController extends AbstractController
    {
        public function index($currentPage = 1, $limit = 3)
        {
            $repository = $this->getDoctrine()->getRepository(Articulo::class);
            $articulos = $repository->findAll();
            // return $this->render('admin/articulo/index.html.twig',[
            //     'articulos' => $articulos,
            // ]);
            return new Response(
                '<html><body>Lucky number:</body></html>'
            );
        }

        public function create(Request $request){
            $articulo = new Articulo();
            $form_create = $this->createForm(ArticuloType::class,$articulo);
            $form_create->handleRequest($request);
            if ($form_create->isSubmitted() && $form_create->isValid()){
                $articulo = $form_create->getData();
                $orm = $this->getDoctrine()->getManager();
                $orm->persist($articulo);
                $orm->flush();
                return $this->redirectToRoute('admin_almacen_articulo');
            }
            return $this->render("admin/articulo/create.html.twig",[
                'form_create' => $form_create->createView(),
                'articulo' => $articulo,
            ]);
        }

        public function update(Request $request, $id){
            $articulo = new Articulo();
            $articulo = $this->getDoctrine()->getRepository(Articulo::class)->find($id);

            $form_update = $this->createForm(ArticuloType::class,$articulo);
            $form_update->handleRequest($request);

            if ($form_update->isSubmitted() && $form_update->isValid()){
                $this->getDoctrine()->getManager()->flush();
                return $this->redirectToRoute('admin_almacen_articulo');
            }
            return $this->render("admin/articulo/update.html.twig",[
                'articulo'                => $articulo,
                'form_update'           => $form_update->createView(),
            ]);
        }

        public function delete(Request $request, $id){
            $articulo = $this->getDoctrine()->getRepository(Articulo::class)->find($id);

            $orm = $this->getDoctrine()->getManager();
            $orm->remove($article);
            $orm->flush();
      
            $response = new Response();
            $response->send();
            // return $this->redirectToRoute('admin_mantenimiento_articulo');
        }
    }