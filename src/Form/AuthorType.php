<?php

namespace App\Form;

use App\Entity\Author;
use App\Entity\Book;
use Doctrine\DBAL\Types\TextType as TypesTextType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Routing\Annotation\Route;


class AuthorType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, [
                // 'label' => 'Nom', //1ère méthode pour changer le nom du label
            ])
            ->add('dateOfBirth',DateType::class,[
                // 'label' => 'Date de naissance',
                'input' => 'datetime_immutable',
                'widget' => 'single_text',
            ])
            ->add('dateOfDeath',DateType::class,[
                // 'label' => 'Date de décès',
                'input' => 'datetime_immutable',
                'widget' => 'single_text',
                'required' =>  false,
            ])
            ->add('nationality',TextType::class,[
                // 'label' => 'Nationalité',
                'required' =>  false,
            ])
            ->add('books', EntityType::class, [
                // 'label' => 'Livre(s)',
                'class' => Book::class,
                'choice_label' => 'id',
                'multiple' => true,
                'required' =>  false,
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Author::class,
        ]);
    }
}
