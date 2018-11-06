<?php
    namespace App\Controller\Admin;

    use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
    use Symfony\Component\HttpFoundation\Response;
    use Symfony\Component\HttpFoundation\Request;
    use Symfony\Component\Routing\Annotation\Route;

    use App\Entity\Empleado;
    use App\Form\EmpleadoType;
    
    class EmpleadoController extends AbstractController
    {
        public function index($currentPage = 1, $limit = 3)
        {
            $repository = $this->getDoctrine()->getRepository(Empleado::class);
            $empleados = $repository->findAll();
            return $this->render('admin/empleado/index.html.twig',[
                'empleados' => $empleados,
            ]);
        }

        public function create(Request $request){
            $empleado = new Empleado();
            $form_create = $this->createForm(EmpleadoType::class,$empleado);
            $form_create->handleRequest($request);
            if ($form_create->isSubmitted() && $form_create->isValid()){
                $empleado = $form_create->getData();
                $orm = $this->getDoctrine()->getManager();
                $orm->persist($empleado);
                $orm->flush();
                return $this->redirectToRoute('admin_mantenimiento_empleado');
            }
            return $this->render("admin/empleado/create.html.twig",[
                'form_create' => $form_create->createView(),
                'empleado' => $empleado,
            ]);
        }

        public function update(Request $request, $id){
            $empleado = new Empleado();
            $empleado = $this->getDoctrine()->getRepository(Empleado::class)->find($id);

            $form_update = $this->createForm(EmpleadoType::class,$empleado);
            $form_update->handleRequest($request);

            if ($form_update->isSubmitted() && $form_update->isValid()){
                $this->getDoctrine()->getManager()->flush();
                return $this->redirectToRoute('admin_mantenimiento_empleado');
            }
            return $this->render("admin/Empleado/update.html.twig",[
                'empleado'                => $empleado,
                'form_update'           => $form_update->createView(),
            ]);
        }

        public function delete(Request $request, $id){
            $empleado = $this->getDoctrine()->getRepository(Empleado::class)->find($id);

            $orm = $this->getDoctrine()->getManager();
            $orm->remove($article);
            $orm->flush();
      
            $response = new Response();
            $response->send();
            // return $this->redirectToRoute('admin_mantenimiento_Empleado');
        }
    }