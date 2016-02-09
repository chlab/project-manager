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
            ->add('phase', \Symfony\Bridge\Doctrine\Form\Type\EntityType::class, [
                'class' => 'AppBundle\Entity\Phase',
                'choice_label' => 'name',
                ])
            ->add('responsibleuser')
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Activity'
        ));
    }
}
