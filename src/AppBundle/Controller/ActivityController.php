<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AppBundle\Entity\Activity;
use AppBundle\Form\ActivityType;

/**
 * Activity controller.
 */
class ActivityController extends Controller
{
    /**
     * Creates a new Activity entity.
     *
     * @Route("/project/{project_id}/activity/new", name="activity_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $activity = new Activity();

        // create form and pass phase and project request vars
        $form = $this->createForm('AppBundle\Form\ActivityType', $activity, [
            'phaseId' => $request->get('phase_id'),
            'projectId' => $request->get('project_id'),
            ]);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            if (!is_null($request->get('phase'))) {
                $phase = $em->getRepository('AppBundle:Phase')->find($request->get('phase'));
                if (!$phase) {
                    throw new \Exception('Invalid phase');
                }
                $activity->setPhase($phase);
            }
            $em->persist($activity);
            $em->flush();

            if (!is_null($request->get('project'))) {
                $route = 'project_show';
                $id = $request->get('project');
            }
            else {
                $route = 'activity_show';
                $id = $activity->getId();
            }

            return $this->redirectToRoute($route, array('id' => $id));
        }

        return $this->render('activity/new.html.twig', array(
            'activity' => $activity,
            'project_id' => $request->get('project_id'),
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Activity entity.
     *
     * @Route("/project/{project_id}/activity/{id}", name="activity_show")
     * @Method("GET")
     */
    public function showAction(Activity $activity, Request $request)
    {
        $deleteForm = $this->createDeleteForm($activity);

        return $this->render('activity/show.html.twig', array(
            'activity' => $activity,
            'project_id' => $request->get('project_id'),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Activity entity.
     *
     * @Route("/project/{project_id}/activity/{id}/edit", name="activity_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Activity $activity)
    {
        $deleteForm = $this->createDeleteForm($activity);
        $editForm = $this->createForm('AppBundle\Form\ActivityType', $activity);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($activity);
            $em->flush();

            return $this->redirectToRoute('activity_edit', array('id' => $activity->getId()));
        }

        return $this->render('activity/edit.html.twig', array(
            'activity' => $activity,
            'project_id' => $request->get('project_id'),
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Activity entity.
     *
     * @Route("/{id}", name="activity_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Activity $activity)
    {
        $form = $this->createDeleteForm($activity);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($activity);
            $em->flush();
        }

        return $this->redirectToRoute('project_index');
    }

    /**
     * Creates a form to delete a Activity entity.
     *
     * @param Activity $activity The Activity entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Activity $activity)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('activity_delete', array('id' => $activity->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
