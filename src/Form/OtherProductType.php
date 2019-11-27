<?php

namespace App\Form;

use App\Entity\Product;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\FileType;

class OtherProductType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('type', ChoiceType::class, [ /*On propose ici des choix prédéfini*/
              'choices'=> [
                ' ' => ' ',
                'Lasagne' => 'Lasagne',
                'Ciabatta' => 'Ciabatta',
                'Déssert' => 'Déssert',
              ],
            ])
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
            'data_class' => Product::class,
        ]);
    }
}
