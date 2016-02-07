<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type;

class ProjectType extends AbstractType
{
    /**
     * Priorities for projects
     * @const array
     */
    const PRIORITIES = [
        0 => 'low',
        1 => 'normal',
        2 => 'high',
    ];

    /**
     * Status for projects
     * @const array
     */
    const STATUS = [
        0 => 'new',
        1 => 'in progress',
        2 => 'completed',
        3 => 'cancelled',
    ];

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            //->add('isTemplate')
            ->add('title')
            // ->add('created', Type\DatetimeType::class)
            // ->add('modified', Type\DatetimeType::class)
            // ->add('deleted', DatetimeType::class)
            // ->add('permissiondate', Type\DateType::class)
            ->add('priority', Type\ChoiceType::class, [
                'choices' => array_flip(self::PRIORITIES),
                ])
            /*->add('state', Type\ChoiceType::class, [
                'choices' => array_flip(self::STATUS),
                ])*/
            ->add('startDate', Type\DateType::class, [
                'data' => new \DateTime(),
                'format' => 'dd.MM.yyyy'
                ])
            ->add('endDate', Type\DateType::class,  [
                'data' => new \DateTime(),
                'format' => 'dd.MM.yyyy'
                ])
            // ->add('actualstartdate', Type\DateType::class)
            // ->add('actualenddate', Type\DateType::class)
            ->add('projectmanager')
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
