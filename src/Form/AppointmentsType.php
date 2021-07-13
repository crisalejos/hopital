<?php

namespace App\Form;

use App\Entity\Appointments;
use App\Entity\Patients;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType  ;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class AppointmentsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('startTime',  DateTimeType ::class, [
                'input'  => 'datetime',
                'widget' => 'choice',
                
                'label' => 'Date début rdv : ',
                'label_attr'=>['class' => 'form-label'],
                'attr'=>['class' => 'form-control'],
                'placeholder' => [
                    'day' => 'Jour', 'month' => 'Mois', 'year' => 'Année', 
                    'hour' => 'Heure', 'minute' => 'Minute', 'second' => 'Second',
                ],
                // values displayed to users range from 0 to 99 (both inclusive)
                
            
                
            ])
            ->add('endTime',  DateTimeType ::class, [
                'input'  => 'datetime',
                'widget' => 'choice',
                
                'label' => 'Date fin rdv : ',
                'label_attr'=>['class' => 'form-label'],
                'attr'=>['class' => 'form-control'],
                'placeholder' => [
                    'day' => 'Jour', 'month' => 'Mois', 'year' => 'Année', 
                    'hour' => 'Heure', 'minute' => 'Minute', 'second' => 'Second',
                ]
                
            ])
            ->add('patient', EntityType::class, [

                //'mapped' => true,                // looks for choices from this entity
                'class' => Patients::class,               
                'choice_label' => 'lastName', // uses the User.username property as the visible option string
                'placeholder' => 'Choisir le patient',
                // used to render a select box, check boxes or radios
                //'multiple' => true,
                //'expanded' => true,   
                'label' => 'Choisir le Patient : ',
                'label_attr'=>['class' => 'form-label'],
                'attr'=>['class' => 'form-control']
                
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Appointments::class,
        ]);
    }
}
