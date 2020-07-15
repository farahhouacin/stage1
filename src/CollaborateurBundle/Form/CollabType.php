<?php

namespace CollaborateurBundle\Form;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\ResetType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
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
            ->add('nameCollab', TextType::class, [
                'label' => 'Nom'
            ])
            ->add('firstnameCollab', TextType::class,[
                'label' => 'Prénom'
            ])
            ->add('emailCollab', EmailType::class, [
                'label' => 'Email'
            ])
            ->add('telCollab', TelType::class, [
                'label' => 'Numéro de téléphone'
            ])
            ->add('passwordCollab', PasswordType::class,[
                'label'=> 'Mot de passe'
            ])
//            ->add('roles', EntityType::class, [
//                'class' => 'CollaborateurBundle:Role',
//                'choice_label' => 'nom_role',
//            ])
//            ->add('fonctions', EntityType::class, [
//                'class' => 'CollaborateurBundle:Fonction',
//                'choice_label' => 'nom_fonction',
//            ])
            ->add('save', SubmitType::class,  [
            'label' => 'Enregistrer',
            'attr' => [
                'class' => 'btn bouton'
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
