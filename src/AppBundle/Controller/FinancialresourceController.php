<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

use AppBundle\Entity\Financialresource;
use AppBundle\Form\FinancialresourceType;

/**
 * Financialresource controller.
 *
 * @Route("/activity/{activity_id}/fr")
 */
class FinancialresourceController extends Controller
{
    /**
     * Creates a new Financialresource entity.
     *
     * @Route("/new", name="activity_fr_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        // get activity and project for creating routes
        $em = $this->getDoctrine()->getManager();
        $activity = $em->getRepository('AppBundle:Activity')->find($request->get('activity_id'));
        $project = $activity->getAssociatedProject();

        $financialResource = new Financialresource();
        $form = $this->createForm('AppBundle\Form\FinancialresourceType', $financialResource);
        $form->handleRequest($request);


        if ($form->isSubmitted() && $form->isValid()) {
            $financialResource->setActivity($activity);
            $em = $this->getDoctrine()->getManager();
            $em->persist($financialResource);
            $em->flush();

            return $this->redirectToRoute('activity_show', [
                'id' => $activity->getId(),
                'project_id' => $project->getId(),
            ]);
        }

        return $this->render('financialresource/new.html.twig', array(
            'financialresource' => $financialResource,
            'activity_id' => $request->get('activity_id'),
            'project_id' => $project->getId(),
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Financialresource entity.
     *
     */
    public function showAction(Financialresource $financialresource)
    {
        $deleteForm = $this->createDeleteForm($financialresource);

        return $this->render('financialresource/show.html.twig', array(
            'financialresource' => $financialresource,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Financialresource entity.
     *
     */
    public function editAction(Request $request, Financialresource $financialresource)
    {
        $deleteForm = $this->createDeleteForm($financialresource);
        $editForm = $this->createForm('AppBundle\Form\FinancialresourceType', $financialresource);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($financialresource);
            $em->flush();

            return $this->redirectToRoute('activity_fr_edit', array('id' => $financialresource->getId()));
        }

        return $this->render('financialresource/edit.html.twig', array(
            'financialresource' => $financialresource,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Financialresource entity.
     *
     */
    public function deleteAction(Request $request, Financialresource $financialresource)
    {
        $form = $this->createDeleteForm($financialresource);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($financialresource);
            $em->flush();
        }

        return $this->redirectToRoute('activity_fr_index');
    }

    /**
     * Creates a form to delete a Financialresource entity.
     *
     * @param Financialresource $financialresource The Financialresource entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Financialresource $financialresource)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('activity_fr_delete', array('id' => $financialresource->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
