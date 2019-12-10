<?php

namespace App\Form;

use App\Entity\Formula;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;

class FormulaType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('price')
            ->add('imageFile', FileType::class, [ /*On force le champ à etre de type File afin de pouvoir upload un fichier de notre ordinateur*/
              'required' => false
            ])
            ->add('imageFile2', FileType::class, [ /*On force le champ à etre de type File afin de pouvoir upload un fichier de notre ordinateur*/
              'required' => false
            ])
            ->add('imageFile3', FileType::class, [ /*On force le champ à etre de type File afin de pouvoir upload un fichier de notre ordinateur*/
              'required' => false
            ])
            ->add('produit')
            ->add('dessert')
            ->add('drink')

        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Formula::class,
        ]);
    }
}
