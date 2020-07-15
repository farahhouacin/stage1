<?php

namespace CollaborateurBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\NotBlank;

class FonctionType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nomFonction', TextType::class, [
                'label' => 'Fonction',
                'constraints'=>[
                    new NotBlank()
                ]
            ])
            ->add('save', SubmitType::class,  [
                'label' => 'Enregistrer',
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
            'data_class' => 'CollaborateurBundle\Entity\Fonction'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'collaborateurbundle_fonction';
    }


}
