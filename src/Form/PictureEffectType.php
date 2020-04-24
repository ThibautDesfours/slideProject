<?php

namespace App\Form;

use App\Entity\PictureEffect;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;

class PictureEffectType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('length_effect')
            ->add('x_start',HiddenType::class)
            ->add('y_start',HiddenType::class)
            ->add('w_start',HiddenType::class)
            ->add('h_start',HiddenType::class)
            ->add('x_end',HiddenType::class)
            ->add('y_end',HiddenType::class)
            ->add('w_end',HiddenType::class)
            ->add('h_end',HiddenType::class)
            ->add('picture_id', HiddenType::class, array(
                'mapped' => false
            ));
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => PictureEffect::class,
            'attr' => ['id' => 'formEffect']
        ]);
    }
}
