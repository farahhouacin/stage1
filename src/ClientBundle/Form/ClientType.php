<?php

namespace ClientBundle\Form;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\NotBlank;

class ClientType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nameClient', TextType::class,[
                'label' => 'Nom du Client',
                'constraints'=>[
                    new NotBlank()
                ]
            ])
            ->add('firstnameClient', TextType::class, [
                'label' => 'Prénom du Client'])
            ->add('telClient', TelType::class,[
                'label' => 'Tel du Client',
                'constraints'=>[
                    new NotBlank()
                ]] )
            ->add('emailClient', EmailType::class, [
            'label' => 'Email du Client'])
            ->add('roles', EntityType::class, [
                'class' => 'CollaborateurBundle:Role',
                'choice_label' => 'nom_role',
                'multiple' => true,
            ])
            ->add('save', SubmitType::class,  [
                'label' => 'Enregistrer',
                'attr' => [
                    'class' => 'bouton',
                ]
            ]);
        //->add('reset', ResetType::class,  [
                   // 'label' => 'Annuler',
                    //'attr' => [
                      //  'class' => 'hari'
                    //]
           // ]);
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'ClientBundle\Entity\Client'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'clientbundle_client';
    }


}
