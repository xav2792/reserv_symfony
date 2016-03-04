<?php

namespace AppBundle\Service;


use AppBundle\Entity\Reservation;
use Doctrine\ORM\EntityManager;
use FOS\UserBundle\Model\User;

class ReservationManager
{
    /**
     * @var EntityManager
     */
    private $em;

    /**
     * @param EntityManager $em
     */
    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }

    /**
     * @param Reservation $reservation
     * @return bool
     */
    public function createReservation(Reservation $reservation, User $user)
    {
        $hour =  $reservation->getHour();
        $date = $reservation->getDate();
        $field = $reservation->getField()->getId();
        $duplicates = $this->em->getRepository('AppBundle:Reservation')->checkReservation($date,$hour,$field);

        if(empty($duplicates)){
            $reservation->setUser($user);
            $this->em->persist($reservation);
            $this->em->flush();

            return $reservation;
        } else{
            return false;
        }
    }
}