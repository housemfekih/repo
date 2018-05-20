<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Sections;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Section controller.
 *
 * @Route("sections")
 */
class SectionsController extends Controller
{
    /**
     * Lists all section entities.
     *
     * @Route("/", name="sections_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $sections = $em->getRepository('AppBundle:Sections')->findAll();

        return $this->render('sections/index.html.twig', array(
            'sections' => $sections,
        ));
    }

    /**
     * Creates a new section entity.
     *
     * @Route("/new", name="sections_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $section = new Sections();
        $form = $this->createForm('AppBundle\Form\SectionsType', $section);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($section);
            $em->flush();

            return $this->redirectToRoute('sections_show', array('id' => $section->getId()));
        }

        return $this->render('sections/new.html.twig', array(
            'section' => $section,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a section entity.
     *
     * @Route("/{id}", name="sections_show")
     * @Method("GET")
     */
    public function showAction(Sections $section)
    {
        $deleteForm = $this->createDeleteForm($section);

        return $this->render('sections/show.html.twig', array(
            'section' => $section,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing section entity.
     *
     * @Route("/{id}/edit", name="sections_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Sections $section)
    {
        $deleteForm = $this->createDeleteForm($section);
        $editForm = $this->createForm('AppBundle\Form\SectionsType', $section);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('sections_edit', array('id' => $section->getId()));
        }

        return $this->render('sections/edit.html.twig', array(
            'section' => $section,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a section entity.
     *
     * @Route("/{id}", name="sections_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Sections $section)
    {
        $form = $this->createDeleteForm($section);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($section);
            $em->flush();
        }

        return $this->redirectToRoute('sections_index');
    }

    /**
     * Creates a form to delete a section entity.
     *
     * @param Sections $section The section entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Sections $section)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('sections_delete', array('id' => $section->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
