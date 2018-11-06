<?php
    namespace App\Controller\Admin;

    use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
    use Symfony\Component\HttpFoundation\Response;
    use Symfony\Component\HttpFoundation\Request;
    use Symfony\Component\Routing\Annotation\Route;

    use App\Entity\Ingreso;
    use App\Form\IngresoType;
    
    class IngresoController extends AbstractController
    {
        public function index($currentPage = 1, $limit = 3)
        {
            $repository = $this->getDoctrine()->getRepository(Ingreso::class);
            $ingresos = $repository->findAll();
            return $this->render('admin/Ingreso/index.html.twig',[
                'ingresos' => $ingresos,
            ]);
        }

        public function create(Request $request){
            $ingreso = new Ingreso();
            $form_create = $this->createForm(IngresoType::class,$ingreso);
            $form_create->handleRequest($request);
            if ($form_create->isSubmitted() && $form_create->isValid()){
                $ingreso = $form_create->getData();
                $orm = $this->getDoctrine()->getManager();
                $orm->persist($ingreso);
                $orm->flush();
                return $this->redirectToRoute('admin_mantenimiento_ingreso');
            }
            return $this->render("admin/ingreso/create.html.twig",[
                'form_create' => $form_create->createView(),
                'ingreso' => $Ingreso,
            ]);
        }

        public function update(Request $request, $id){
            $ingreso = new Ingreso();
            $ingreso = $this->getDoctrine()->getRepository(Ingreso::class)->find($id);

            $form_update = $this->createForm(IngresoType::class,$ingreso);
            $form_update->handleRequest($request);

            if ($form_update->isSubmitted() && $form_update->isValid()){
                $this->getDoctrine()->getManager()->flush();
                return $this->redirectToRoute('admin_mantenimiento_ingreso');
            }
            return $this->render("admin/ingreso/update.html.twig",[
                'ingreso'                => $ingreso,
                'form_update'           => $form_update->createView(),
            ]);
        }

        public function delete(Request $request, $id){
            $ingreso = $this->getDoctrine()->getRepository(Ingreso::class)->find($id);

            $orm = $this->getDoctrine()->getManager();
            $orm->remove($article);
            $orm->flush();
      
            $response = new Response();
            $response->send();
            // return $this->redirectToRoute('admin_mantenimiento_ingreso');
        }
    }