<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AppBundle\Entity\Milestone;
use AppBundle\Form\MilestoneType;

/**
 * Milestone controller.
 */
class MilestoneController extends Controller
{
    /**
     * Creates a new Milestone entity.
     *
     * @Route("/project/{project_id}/milestone/new", name="milestone_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $milestone = new Milestone();

        // create form and pass phase and project request vars
        $form = $this->createForm('AppBundle\Form\MilestoneType', $milestone, [
            'phaseId' => $request->get('phase_id'),
            'projectId' => $request->get('project_id'),
            ]);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            if (!is_null($request->get('phase_id'))) {
                $phase = $em->getRepository('AppBundle:Phase')->find($request->get('phase_id'));
                if (!$phase) {
                    throw new \Exception('Invalid phase');
                }
                $milestone->setPhase($phase);
            }
            $em->persist($milestone);
            $em->flush();

            if (!is_null($request->get('project_id'))) {
                $route = 'project_show';
                $id = $request->get('project_id');
            }
            else {
                $route = 'milestone_show';
                $id = $milestone->getId();
            }

            return $this->redirectToRoute($route, [
                'id' => $id,
                'project_id' => $request->get('project_id'),
                ]);
        }

        return $this->render('milestone/new.html.twig', [
            'milestone' => $milestone,
            'project_id' => $request->get('project_id'),
            'form' => $form->createView(),
        ]);
    }

    /**
     * Finds and displays a Milestone entity.
     *
     * @Route("/project/{project_id}/milestone/{id}", name="milestone_show")
     * @Method("GET")
     */
    public function showAction(Milestone $milestone, Request $request)
    {
        $deleteForm = $this->createDeleteForm($milestone);

        return $this->render('milestone/show.html.twig', array(
            'milestone' => $milestone,
            'project_id' => $request->get('project_id'),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Milestone entity.
     *
     * @Route("/project/{project_id}/milestone/{id}/edit", name="milestone_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Milestone $milestone)
    {
        $deleteForm = $this->createDeleteForm($milestone);
        $editForm = $this->createForm('AppBundle\Form\MilestoneType', $milestone);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($milestone);
            $em->flush();

            return $this->redirectToRoute('milestone_edit', array('id' => $milestone->getId()));
        }

        return $this->render('milestone/edit.html.twig', array(
            'milestone' => $milestone,
            'project_id' => $request->get('project_id'),
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Milestone entity.
     *
     * @Route("/{id}", name="milestone_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Milestone $milestone)
    {
        $form = $this->createDeleteForm($milestone);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($milestone);
            $em->flush();
        }

        return $this->redirectToRoute('project_index');
    }

    /**
     * Creates a form to delete a Milestone entity.
     *
     * @param Milestone $milestone The Milestone entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Milestone $milestone)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('milestone_delete', array('id' => $milestone->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
