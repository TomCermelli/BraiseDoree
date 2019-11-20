<?php

namespace App\Form;

use App\Entity\Pizza;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\FileType;



class PizzaType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('ingredient')
            ->add('sauce', ChoiceType::class, [
              'choices'=> [
                ' ' => ' ',
                'rouge' => 'rouge',
                'blanche' => 'blanche',
              ],
            ])
            ->add('price')
            ->add('highPrice')
            ->add('imageFile', FileType::class, [
              'required' => false
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Pizza::class,
        ]);
    }
}
