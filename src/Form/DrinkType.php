<?php

namespace App\Form;

use App\Entity\Drink;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;

class DrinkType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('centiliter')
            ->add('name')
            ->add('price')
            ->add('imageFile', FileType::class, [ /*On force le champ à etre de type File afin de pouvoir upload un fichier de notre ordinateur*/
              'required' => false
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Drink::class,
        ]);
    }
}
