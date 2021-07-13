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
                'attr'=>['class' => 'form-control'],
                'help' => 'Ecrivez le nom du patient avec des lettres'
            ])
            ->add('firstname',  TextType::class, [
                'label' => 'Prénom : ',
                'label_attr'=>['class' => 'form-label'],
                'attr'=>['class' => 'form-control'],
                'help' => 'Ecrivez le prénom du patient avec des lettres'
            ])
            ->add('birthDate',  BirthdayType::class, [
                'widget' => 'single_text',
                'label' => 'Date de naissance : ',
                'label_attr'=>['class' => 'form-label'],
                'attr'=>['class' => 'mt-3 mb-3 combinedPickerInput'],              
            ])
            ->add('email',  EmailType::class, [
                'label' => 'Email : ',
                'label_attr'=>['class' => 'form-label'],
                'attr'=>['class' => 'form-control'],
                'label_format' => 'form.address.%name%',
                'help' => 'Ecrivez votre email avec @'
                
            ])
            ->add('vitalcardNumber',  NumberType::class, [
                'label' => 'Numéro de carte Vitale : ',
                'label_attr'=>['class' => 'form-label'],
                'attr'=>['class' => 'form-control'],
                'label_format' => '00000000000',
                'help' => 'Ecrivez le numéro avec 11 chiffres'
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
