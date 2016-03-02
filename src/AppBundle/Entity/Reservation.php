<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Reservation
 *
 * @ORM\Table(name="reservation")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ReservationRepository")
 */
class Reservation
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     *@ORM\ManyToOne(targetEntity="Field", inversedBy="reservations", cascade={"remove", "persist"})
     */
    private $field;

    /**
     * @ORM\ManyToOne(targetEntity="User", inversedBy="fields", cascade={"remove"})
     */
    private $user;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="date")
     */
    private $date;

    /**
     * @var int
     *
     * @ORM\Column(name="hour", type="integer")
     */
    private $hour;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set idField
     *
     * @param integer $idField
     *
     * @return Reservation
     */
    public function setIdField($idField)
    {
        $this->idField = $idField;

        return $this;
    }

    /**
     * Get idField
     *
     * @return int
     */
    public function getIdField()
    {
        return $this->idField;
    }

    /**
     * Set idUser
     *
     * @param integer $idUser
     *
     * @return Reservation
     */
    public function setIdUser($idUser)
    {
        $this->idUser = $idUser;

        return $this;
    }

    /**
     * Get idUser
     *
     * @return int
     */
    public function getIdUser()
    {
        return $this->idUser;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     *
     * @return Reservation
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set hour
     *
     * @param integer $hour
     *
     * @return Reservation
     */
    public function setHour($hour)
    {
        $this->hour = $hour;

        return $this;
    }

    /**
     * Get hour
     *
     * @return int
     */
    public function getHour()
    {
        return $this->hour;
    }

    /**
     * Set field
     *
     * @param \AppBundle\Entity\Field $field
     *
     * @return Reservation
     */
    public function setField(\AppBundle\Entity\Field $field = null)
    {
        $this->field = $field;

        return $this;
    }

    /**
     * Get field
     *
     * @return \AppBundle\Entity\Field
     */
    public function getField()
    {
        return $this->field;
    }

    /**
     * Set user
     *
     * @param \AppBundle\Entity\User $user
     *
     * @return Reservation
     */
    public function setUser(\AppBundle\Entity\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \AppBundle\Entity\User
     */
    public function getUser()
    {
        return $this->user;
    }
}
