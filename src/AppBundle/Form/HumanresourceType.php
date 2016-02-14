<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class HumanresourceType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        // set activity id if it was passed in options
        /*if (isset($options['activity_id'])) {
            $builder->add('activity', Type\HiddenType::class, [
                'data' => $options['activity_id'],
                'mapped' => false,
                ]);
        }*/

        $builder
            ->add('role', EntityType::class, [
                'label' => 'Rolle',
                'choice_label' => 'name',
                'class' => 'AppBundle:Role',
                ])
            ->add('employee', EntityType::class, [
                'label' => 'Mitarbeiter',
                'choice_label' => 'fullName',
                'class' => 'AppBundle:Employee',
                ])
            ->add('hours')
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Humanresource',
            //'activity_id' => null,
        ));
    }
}
