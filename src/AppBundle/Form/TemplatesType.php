<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\FileType;

class TemplatesType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        //->add('nomTemlate')->add('fichierNom')
        //->add('groupeId');

        ->add('nomTemplate', TextType::class, array(
            'label' => "Nom de groupe : ",
            'attr' => ['class' => 'form-control'],
            'label_attr' => ['class' => 'form-control-label']


        ))
        ->add('fichierNom', FileType::class, array(
            'label' => "Template en HTML  : ",
            'attr' => ['class' => 'form-control'],
            'label_attr' => ['class' => 'form-control-label'],
			'multiple' => true


        ))
        ->add('groupeId', EntityType::class, array(
			// looks for choices from this entity
			'class' => 'AppBundle:Groupes',

			// uses the User.username property as the visible option string
			'choice_label' => 'nomGroupe',

			// used to render a select box, check boxes or radios
			 'multiple' => false,
             'label' => "Nom de groupe : ",
            'attr' => ['class' => 'chosen-select form-control'],
            'label_attr' => ['class' => 'form-control-label']
        ));


    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Templates'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_templates';
    }


}
