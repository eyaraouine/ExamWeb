
<?php

namespace App\Controller;

use App\Entity\PFE;
use App\Form\PfeType;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PfeController extends AbstractController
{
    #[Route('/pfe', name: 'app_pfe')]
    public function addPfe(ManagerRegistry $doctrine,\Symfony\Component\HttpFoundation\Request $request,PFE $pfe=null): Response
    {
     $pfe=new PFE();

        $form=$this->createForm(PfeType::class,$pfe);
        $form->handleRequest($request);
        if($form->isSubmitted() ){
            $manager=$doctrine->getManager();
        $manager->persist($pfe);
        $manager->flush();


            $repository = $doctrine->getRepository(PFE::class);
            $repository=$repository->findOneBy(['id'=>$pfe]);
        return $this->render('infopfe.html.twig',['pfe'=>$pfe]);
    }
        else{
            return $this->render('form.html.twig', [
                'form'=>$form->createView()
            ]);
        }}
      //  #[Route('/pfe/nb',name:'pfe')]
    //  public function nbpfe(ManagerRegistry $doctrine){
    //       $repository=$doctrine->getRepository();
    //       $stats=$repository->findNb();
    //       return$this->render('statistique.html.twig',['stats'=>$stats];

    // }
    //}
}
