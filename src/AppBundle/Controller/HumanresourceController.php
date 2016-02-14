<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

use AppBundle\Entity\Humanresource;
use AppBundle\Form\HumanresourceType;

/**
 * Humanresource controller.
 *
 * @Route("/activity/{activity_id}/hr")
 */
class HumanresourceController extends Controller
{
    /**
     * Lists all Humanresource entities.
     *
     * @Route("/", name="activity_hr_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $humanresources = $em->getRepository('AppBundle:Humanresource')->findAll();

        return $this->render('humanresource/index.html.twig', array(
            'humanresources' => $humanresources,
        ));
    }

    /**
     * Creates a new Humanresource entity.
     *
     * @Route("/new", name="activity_hr_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        // get corresponding activiy
        $em = $this->getDoctrine()->getManager();
        $activity = $em->getRepository('AppBundle:Activity')->find($request->get('activity_id'));

        $humanresource = new Humanresource();
        $form = $this->createForm('AppBundle\Form\HumanresourceType', $humanresource);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $humanresource->setActivity($activity);
            $em = $this->getDoctrine()->getManager();
            $em->persist($humanresource);
            $em->flush();

            return $this->redirectToRoute('activity_show', [
                'id' => $activity->getId(),
                'project_id' => $project->getId(),
                ]);
        }

        // get project to build back-url
        $project = $activity->getAssociatedProject();

        return $this->render('humanresource/new.html.twig', array(
            'humanresource' => $humanresource,
            'activity_id' => $request->get('activity_id'),
            'project_id' => $project->getId(),
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Humanresource entity.
     *
     */
    public function showAction(Humanresource $humanresource)
    {
        $deleteForm = $this->createDeleteForm($humanresource);

        return $this->render('humanresource/show.html.twig', array(
            'humanresource' => $humanresource,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Humanresource entity.
     *
     */
    public function editAction(Request $request, Humanresource $humanresource)
    {
        $deleteForm = $this->createDeleteForm($humanresource);
        $editForm = $this->createForm('AppBundle\Form\HumanresourceType', $humanresource);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($humanresource);
            $em->flush();

            return $this->redirectToRoute('activity_hr_edit', array('id' => $humanresource->getId()));
        }

        return $this->render('humanresource/edit.html.twig', array(
            'humanresource' => $humanresource,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Humanresource entity.
     *
     */
    public function deleteAction(Request $request, Humanresource $humanresource)
    {
        $form = $this->createDeleteForm($humanresource);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($humanresource);
            $em->flush();
        }

        return $this->redirectToRoute('activity_hr_index');
    }

    /**
     * Creates a form to delete a Humanresource entity.
     *
     * @param Humanresource $humanresource The Humanresource entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Humanresource $humanresource)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('activity_hr_delete', array('id' => $humanresource->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
