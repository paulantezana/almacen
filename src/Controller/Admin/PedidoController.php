<?php
    namespace App\Controller\Admin;

    use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
    use Symfony\Component\HttpFoundation\Response;
    use Symfony\Component\HttpFoundation\Request;
    use Symfony\Component\Routing\Annotation\Route;

    use App\Entity\Pedido;
    use App\Form\PedidoType;
    
    class PedidoController extends AbstractController
    {
        public function index($currentPage = 1, $limit = 3)
        {
            $repository = $this->getDoctrine()->getRepository(Pedido::class);
            $pedidos = $repository->findAll();
            return $this->render('admin/pedido/index.html.twig',[
                'pedidos' => $pedidos,
            ]);
        }

        public function create(Request $request){
            $pedido = new Pedido();
            $form_create = $this->createForm(PedidoType::class,$Pedido);
            $form_create->handleRequest($request);
            if ($form_create->isSubmitted() && $form_create->isValid()){
                $pedido = $form_create->getData();
                $orm = $this->getDoctrine()->getManager();
                $orm->persist($pedido);
                $orm->flush();
                return $this->redirectToRoute('admin_mantenimiento_pedido');
            }
            return $this->render("admin/pedido/create.html.twig",[
                'form_create' => $form_create->createView(),
                'pedido' => $pedido,
            ]);
        }

        public function update(Request $request, $id){
            $pedido = new Pedido();
            $pedido = $this->getDoctrine()->getRepository(Pedido::class)->find($id);

            $form_update = $this->createForm(PedidoType::class,$pedido);
            $form_update->handleRequest($request);

            if ($form_update->isSubmitted() && $form_update->isValid()){
                $this->getDoctrine()->getManager()->flush();
                return $this->redirectToRoute('admin_mantenimiento_pedido');
            }
            return $this->render("admin/pedido/update.html.twig",[
                'pedido'                => $pedido,
                'form_update'           => $form_update->createView(),
            ]);
        }

        public function delete(Request $request, $id){
            $pedido = $this->getDoctrine()->getRepository(Pedido::class)->find($id);

            $orm = $this->getDoctrine()->getManager();
            $orm->remove($article);
            $orm->flush();
      
            $response = new Response();
            $response->send();
            // return $this->redirectToRoute('admin_mantenimiento_pedido');
        }
    }