<?php
    namespace App\Controller\Admin;

    use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
    use Symfony\Component\HttpFoundation\Response;
    use Symfony\Component\HttpFoundation\Request;
    use Symfony\Component\Routing\Annotation\Route;

    use App\Entity\Categoria;
    use App\Form\CategoriaType;
    
    class CategoriaController extends AbstractController
    {
        public function index($currentPage = 1, $limit = 3)
        {
            $repository = $this->getDoctrine()->getRepository(Categoria::class);
            $categorias = $repository->findAll();
            return $this->render('admin/categoria/index.html.twig',[
                'categorias' => $categorias,
            ]);
        }

        public function create(Request $request){
            $categoria = new Categoria();
            $form_create = $this->createForm(CategoriaType::class,$categoria);
            $form_create->handleRequest($request);
            if ($form_create->isSubmitted() && $form_create->isValid()){
                $categoria = $form_create->getData();
                $orm = $this->getDoctrine()->getManager();
                $orm->persist($categoria);
                $orm->flush();
                return $this->redirectToRoute('admin_almacen_categoria');
            }
            return $this->render("admin/categoria/create.html.twig",[
                'form_create' => $form_create->createView(),
                'categoria' => $categoria,
            ]);
        }

        public function update(Request $request, $id){
            $categoria = new Categoria();
            $categoria = $this->getDoctrine()->getRepository(Categoria::class)->find($id);

            $form_update = $this->createForm(CategoriaType::class,$categoria);
            $form_update->handleRequest($request);

            if ($form_update->isSubmitted() && $form_update->isValid()){
                $this->getDoctrine()->getManager()->flush();
                return $this->redirectToRoute('admin_almacen_categoria');
            }
            return $this->render("admin/categoria/update.html.twig",[
                'categoria'                => $categoria,
                'form_update'           => $form_update->createView(),
            ]);
        }

        public function delete(Request $request, $id){
            $categoria = $this->getDoctrine()->getRepository(Categoria::class)->find($id);

            $orm = $this->getDoctrine()->getManager();
            $orm->remove($article);
            $orm->flush();
      
            $response = new Response();
            $response->send();
            // return $this->redirectToRoute('admin_almacen_categoria');
        }
    }