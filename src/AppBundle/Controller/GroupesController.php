<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Groupes;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Groupe controller.
 *
 * @Route("groupes")
 */
class GroupesController extends Controller
{
    /**
     * Lists all groupe entities.
     *
     * @Route("/", name="groupes_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $groupes = $em->getRepository('AppBundle:Groupes')->findAll();

        return $this->render('groupes/index.html.twig', array(
            'groupes' => $groupes,
        ));
    }

    /**
     * Creates a new groupe entity.
     *
     * @Route("/new", name="groupes_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $groupe = new Groupes();
        $form = $this->createForm('AppBundle\Form\GroupesType', $groupe);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($groupe);
            $em->flush();

            return $this->redirectToRoute('groupes_show', array('id' => $groupe->getId()));
        }

        return $this->render('groupes/new.html.twig', array(
            'groupe' => $groupe,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a groupe entity.
     *
     * @Route("/{id}", name="groupes_show")
     * @Method("GET")
     */
    public function showAction(Groupes $groupe)
    {
        $deleteForm = $this->createDeleteForm($groupe);

        return $this->render('groupes/show.html.twig', array(
            'groupe' => $groupe,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing groupe entity.
     *
     * @Route("/{id}/edit", name="groupes_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Groupes $groupe)
    {
        $deleteForm = $this->createDeleteForm($groupe);
        $editForm = $this->createForm('AppBundle\Form\GroupesType', $groupe);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('groupes_edit', array('id' => $groupe->getId()));
        }

        return $this->render('groupes/edit.html.twig', array(
            'groupe' => $groupe,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a groupe entity.
     *
     * @Route("/{id}", name="groupes_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Groupes $groupe)
    {
        $form = $this->createDeleteForm($groupe);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($groupe);
            $em->flush();
        }

        return $this->redirectToRoute('groupes_index');
    }

    /**
     * Creates a form to delete a groupe entity.
     *
     * @param Groupes $groupe The groupe entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Groupes $groupe)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('groupes_delete', array('id' => $groupe->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
