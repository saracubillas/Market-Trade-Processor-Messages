<?php

namespace Markettrade\DemoBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class MessageType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('userId')
            ->add('currencyFrom')
            ->add('currencyTo')
            ->add('amountSell')
            ->add('amountBy')
            ->add('rate')
            ->add('timePlaced')
            ->add('originatingCountry')
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Markettrade\DemoBundle\Entity\Message'
        ));
    }

    public function getName()
    {
        return 'markettrade_demobundle_messagetype';
    }
}
