<?php
    namespace App\Controller\Admin;

    use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
    use Symfony\Component\HttpFoundation\Response;
    use Symfony\Component\HttpFoundation\Request;
    use Symfony\Component\Routing\Annotation\Route;

    use App\Entity\Cliente;
    use App\Form\ClienteType;
    
    class ClienteController extends AbstractController
    {
        public function index($currentPage = 1, $limit = 3)
        {
            $repository = $this->getDoctrine()->getRepository(Cliente::class);
            $clientes = $repository->findAll();
            return $this->render('admin/Cliente/index.html.twig',[
                'clientes' => $clientes,
            ]);
        }

        public function create(Request $request){
            $cliente = new Cliente();
            $form_create = $this->createForm(ClienteType::class,$cliente);
            $form_create->handleRequest($request);
            if ($form_create->isSubmitted() && $form_create->isValid()){
                $cliente = $form_create->getData();
                $orm = $this->getDoctrine()->getManager();
                $orm->persist($cliente);
                $orm->flush();
                return $this->redirectToRoute('admin_mantenimiento_cliente');
            }
            return $this->render("admin/cliente/create.html.twig",[
                'form_create' => $form_create->createView(),
                'cliente' => $cliente,
            ]);
        }

        public function update(Request $request, $id){
            $cliente = new Cliente();
            $cliente = $this->getDoctrine()->getRepository(Cliente::class)->find($id);

            $form_update = $this->createForm(ClienteType::class,$cliente);
            $form_update->handleRequest($request);

            if ($form_update->isSubmitted() && $form_update->isValid()){
                $this->getDoctrine()->getManager()->flush();
                return $this->redirectToRoute('admin_mantenimiento_cliente');
            }
            return $this->render("admin/cliente/update.html.twig",[
                'cliente'                => $cliente,
                'form_update'           => $form_update->createView(),
            ]);
        }

        public function delete(Request $request, $id){
            $cliente = $this->getDoctrine()->getRepository(Cliente::class)->find($id);

            $orm = $this->getDoctrine()->getManager();
            $orm->remove($article);
            $orm->flush();
      
            $response = new Response();
            $response->send();
            // return $this->redirectToRoute('admin_mantenimiento_cliente');
        }
    }