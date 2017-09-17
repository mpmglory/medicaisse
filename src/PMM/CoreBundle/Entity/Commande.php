<?php

namespace PMM\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Commande
 *
 * @ORM\Table(name="commande")
 * @ORM\Entity(repositoryClass="PMM\CoreBundle\Repository\CommandeRepository")
 */
class Commande
{
    /**
     * @ORM\ManyToOne(targetEntity="PMM\CoreBundle\Entity\Patient")
     * @ORM\JoinColumn(nullable=false)
     */
    private $patient;
    
    /**
     * @ORM\OneToOne(targetEntity="PMM\CoreBundle\Entity\Medoc1", cascade={"persist"})
     */
    private $medoc1;
    
    /**
     * @ORM\OneToOne(targetEntity="PMM\CoreBundle\Entity\Medoc2", cascade={"persist"})
     */
    private $medoc2;
    
    /**
     * @ORM\OneToOne(targetEntity="PMM\CoreBundle\Entity\Medoc3", cascade={"persist"})
     */
    private $medoc3;
    
    
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var int
     *
     * @ORM\Column(name="amount", type="integer")
     */
    private $amount;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime")
     */
    private $date;
    
    //$this->date = new \Datetime();
    //$this->setAmount(0);


    /**
     * Constructor
     */
    public function __construct()
    {
        $this->commande_medicaments = new \Doctrine\Common\Collections\ArrayCollection();
        $this->date = new \Datetime();
        $this->setAmount(0);
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set amount
     *
     * @param integer $amount
     *
     * @return Commande
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;

        return $this;
    }

    /**
     * Get amount
     *
     * @return integer
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     *
     * @return Commande
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
     * Set patient
     *
     * @param \PMM\CoreBundle\Entity\Patient $patient
     *
     * @return Commande
     */
    public function setPatient(\PMM\CoreBundle\Entity\Patient $patient)
    {
        $this->patient = $patient;

        return $this;
    }

    /**
     * Get patient
     *
     * @return \PMM\CoreBundle\Entity\Patient
     */
    public function getPatient()
    {
        return $this->patient;
    }


    /**
     * Set medoc1
     *
     * @param \PMM\CoreBundle\Entity\Medoc1 $medoc1
     *
     * @return Commande
     */
    public function setMedoc1(\PMM\CoreBundle\Entity\Medoc1 $medoc1 = null)
    {
        $this->medoc1 = $medoc1;

        return $this;
    }

    /**
     * Get medoc1
     *
     * @return \PMM\CoreBundle\Entity\Medoc1
     */
    public function getMedoc1()
    {
        return $this->medoc1;
    }

    /**
     * Set medoc2
     *
     * @param \PMM\CoreBundle\Entity\Medoc1 $medoc2
     *
     * @return Commande
     */
    public function setMedoc2(\PMM\CoreBundle\Entity\Medoc2 $medoc2 = null)
    {
        $this->medoc2 = $medoc2;

        return $this;
    }

    /**
     * Get medoc2
     *
     * @return \PMM\CoreBundle\Entity\Medoc1
     */
    public function getMedoc2()
    {
        return $this->medoc2;
    }

    /**
     * Set medoc3
     *
     * @param \PMM\CoreBundle\Entity\Medoc1 $medoc3
     *
     * @return Commande
     */
    public function setMedoc3(\PMM\CoreBundle\Entity\Medoc3 $medoc3 = null)
    {
        $this->medoc3 = $medoc3;

        return $this;
    }

    /**
     * Get medoc3
     *
     * @return \PMM\CoreBundle\Entity\Medoc1
     */
    public function getMedoc3()
    {
        return $this->medoc3;
    }
}
