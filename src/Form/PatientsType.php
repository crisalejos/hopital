<?php

namespace App\Form;

use App\Entity\Patients;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\BirthdayType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
class PatientsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
       
        
        $builder
            ->add('lastname',  TextType::class, [
                'label' => 'Nom : ',
                'label_attr'=>['class' => 'form-label'],
                'attr'=>['class' => 'form-control']
                
            ])
            ->add('firstname',  TextType::class, [
                'label' => 'Prénom : ',
                'label_attr'=>['class' => 'form-label'],
                'attr'=>['class' => 'form-control']
                
            ])
            ->add('birthDate',  BirthdayType::class, [
                'widget' => 'single_text',
                'label' => 'Date de naissance : ',
                'label_attr'=>['class' => 'form-label'],
                'attr'=>['class' => 'mt-3 mb-3 combinedPickerInput'],
                'placeholder' => [
                    'year' => 'Année', 'month' => 'Mois', 'day' => 'Jour',
                ]
                
            ])
            ->add('email',  EmailType::class, [
                'label' => 'Email : ',
                'label_attr'=>['class' => 'form-label'],
                'attr'=>['class' => 'form-control']
                
            ])
            ->add('vitalcardNumber',  NumberType::class, [
                'label' => 'Numéro de carte : ',
                'label_attr'=>['class' => 'form-label'],
                'attr'=>['class' => 'form-control']
                
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Patients::class,
        ]);
    }
}
