<?php

namespace App\Controller;

use App\Entity\Salle;
use App\Form\SalleType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


/**
 * @Route("/salle")
 */
class SalleController extends AbstractController
{


    /**
     * @Route("/", name="salle.list")
     */
    public function list()
    {

        $repository = $this->getDoctrine()->getRepository(Salle::class);
        $salle = $repository->findAll();

        return $this->render('salle/index.html.twig', [
            'salle' => $salle,
        ]);
    }

    /**
     * @Route("/add", name="salle.add")
     */
    public function add(Request $request)
    {
        $salle = new Salle();
        $form = $this->createForm(SalleType::class, $salle);
        $form->remove('Emploi');
        $form->handleRequest($request);
        if ($form->isSubmitted()){
            $em= $this->getDoctrine()->getManager();
            $em->persist($salle);
            $em->flush();

            return $this->redirectToRoute('salle.list');
        }
        return $this->render('salle/add.html.twig', [
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/modifier/{id?0}", name="salle.edit")
     */
    public function ModifPersonne( Request $request,
                                   Salle $salle = null
    ) {
        if(!$salle)
            $salle = new Salle();
        $form = $this->createForm(SalleType::class, $salle);
        $form->remove('Emploi');
        $form->handleRequest($request);
        if ($form->isSubmitted()){
            $em= $this->getDoctrine()->getManager();
            $em->persist($salle);
            $em->flush();

            return $this->redirectToRoute('salle.list');
        }
        return $this->render('salle/add.html.twig', [
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/supprimer/{id}", name="salle.delete")
     */
    public function deletePersonne(Salle $salle = null) {


        if ($salle) {
            $manager = $this->getDoctrine()->getManager();
            $manager->remove($salle);
            $manager->flush();
        } else {
            $this->addFlash('error', 'salle innexistante');
        }
        return $this->redirectToRoute('salle.list');
    }

    /**
     * @Route("/detail/{id}", name="salle.detail")
     */
    public function findPersonneById($id) {

        $repository = $this->getDoctrine()->getRepository(Salle::class);

        $salle = $repository->find($id);
        if ($salle) {
            return $this->render('salle/detail.html.twig', ['salle' => $salle]);
        } else {
            $this->addFlash('error', 'salle innexistante');
            return $this->redirectToRoute('salle.list');
        }
    }
}
