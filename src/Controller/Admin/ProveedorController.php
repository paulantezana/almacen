<?php
    namespace App\Controller\Admin;

    use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
    use Symfony\Component\HttpFoundation\Response;
    use Symfony\Component\HttpFoundation\Request;
    use Symfony\Component\Routing\Annotation\Route;

    use App\Entity\Proveedor;
    use App\Form\ProveedorType;
    
    class ProveedorController extends AbstractController
    {
        public function index($currentPage = 1, $limit = 3)
        {
            $repository = $this->getDoctrine()->getRepository(Proveedor::class);
            $proveedores = $repository->findAll();
            return $this->render('admin/proveedor/index.html.twig',[
                'proveedores' => $proveedores,
            ]);
        }

        public function create(Request $request){
            $proveedor = new Proveedor();
            $form_create = $this->createForm(ProveedorType::class,$proveedor);
            $form_create->handleRequest($request);
            if ($form_create->isSubmitted() && $form_create->isValid()){
                $proveedor = $form_create->getData();
                $orm = $this->getDoctrine()->getManager();
                $orm->persist($proveedor);
                $orm->flush();
                return $this->redirectToRoute('admin_mantenimiento_proveedor');
            }
            return $this->render("admin/proveedor/create.html.twig",[
                'form_create' => $form_create->createView(),
                'proveedor' => $proveedor,
            ]);
        }

        public function update(Request $request, $id){
            $proveedor = new Proveedor();
            $proveedor = $this->getDoctrine()->getRepository(Proveedor::class)->find($id);

            $form_update = $this->createForm(ProveedorType::class,$proveedor);
            $form_update->handleRequest($request);

            if ($form_update->isSubmitted() && $form_update->isValid()){
                $this->getDoctrine()->getManager()->flush();
                return $this->redirectToRoute('admin_mantenimiento_proveedor');
            }
            return $this->render("admin/proveedor/update.html.twig",[
                'proveedor'                => $proveedor,
                'form_update'           => $form_update->createView(),
            ]);
        }

        public function delete(Request $request, $id){
            $proveedor = $this->getDoctrine()->getRepository(Proveedor::class)->find($id);

            $orm = $this->getDoctrine()->getManager();
            $orm->remove($article);
            $orm->flush();
      
            $response = new Response();
            $response->send();
            // return $this->redirectToRoute('admin_mantenimiento_proveedor');
        }
    }