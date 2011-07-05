<?php

namespace Facebes\SnippetBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Facebes\SnippetBundle\Entity\Snippet;
use Facebes\SnippetBundle\Form\SnippetType;

/**
 * Snippet controller.
 *
 * @Route("/snippet")
 */
class SnippetController extends Controller
{
    /**
     * Lists all Snippet entities.
     *
     * @Route("/", name="snippet")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entities = $em->getRepository('FacebesSnippetBundle:Snippet')->findAll();

        return array('entities' => $entities);
    }

    /**
     * Finds and displays a Snippet entity.
     *
     * @Route("/{id}/show", name="snippet_show")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('FacebesSnippetBundle:Snippet')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Snippet entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to create a new Snippet entity.
     *
     * @Route("/new", name="snippet_new")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Snippet();
        $form   = $this->createForm(new SnippetType(), $entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView()
        );
    }

    /**
     * Creates a new Snippet entity.
     *
     * @Route("/create", name="snippet_create")
     * @Method("post")
     * @Template("FacebesSnippetBundle:Snippet:new.html.twig")
     */
    public function createAction()
    {
        $entity  = new Snippet();
        $request = $this->getRequest();
        $form    = $this->createForm(new SnippetType(), $entity);

        if ('POST' === $request->getMethod()) {
            $form->bindRequest($request);

            if ($form->isValid()) {
                $em = $this->getDoctrine()->getEntityManager();
                $em->persist($entity);
                $em->flush();

                return $this->redirect($this->generateUrl('snippet_show', array('id' => $entity->getId())));

            }
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView()
        );
    }

    /**
     * Displays a form to edit an existing Snippet entity.
     *
     * @Route("/{id}/edit", name="snippet_edit")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('FacebesSnippetBundle:Snippet')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Snippet entity.');
        }

        $editForm = $this->createForm(new SnippetType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Edits an existing Snippet entity.
     *
     * @Route("/{id}/update", name="snippet_update")
     * @Method("post")
     * @Template("FacebesSnippetBundle:Snippet:edit.html.twig")
     */
    public function updateAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('FacebesSnippetBundle:Snippet')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Snippet entity.');
        }

        $editForm   = $this->createForm(new SnippetType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        $request = $this->getRequest();

        if ('POST' === $request->getMethod()) {
            $editForm->bindRequest($request);

            if ($editForm->isValid()) {
                $em = $this->getDoctrine()->getEntityManager();
                $em->persist($entity);
                $em->flush();

                return $this->redirect($this->generateUrl('snippet_edit', array('id' => $id)));
            }
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Deletes a Snippet entity.
     *
     * @Route("/{id}/delete", name="snippet_delete")
     * @Method("post")
     */
    public function deleteAction($id)
    {
        $form = $this->createDeleteForm($id);
        $request = $this->getRequest();

        if ('POST' === $request->getMethod()) {
            $form->bindRequest($request);

            if ($form->isValid()) {
                $em = $this->getDoctrine()->getEntityManager();
                $entity = $em->getRepository('FacebesSnippetBundle:Snippet')->find($id);

                if (!$entity) {
                    throw $this->createNotFoundException('Unable to find Snippet entity.');
                }

                $em->remove($entity);
                $em->flush();
            }
        }

        return $this->redirect($this->generateUrl('snippet'));
    }

    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}
