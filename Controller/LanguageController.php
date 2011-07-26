<?php

namespace Facebes\SnippetBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Facebes\SnippetBundle\Entity\Language;
use Facebes\SnippetBundle\Form\LanguageType;
use Symfony\Component\HttpFoundation\File\UploadedFile;

/**
 * Language controller.
 *
 * @Route("/language")
 */
class LanguageController extends Controller
{
    /**
     * Lists all Language entities.
     *
     * @Route("/", name="language")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entities = $em->getRepository('FacebesSnippetBundle:Language')->findAll();

        return array('entities' => $entities);
    }

    /**
     * Finds and displays a Language entity.
     *
     * @Route("/{id}/show", name="language_show")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('FacebesSnippetBundle:Language')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Language entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to create a new Language entity.
     *
     * @Route("/new", name="language_new")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Language();
        $form   = $this->createForm(new LanguageType(), $entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView()
        );
    }

    /**
     * Creates a new Language entity.
     *
     * @Route("/create", name="language_create")
     * @Method("post")
     * @Template("FacebesSnippetBundle:Language:new.html.twig")
     */
    public function createAction()
    {
        $entity  = new Language();
        $request = $this->getRequest();
        $form    = $this->createForm(new LanguageType(), $entity);

        if ('POST' === $request->getMethod()) {
            $form->bindRequest($request);

            if ($form->isValid()) {
                
   //             $files = $request->files->get($form->getName());
     //           $uploadedFile = $files['icon'];
                //echo '<pre>';
//                print_r($uploadedFile);
//                
//                print_r($uploadedFile->getfileName());
//                print_r($uploadedFile->getpathName());
//                print_r($uploadedFile->getSize());
//                print_r($uploadedFile->guessExtension());
//                print_r($uploadedFile->getClientOriginalName());                
                
//                $uploadedFile->getPath();
//                $uploadedFile->getOriginalName();
//                $uploadedFile->getMimeType();
                  
                //$uploadedFile->Move($_SERVER['DOCUMENT_ROOT']."/uploads", $uploadedFile->getClientOriginalName());
                
               // print_r($entity);
               
                $em = $this->getDoctrine()->getEntityManager();
                                
                //$entity->upload();
                $em->persist($entity);
                $em->flush();
               $this->get('session')->setFlash('notice', 'The file is uploaded!');

                return $this->redirect($this->generateUrl('language_show', array('id' => $entity->getId())));

            }
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView()
        );
    }

    /**
     * Displays a form to edit an existing Language entity.
     *
     * @Route("/{id}/edit", name="language_edit")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('FacebesSnippetBundle:Language')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Language entity.');
        }

        $editForm = $this->createForm(new LanguageType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Edits an existing Language entity.
     *
     * @Route("/{id}/update", name="language_update")
     * @Method("post")
     * @Template("FacebesSnippetBundle:Language:edit.html.twig")
     */
    public function updateAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('FacebesSnippetBundle:Language')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Language entity.');
        }

        $editForm   = $this->createForm(new LanguageType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        $request = $this->getRequest();

        if ('POST' === $request->getMethod()) {
            $editForm->bindRequest($request);

            if ($editForm->isValid()) {
                $em = $this->getDoctrine()->getEntityManager();
                $em->persist($entity);
                $em->flush();

                return $this->redirect($this->generateUrl('language_edit', array('id' => $id)));
            }
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Deletes a Language entity.
     *
     * @Route("/{id}/delete", name="language_delete")
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
                $entity = $em->getRepository('FacebesSnippetBundle:Language')->find($id);

                if (!$entity) {
                    throw $this->createNotFoundException('Unable to find Language entity.');
                }

                $em->remove($entity);
                $em->flush();
            }
        }

        return $this->redirect($this->generateUrl('language'));
    }

    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }

    /**
     * @Template()
     */
    /*    public function uploadAction()
    {
      $document = new Document();
      $form = $this->createFormBuilder($document)
        ->add('name')
        ->add('syntax')
        ->add('icon')
        ->getForm();

      if($this->getRequest()->getMethod() === 'POST'){
        $form->bindRequest($this->getRequest());
        if($form->isValid()){
          $em = $this->getDoctrine()->getEntityManager();

          $em->persist($document);
          $em->flush();

          $this->redirect($this->generateUrl('Language'));
        }
      }
      return array('form' => $form->createView());
    }
    */

}
