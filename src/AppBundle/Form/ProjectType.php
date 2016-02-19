<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class ProjectType extends AbstractType
{
    /**
     * Priorities for projects
     * @const array
     */
    const PRIORITIES = [
        0 => 'niedrig',
        1 => 'normal',
        2 => 'hoch',
    ];

    /**
     * Status for projects
     * @const array
     */
    const STATES = [
        0 => 'neu',
        1 => 'offen',
        2 => 'abgeschlossen',
        3 => 'abgebrochen',
    ];

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            //->add('isTemplate')
            ->add('title', Type\TextType::class, [
                'label' => 'Titel',
                'attr' => ['autofocus' => true],
                ])
            // ->add('permissiondate', Type\DateType::class)
            ->add('priority', Type\ChoiceType::class, [
                'choices' => array_flip(self::PRIORITIES),
                'label' => 'Priorität',
                ])
            /*->add('state', Type\ChoiceType::class, [
                'choices' => array_flip(self::STATES),
                ])*/
            ->add('startDate', Type\DateType::class, [
                'data' => new \DateTime(),
                'format' => 'dd.MM.yyyy',
                'label' => 'Geplanter Start',
                ])
            ->add('endDate', Type\DateType::class,  [
                'data' => new \DateTime(),
                'format' => 'dd.MM.yyyy',
                'label' => 'Geplanter Abschluss',
                ])
            // ->add('actualstartdate', Type\DateType::class)
            // ->add('actualenddate', Type\DateType::class)
            ->add('projectManager', EntityType::class, [
                'label' => 'Zuständig',
                'choice_label' => 'fullname',
                'class' => 'AppBundle:Employee',
                'label' => 'Projektleiter',
                ])
            //->add('copiedfrom')
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Project'
        ));
    }
}
