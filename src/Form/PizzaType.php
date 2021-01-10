<?php

namespace App\Form;

use App\Entity\Pizza;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use App\Entity\Section;
use App\Repository\SectionRepository;

class PizzaType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class, [
                'label' => 'Nom'
            ])
            ->add('content', TextType::class, [
                'label' => 'Contenu'
            ])
            ->add('price', NumberType::class, [
                'label' => 'Prix'
            ])
            ->add('section', EntityType::class, [
                'class' => Section::class,
                'query_builder' => function (SectionRepository $section) {
                        return $section->createQueryBuilder('s')->setMaxResults(4);
                },
                'choice_label' => 'title'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Pizza::class,
        ]);
    }
}
