<?php

namespace App\Form;

use App\Entity\Enseignant;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EnseignantType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom')
            ->add('prenom')
            ->add('dateNaissance')
            ->add('age')
            ->add('adresse')
            ->add('numTel')
            ->add('lieuNaissance')
            ->add('sexe',ChoiceType::class ,array(
                'choices' => [
                'femme' => 'FEMME',
                'homme' => 'HOMME'
                ]
            ))
            ->add('cin')
            ->add('login')
            ->add('mdp')
            ->add('email')
            ->add('Matiere')
            ->add('Emploi')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Enseignant::class,
        ]);
    }
}
