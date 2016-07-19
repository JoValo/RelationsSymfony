<?php

namespace DsBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use DsBundle\Entity\Domicilio;
use DsBundle\Form\DomicilioType;

/**
 * Domicilio controller.
 *
 */
class DomicilioController extends Controller
{

    /**
     * Lists all Domicilio entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('DsBundle:Domicilio')->findAll();

        return $this->render('DsBundle:Domicilio:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Domicilio entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Domicilio();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('domicilio_show', array('id' => $entity->getId())));
        }

        return $this->render('DsBundle:Domicilio:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Domicilio entity.
     *
     * @param Domicilio $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Domicilio $entity)
    {
        $form = $this->createForm(new DomicilioType(), $entity, array(
            'action' => $this->generateUrl('domicilio_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Domicilio entity.
     *
     */
    public function newAction()
    {
        $entity = new Domicilio();
        $form   = $this->createCreateForm($entity);

        return $this->render('DsBundle:Domicilio:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Domicilio entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('DsBundle:Domicilio')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Domicilio entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('DsBundle:Domicilio:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Domicilio entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('DsBundle:Domicilio')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Domicilio entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('DsBundle:Domicilio:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Domicilio entity.
    *
    * @param Domicilio $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Domicilio $entity)
    {
        $form = $this->createForm(new DomicilioType(), $entity, array(
            'action' => $this->generateUrl('domicilio_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Domicilio entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('DsBundle:Domicilio')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Domicilio entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('domicilio_edit', array('id' => $id)));
        }

        return $this->render('DsBundle:Domicilio:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Domicilio entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('DsBundle:Domicilio')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Domicilio entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('domicilio'));
    }

    /**
     * Creates a form to delete a Domicilio entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('domicilio_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
