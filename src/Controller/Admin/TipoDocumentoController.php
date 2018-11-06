<?php
    namespace App\Controller\Admin;

    use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
    use Symfony\Component\HttpFoundation\Response;
    use Symfony\Component\HttpFoundation\Request;
    use Symfony\Component\Routing\Annotation\Route;

    use App\Entity\TipoDocumento;
    use App\Form\TipoDocumentoType;
    
    class TipoDocumentoController extends AbstractController
    {
        public function index($currentPage = 1, $limit = 3)
        {
            $repository = $this->getDoctrine()->getRepository(TipoDocumento::class);
            $tipodocumentos = $repository->findAll();
            return $this->render('admin/tipodocumento/index.html.twig',[
                'tipodocumentos' => $tipodocumentos,
            ]);
        }

        public function create(Request $request){
            $tipodocumento = new TipoDocumento();
            $form_create = $this->createForm(TipoDocumentoType::class,$tipodocumento);
            $form_create->handleRequest($request);
            if ($form_create->isSubmitted() && $form_create->isValid()){
                $tipodocumento = $form_create->getData();
                $orm = $this->getDoctrine()->getManager();
                $orm->persist($tipodocumento);
                $orm->flush();
                return $this->redirectToRoute('admin_mantenimiento_tipo_documento');
            }
            return $this->render("admin/TipoDocumento/create.html.twig",[
                'form_create' => $form_create->createView(),
                'tipodocumento' => $tipodocumento,
            ]);
        }

        public function update(Request $request, $id){
            $tipodocumento = new TipoDocumento();
            $tipodocumento = $this->getDoctrine()->getRepository(TipoDocumento::class)->find($id);

            $form_update = $this->createForm(TipoDocumentoType::class,$tipodocumento);
            $form_update->handleRequest($request);

            if ($form_update->isSubmitted() && $form_update->isValid()){
                $this->getDoctrine()->getManager()->flush();
                return $this->redirectToRoute('admin_mantenimiento_tipo_documento');
            }
            return $this->render("admin/tipodocumento/update.html.twig",[
                'tipodocumento'                => $tipodocumento,
                'form_update'           => $form_update->createView(),
            ]);
        }

        public function delete(Request $request, $id){
            $tipodocumento = $this->getDoctrine()->getRepository(TipoDocumento::class)->find($id);

            $orm = $this->getDoctrine()->getManager();
            $orm->remove($article);
            $orm->flush();
      
            $response = new Response();
            $response->send();
            // return $this->redirectToRoute('admin_mantenimiento_tipo_documento');
        }
    }