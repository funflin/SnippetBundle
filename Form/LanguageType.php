<?php

namespace Facebes\SnippetBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class LanguageType extends AbstractType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder
          ->add('name')
          ->add('syntax')
          ->add('icon','file')
        ;
    }
}