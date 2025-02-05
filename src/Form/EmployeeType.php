<?php

namespace App\Form;

use App\Entity\Employee;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EmployeeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('firstname')
            ->add('lastname')
            ->add('birthdaydate', null, [
                'widget' => 'single_text',
            ])
            ->add('placeofbirth')
            ->add('adress')
            ->add('fathername')
            ->add('mothername')
            ->add('cin')
            ->add('dateofissue')
            ->add('matricule')
            ->add('cnapsnumber')
            ->add('osie')
            ->add('companyposition')
            ->add('category')
            ->add('departement')
            ->add('statut')
            ->add('dateofhire')
            ->add('basesalary')
            ->add('typeofpayment')
            ->add('bankaccountnumber')
            ->add('accountname')
            ->add('bankname')
            ->add('bankadress')
            ->add('rib')
            ->add('child')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Employee::class,
        ]);
    }
}
