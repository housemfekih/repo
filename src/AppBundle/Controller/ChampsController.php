<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Champs;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Champ controller.
 *
 * @Route("champs")
 */
class ChampsController extends Controller
{
    /**
     * Lists all champ entities.
     *
     * @Route("/", name="champs_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $champs = $em->getRepository('AppBundle:Champs')->findAll();

        return $this->render('champs/index.html.twig', array(
            'champs' => $champs,
        ));
    }

    /**
     * Creates a new champ entity.
     *
     * @Route("/new", name="champs_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $champ = new Champs();
        $form = $this->createForm('AppBundle\Form\ChampsType', $champ);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($champ);
            $em->flush();

            return $this->redirectToRoute('champs_show', array('id' => $champ->getId()));
        }

        return $this->render('champs/new.html.twig', array(
            'champ' => $champ,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a champ entity.
     *
     * @Route("/{id}", name="champs_show")
     * @Method("GET")
     */
    public function showAction(Champs $champ)
    {
        $deleteForm = $this->createDeleteForm($champ);

        return $this->render('champs/show.html.twig', array(
            'champ' => $champ,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing champ entity.
     *
     * @Route("/{id}/edit", name="champs_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Champs $champ)
    {
        $deleteForm = $this->createDeleteForm($champ);
        $editForm = $this->createForm('AppBundle\Form\ChampsType', $champ);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('champs_edit', array('id' => $champ->getId()));
        }

        return $this->render('champs/edit.html.twig', array(
            'champ' => $champ,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a champ entity.
     *
     * @Route("/{id}", name="champs_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Champs $champ)
    {
        $form = $this->createDeleteForm($champ);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($champ);
            $em->flush();
        }

        return $this->redirectToRoute('champs_index');
    }

    /**
     * Creates a form to delete a champ entity.
     *
     * @param Champs $champ The champ entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Champs $champ)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('champs_delete', array('id' => $champ->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
