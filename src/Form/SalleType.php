<?php

namespace App\Form;

use App\Entity\Salle;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SalleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('numero',NumberType::class)
            ->add('capacite',NumberType::class)
            ->add('type',ChoiceType::class, [
                'choices'=> [ 'COUR'=> 'COUR',
                    'TP'=> 'TP']
            ])
            
            ->add('Executer',SubmitType::class , [
                'attr' => [
                    'class' => 'btn btn-success'
                ]
            ])


        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Salle::class,
            'attr'=> [
                'novalidate'=> 'novalidate',
            ]
        ]);
    }
}
