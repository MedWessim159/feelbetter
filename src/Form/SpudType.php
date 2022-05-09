<?php

namespace App\Form;

use App\Entity\Produit;
use App\Entity\Shopowner;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SpudType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom',TextType::class)
            ->add('reference',TextType::class)
            ->add('quantite',TextType::class)
            ->add('prix',TextType::class)
            ->add('image',TextType::class)
            ->add('discreption',TextType::class)
            ->add('shopowner',EntityType::class,['class'=>Shopowner::class,
                'choice_label'=>'nom',
                'label'=>'Shopowner'])
            ->add('save', SubmitType::class, [
                'attr' => ['class' => 'save'],
            ]);
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Produit::class,
        ]);
    }
}
