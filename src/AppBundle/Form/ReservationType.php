<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\TextType;
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
            ->add('hour',TextType::class,array('label'=>'Choisir une heure de debut (une reservation dure une heure)'))
            ->add('field')
            ->add('user')


        ;
        /*,ChoiceType::class,array('label'=>'Choisir une heure de début (une réservation dure une heure) ',
        'multiple'=>true,
                'choices'=>array(9=>'9', 10=>'10', 11=>'11' , 12=>'12' , 13=>'13' , 14>'14' , 15=>'15', 16=>'16', 17=>'17'),
                'attr'=>array('style'=>'width:100px', 'customattr'=>'customdata')))*/
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

class FooController extends Controller 
{
    public function indexAction(){
        $message = \Swift_Message::newInstance();
        $message->setSubject("votre objet");
        $message->setFrom('votre message');
        $message->setTo('toumy.deng@gmail.com');
        // pour envoyer le message en HTML
        $message->setBody('Hello world');
        // pour envoyer le message en HTML
        $message->setBody('<p>Hello world</p>','text/html'); 
        //envoi du message
         $this->get('mailer')->send($message);
     }
}
