<?php

namespace App\Form;

use App\Entity\Evenement;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;

class EvenementType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nomEvent',TextType::class,['attr'=>array('placeholder'=> 'entrer le titre'),'required'=>false,])
            ->add('date',DateType::class,['widget'=>'single_text','required'=>false,])
            ->add('descriptionEvent',TextareaType::class,['attr'=>array('placeholder'=> 'entrer une description'),'required'=>false,])
            ->add('prixEvent',MoneyType::class,['attr'=>array('placeholder'=> 'entrer le prix'),'required'=>false,])
            ->add('nbrPlace',TextType::class,['attr'=>array('placeholder'=> 'entrer le nombre de place à réserver'),'required'=>false,])
            ->add('image', FileType::class, array('data_class' => null))
            //->add('valide')
            //->add('participants')
            //->add('idpatient')
            //->add('idexpert')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Evenement::class,
        ]);
    }
}
