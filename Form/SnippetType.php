<?php

namespace Facebes\SnippetBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class SnippetType extends AbstractType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('description')
            ->add('code')
            ->add('tags')
  	    ->add('language')
        ;
    }
}