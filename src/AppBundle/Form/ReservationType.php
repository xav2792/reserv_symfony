<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use AppBundle\Entity\Reservation;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class ReservationType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $builder
            ->add('date')
            ->add('field')
            ->add('hour', ChoiceType::class, array('choices'  => array(
+                '9' => 9,
+                '10' => 10,
+                '11' => 11,
+                '12' => 12,
+                '13' => 13,
+                '14' => 14,
+                '15' => 15,
+                '16' => 16,
+                '17' => 17,
+                '18' => 18,
+                '19' => 19)));


    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Reservation'
        ));
    }
    


}