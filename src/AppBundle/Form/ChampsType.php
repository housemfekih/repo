<?php

namespace AppBundle\Form;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
class ChampsType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        //->add('nomChamps')->add('typeChamps')->add('longeurChamps');

        ->add('nomChamps', TextType::class, array(
            'label' => "Nom de champ : ",
            'attr' => ['class' => 'form-control'],
            'label_attr' => ['class' => 'form-control-label']
        )) ->add('typeChamps', ChoiceType::class, array(
                'choices'  => array(
                    'string' => "text",
                    'Number' => "number",
                    'file' => "File",
                    'date' => "date",
					'TextArea' => 'textarea'
                ),
                'label' => "Type de champ : ",
                'attr' => ['class' => 'form-control'],
                'label_attr' => ['class' => 'form-control-label']

        ))
            ->add('longeurChamps', IntegerType::class, array('attr' => array(
                'min' => '1',
                'max' => '20',
                'class' => 'form-control',
            )));
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Champs'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_champs';
    }


}
