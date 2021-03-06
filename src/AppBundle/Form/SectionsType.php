<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\TextType;


class SectionsType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $builder
        
        ->add('nomSection', TextType::class, array(
            'label' => "Nom de section : ",
            'attr' => ['class' => 'form-control'],
            'label_attr' => ['class' => 'form-control-label']
        ))
      
		->add('sectionChampsRel', EntityType::class, array(
			// looks for choices from this entity
			'class' => 'AppBundle:Champs',

			// uses the User.username property as the visible option string
			'choice_label' => 'nomChamps',

			// used to render a select box, check boxes or radios
			 'multiple' => true,
             'label' => "Champs : ",
            'attr' => ['class' => 'chosen-select form-control'],
            'label_attr' => ['class' => 'form-control-label']
        ));
		

    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Sections'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_sections';
    }


}
