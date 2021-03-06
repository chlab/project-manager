<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type;

class MilestoneType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('startdate', Type\DateType::class, [
                'data' => new \DateTime(),
                'format' => 'dd.MM.yyyy'
                ])
        ;

        if (isset($options['phaseId'])) {
            $builder->add('phase', Type\HiddenType::class, [
                'data' => $options['phaseId'],
                'mapped' => false,
                ]);
        }
        if (isset($options['projectId'])) {
            $builder->add('project', Type\HiddenType::class, [
                'data' => $options['projectId'],
                'mapped' => false,
                ]);
        }
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Activity',
            'phaseId' => null,
            'projectId' => null,
        ));
    }
}
