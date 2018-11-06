<?php
    namespace App\Controller\Admin;

    use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
    use Symfony\Component\HttpFoundation\Response;
    use Symfony\Component\HttpFoundation\Request;
    use Symfony\Component\Routing\Annotation\Route;

    use App\Entity\Usuario;
    use App\Form\UsuarioType;
    
    class UsuarioController extends AbstractController
    {
        public function index($currentPage = 1, $limit = 3)
        {
            $repository = $this->getDoctrine()->getRepository(Usuario::class);
            $usuarios = $repository->findAll();
            return $this->render('admin/usuario/index.html.twig',[
                'usuarios' => $usuarios,
            ]);
        }

        public function create(Request $request){
            $usuario = new Usuario();
            $form_create = $this->createForm(UsuarioType::class,$usuario);
            $form_create->handleRequest($request);
            if ($form_create->isSubmitted() && $form_create->isValid()){
                $usuario = $form_create->getData();
                $orm = $this->getDoctrine()->getManager();
                $orm->persist($usuario);
                $orm->flush();
                return $this->redirectToRoute('admin_mantenimiento_usuario');
            }
            return $this->render("admin/usuario/create.html.twig",[
                'form_create' => $form_create->createView(),
                'usuario' => $usuario,
            ]);
        }

        public function update(Request $request, $id){
            $usuario = new Usuario();
            $usuario = $this->getDoctrine()->getRepository(Usuario::class)->find($id);

            $form_update = $this->createForm(UsuarioType::class,$usuario);
            $form_update->handleRequest($request);

            if ($form_update->isSubmitted() && $form_update->isValid()){
                $this->getDoctrine()->getManager()->flush();
                return $this->redirectToRoute('admin_mantenimiento_usuario');
            }
            return $this->render("admin/usuario/update.html.twig",[
                'usuario'                => $usuario,
                'form_update'           => $form_update->createView(),
            ]);
        }

        public function delete(Request $request, $id){
            $usuario = $this->getDoctrine()->getRepository(Usuario::class)->find($id);

            $orm = $this->getDoctrine()->getManager();
            $orm->remove($article);
            $orm->flush();
      
            $response = new Response();
            $response->send();
            // return $this->redirectToRoute('admin_mantenimiento_usuario');
        }
    }