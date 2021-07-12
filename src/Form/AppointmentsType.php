<?php

namespace App\Form;

use App\Entity\Appointments;
use App\Entity\Patients;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\EntityType;

class AppointmentsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('startTime',  DateTimeType::class, [
                'label' => 'Date début rdv : ',
                'label_attr'=>['class' => 'form-label'],
                'attr'=>['class' => 'form-control']
                
            ])
            ->add('endTime',  DateTimeType::class, [
                'label' => 'Date fin rdv : ',
                'label_attr'=>['class' => 'form-label'],
                'attr'=>['class' => 'form-control']
                
            ])
            ->add('patient', EntityType::class, [

                // looks for choices from this entity
    'class' => Patients::class,

    // uses the User.username property as the visible option string
    'choice_label' => 'id',

    // used to render a select box, check boxes or radios
    //'multiple' => true,
    'expanded' => true,
    
                'label' => 'Patient : ',
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
