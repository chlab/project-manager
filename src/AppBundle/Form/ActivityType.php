<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type;

class ActivityType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            //->add('ismilestone')
            ->add('name')
            ->add('startdate', Type\DateType::class, [
                'data' => new \DateTime(),
                'format' => 'dd.MM.yyyy'
                ])
            ->add('enddate', Type\DateType::class, [
                'data' => new \DateTime(),
                'format' => 'dd.MM.yyyy'
                ])
            /*->add('actualstartdate', Type\DateType::class, [
                'data' => new \DateTime(),
                'format' => 'dd.MM.yyyy'
                ])
            ->add('actualenddate', Type\DateType::class, [
                'data' => new \DateTime(),
                'format' => 'dd.MM.yyyy'
                ])*/
            ->add('responsibleuser')
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
            // @todo we probably don't need these anymore
            'phaseId' => null,
            'projectId' => null,
        ));
    }
}
