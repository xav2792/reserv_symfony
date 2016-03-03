<?php

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use AppBundle\Entity\Field;

class LoadFieldData implements FixtureInterface
{

    public function load(ObjectManager $manager)
    {

        $i=1;

        while($i <=10)
        {
            $field =  new Field();
            $field->setDescription('descripton terrain'.$i);
            $field->setName("terrain".$i);
            $field->setLocation("Paris");
            if($i<=5)
            $field->setType("Foot");
            if($i>5)
                $field->setType("Basket");
            $manager->persist($field);
            $i++;
        }
        $manager->flush();

    }
}