<?php

namespace ProjetBundle\Form;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\UrlType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\NotBlank;

class ProjetType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nameProjet', TextType::class, [
                'label' => 'Nom du projet',
                'constraints'=>[
                    new NotBlank()
                ]
            ])
            ->add('description', TextType::class)
            ->add('dateDebut', DateType::class,[
                'widget' => 'choice'
            ])
            ->add('dateFin', DateType::class,[
                'widget' => 'text'
            ])
            ->add('dateButoir', DateType::class,[
                'widget' => 'choice'
            ])
            ->add('fonctionnalite', TextareaType::class)
            ->add('hebergement', TextType::class)
            ->add('preprod', TextType::class)
            ->add('url', UrlType::class)
//            ->add('clients', EntityType::class, [
//                'class' => 'ClientBundle:Client',
//                'choice_label' => 'name_client'
//            ])
//            ->add('collabs', EntityType::class, [
//                'class' => 'CollaborateurBundle:Collab',
//                'choice_label' => 'name_collab'
//            ])
            ->add('save', SubmitType::class, [
                'label' => 'Enregistrer',
                'attr' => [
                    'class' => 'bouton'
                ]
            ]);
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'ProjetBundle\Entity\Projet'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'projetbundle_projet';
    }


}
