<?php
    namespace App\Controller\Admin;

    use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
    use Symfony\Component\HttpFoundation\Response;
    use Symfony\Component\HttpFoundation\Request;
    use Symfony\Component\Routing\Annotation\Route;

    use App\Entity\DeudaPendiente;
    use App\Form\DeudaPendienteType;
    
    class DeudaPendienteController extends AbstractController
    {
        public function index($currentPage = 1, $limit = 3)
        {
            $repository = $this->getDoctrine()->getRepository(DeudaPendiente::class);
            $deudapendientes = $repository->findAll();
            return $this->render('admin/deudapendiente/index.html.twig',[
                'deudapendientes' => $deudapendientes,
            ]);
        }

        public function create(Request $request){
            $deudapendiente = new DeudaPendiente();
            $form_create = $this->createForm(DeudaPendienteType::class,$deudapendiente);
            $form_create->handleRequest($request);
            if ($form_create->isSubmitted() && $form_create->isValid()){
                $deudapendiente = $form_create->getData();
                $orm = $this->getDoctrine()->getManager();
                $orm->persist($deudapendiente);
                $orm->flush();
                return $this->redirectToRoute('admin_mantenimiento_deudapendiente');
            }
            return $this->render("admin/deudapendiente/create.html.twig",[
                'form_create' => $form_create->createView(),
                'deudapendiente' => $deudapendiente,
            ]);
        }

        public function update(Request $request, $id){
            $deudapendiente = new DeudaPendiente();
            $deudapendiente = $this->getDoctrine()->getRepository(DeudaPendiente::class)->find($id);

            $form_update = $this->createForm(DeudaPendienteType::class,$deudapendiente);
            $form_update->handleRequest($request);

            if ($form_update->isSubmitted() && $form_update->isValid()){
                $this->getDoctrine()->getManager()->flush();
                return $this->redirectToRoute('admin_mantenimiento_deudapendiente');
            }
            return $this->render("admin/deudapendiente/update.html.twig",[
                'deudapendiente'                => $deudapendiente,
                'form_update'           => $form_update->createView(),
            ]);
        }

        public function delete(Request $request, $id){
            $deudapendiente = $this->getDoctrine()->getRepository(DeudaPendiente::class)->find($id);

            $orm = $this->getDoctrine()->getManager();
            $orm->remove($article);
            $orm->flush();
      
            $response = new Response();
            $response->send();
            // return $this->redirectToRoute('admin_mantenimiento_deudapendiente');
        }
    }