<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Doctrine\ORM\EntityRepository;

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
        1 => 'in Bearbeitung',
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
            ->add('title', Type\TextType::class, [
                'label' => 'Titel',
                'attr' => ['autofocus' => true],
                ])
            ->add('copiedFrom', EntityType::class, [
                'label' => 'Vorgehensmodell',
                'choice_label' => 'title',
                'class' => 'AppBundle:Project',
                'query_builder' => function(EntityRepository $em) {
                    return $em->queryProjectTemplates();
                }])
            ->add('priority', Type\ChoiceType::class, [
                'choices' => array_flip(self::PRIORITIES),
                'label' => 'Priorität',
                ])
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
            ->add('projectManager', EntityType::class, [
                'label' => 'Zuständig',
                'choice_label' => 'fullname',
                'class' => 'AppBundle:Employee',
                'label' => 'Projektleiter',
                ])
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
