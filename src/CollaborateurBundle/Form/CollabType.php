<?php

namespace CollaborateurBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CollabType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('passwordCollab', PasswordType::class)
            ->add('emailCollab', EmailType::class)
            ->add('nameCollab', TextType::class)
            ->add('firstnameCollab', TextType::class)
            ->add('save', SubmitType::class,  [
            'label' => 'Ajouter un collaborateur',
            'attr' => [
                'class' => 'btn'
            ]
        ]);
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'CollaborateurBundle\Entity\Collab'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'collaborateurbundle_collab';
    }


}
