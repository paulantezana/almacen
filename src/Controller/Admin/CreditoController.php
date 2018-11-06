<?php
    namespace App\Controller\Admin;

    use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
    use Symfony\Component\HttpFoundation\Response;
    use Symfony\Component\HttpFoundation\Request;
    use Symfony\Component\Routing\Annotation\Route;

    use App\Entity\Credito;
    use App\Form\CreditoType;
    
    class CreditoController extends AbstractController
    {
        public function index($currentPage = 1, $limit = 3)
        {
            $repository = $this->getDoctrine()->getRepository(Credito::class);
            $creditos = $repository->findAll();
            return $this->render('admin/Credito/index.html.twig',[
                'creditos' => $creditos,
            ]);
        }

        public function create(Request $request){
            $credito = new Credito();
            $form_create = $this->createForm(CreditoType::class,$credito);
            $form_create->handleRequest($request);
            if ($form_create->isSubmitted() && $form_create->isValid()){
                $credito = $form_create->getData();
                $orm = $this->getDoctrine()->getManager();
                $orm->persist($credito);
                $orm->flush();
                return $this->redirectToRoute('admin_mantenimiento_credito');
            }
            return $this->render("admin/credito/create.html.twig",[
                'form_create' => $form_create->createView(),
                'credito' => $credito,
            ]);
        }

        public function update(Request $request, $id){
            $credito = new Credito();
            $credito = $this->getDoctrine()->getRepository(Credito::class)->find($id);

            $form_update = $this->createForm(CreditoType::class,$credito);
            $form_update->handleRequest($request);

            if ($form_update->isSubmitted() && $form_update->isValid()){
                $this->getDoctrine()->getManager()->flush();
                return $this->redirectToRoute('admin_mantenimiento_credito');
            }
            return $this->render("admin/credito/update.html.twig",[
                'credito'                => $credito,
                'form_update'           => $form_update->createView(),
            ]);
        }

        public function delete(Request $request, $id){
            $credito = $this->getDoctrine()->getRepository(Credito::class)->find($id);

            $orm = $this->getDoctrine()->getManager();
            $orm->remove($article);
            $orm->flush();
      
            $response = new Response();
            $response->send();
            // return $this->redirectToRoute('admin_mantenimiento_credito');
        }
    }