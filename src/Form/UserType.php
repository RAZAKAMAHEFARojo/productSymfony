<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('firstname')
            ->add('age')
            ->add('username')
            ->add('isYoung', ChoiceType::class, [
                'choices' => [
                    'Oui' => true,
                    'Non' => false,
                ],
                'expanded' => false, // false pour liste déroulante, true pour boutons radio
                'multiple' => false, // liste à choix unique
                'label' => 'Jeune',
            ])
            ->add('gender', ChoiceType::class, [
                'choices' => [
                    'Homme' => true,
                    'Femme' => false,
                ],
                'expanded' => false, // false pour liste déroulante, true pour boutons radio
                'multiple' => false, // liste à choix unique
                'label' => 'Genre',
            ])
            
            ->add('roles', ChoiceType::class, [
                'choices' => [
                    'Administrateur' => 'ROLE_ADMIN',
                    'Utilisateur' => 'ROLE_USER',
                    'Manager' => 'ROLE_MANAGER',
                ],
                'multiple' => true, // Permet la sélection multiple
                'expanded' => false, // false = liste déroulante, true = cases à cocher
                'label' => 'Rôles',
            ]);
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
