<?php

namespace ProjetBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EtatType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
//        const MAQUETTE = 'maquette';
//        const ENCOURS = 'encours';
//        const FIN = 'fin';

        $builder
//            ->add('nameEtat', ChoiceType::class, [
//                'nameEtat' => [
//                    'En cours de validation (maquette)' => self::MAQUETTE,
//                    'En cours de réalisation' => self::ENCOURS,
//                    'Terminé' => self::FIN
//                ],
//                'label' => 'Etat',
//                'expanded' => 'true',
//                'multiple' => 'true'
//            ])
            ->add('dateDeb', DateType::class, [
                'label' => 'Date de début du projet'
            ])
            ->add('dateFin', DateType::class, [
                'label' => 'Date de fin du projet'
            ]);
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'ProjetBundle\Entity\Etat'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'projetbundle_etat';
    }


}
