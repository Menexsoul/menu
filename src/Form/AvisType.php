<?php

namespace App\Form;

use App\Entity\Avis;
use App\Entity\Personne;
use App\Entity\Plat;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AvisType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('Description')
            ->add('Notes')
            ->add('MesAvis', EntityType::class, [
                'class' => Personne::class,
                'choice_label' => 'id',
            ])
            ->add('LesAvis', EntityType::class, [
                'class' => Plat::class,
                'choice_label' => 'id',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Avis::class,
        ]);
    }
}
