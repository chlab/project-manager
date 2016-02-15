<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class FinancialresourceType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('costtype', EntityType::class, [
                'label' => 'Kostenart',
                'choice_label' => 'name',
                'class' => 'AppBundle:CostType',
                ])
            ->add('plannedcost', Type\MoneyType::class, [
                'currency' => 'CHF',  // @todo get this from config
                'label' => 'Geplante Kosten'
                ])
            ->add('actualcost', Type\MoneyType::class, [
                'currency' => 'CHF',  // @todo get this from config
                'label' => 'Effektive Kosten'
                ])
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Financialresource'
        ));
    }
}
