<?php

namespace App\Form;

use App\Entity\Category;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class SearchType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
                ->add('categories', EntityType::class, [
                    'class' => Category::class,
                    'choice_label' => 'title',
                    'expanded' => true
                ])
                ->add('type', ChoiceType::class,array(
                    'choices'  => array(
                        'Employing' => 'Employer',
                        'Applying' => 'Applicant',
                    ),
                    'expanded' => true
                ))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}
