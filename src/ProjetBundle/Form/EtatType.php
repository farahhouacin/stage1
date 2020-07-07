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
        $builder
//            ->add('nomEtat',ChoiceType::class,[
//                'label'=> 'Etat'
//                'choices' =>[
//                    ''
//    ]
//            ])
//            $builder->add('isAttending', ChoiceType::class, [
//                'choices'  => [
//                    'Maybe' => null,
//                    'Yes' => true,
//                    'No' => false,
//                ],
//            ])
            ->add('dateDeb',DateType::class,[
                'label'=>'Date de début du projet'
            ])
            ->add('dateFin',DateType::class,[
                'label'=> 'Date de fin du projet'
            ]);
    }/**
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
