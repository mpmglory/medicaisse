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
     * @ORM\OneToOne(targetEntity="PMM\CoreBundle\Entity\Medoc4", cascade={"persist"})
     */
    private $medoc4;
    
    /**
     * @ORM\OneToOne(targetEntity="PMM\CoreBundle\Entity\Medoc5", cascade={"persist"})
     */
    private $medoc5;
    
    /**
     * @ORM\OneToOne(targetEntity="PMM\CoreBundle\Entity\Medoc6", cascade={"persist"})
     */
    private $medoc6;
     
    /**
     * @ORM\OneToOne(targetEntity="PMM\CoreBundle\Entity\Medoc7", cascade={"persist"})
     */
    private $medoc7;
    
    /**
     * @ORM\OneToOne(targetEntity="PMM\CoreBundle\Entity\Medoc8", cascade={"persist"})
     */
    private $medoc8;
    
    /**
     * @ORM\OneToOne(targetEntity="PMM\CoreBundle\Entity\Medoc9", cascade={"persist"})
     */
    private $medoc9;
    
    /**
     * @ORM\OneToOne(targetEntity="PMM\CoreBundle\Entity\Medoc10", cascade={"persist"})
     */
    private $medoc10;
    
    /**
     * @ORM\OneToOne(targetEntity="PMM\CoreBundle\Entity\Medoc11", cascade={"persist"})
     */
    private $medoc11;
    
    /**
     * @ORM\OneToOne(targetEntity="PMM\CoreBundle\Entity\Medoc12", cascade={"persist"})
     */
    private $medoc12;
    
    /**
     * @ORM\OneToOne(targetEntity="PMM\CoreBundle\Entity\Medoc13", cascade={"persist"})
     */
    private $medoc13;
    
    /**
     * @ORM\OneToOne(targetEntity="PMM\CoreBundle\Entity\Medoc14", cascade={"persist"})
     */
    private $medoc14;
    
    /**
     * @ORM\OneToOne(targetEntity="PMM\CoreBundle\Entity\Medoc15", cascade={"persist"})
     */
    private $medoc15;
    
    
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

    /**
     * Set medoc4
     *
     * @param \PMM\CoreBundle\Entity\Medoc4 $medoc4
     *
     * @return Commande
     */
    public function setMedoc4(\PMM\CoreBundle\Entity\Medoc4 $medoc4 = null)
    {
        $this->medoc4 = $medoc4;

        return $this;
    }

    /**
     * Get medoc4
     *
     * @return \PMM\CoreBundle\Entity\Medoc4
     */
    public function getMedoc4()
    {
        return $this->medoc4;
    }

    /**
     * Set medoc5
     *
     * @param \PMM\CoreBundle\Entity\Medoc5 $medoc5
     *
     * @return Commande
     */
    public function setMedoc5(\PMM\CoreBundle\Entity\Medoc5 $medoc5 = null)
    {
        $this->medoc5 = $medoc5;

        return $this;
    }

    /**
     * Get medoc5
     *
     * @return \PMM\CoreBundle\Entity\Medoc5
     */
    public function getMedoc5()
    {
        return $this->medoc5;
    }

    /**
     * Set medoc6
     *
     * @param \PMM\CoreBundle\Entity\Medoc6 $medoc6
     *
     * @return Commande
     */
    public function setMedoc6(\PMM\CoreBundle\Entity\Medoc6 $medoc6 = null)
    {
        $this->medoc6 = $medoc6;

        return $this;
    }

    /**
     * Get medoc6
     *
     * @return \PMM\CoreBundle\Entity\Medoc6
     */
    public function getMedoc6()
    {
        return $this->medoc6;
    }

    /**
     * Set medoc7
     *
     * @param \PMM\CoreBundle\Entity\Medoc7 $medoc7
     *
     * @return Commande
     */
    public function setMedoc7(\PMM\CoreBundle\Entity\Medoc7 $medoc7 = null)
    {
        $this->medoc7 = $medoc7;

        return $this;
    }

    /**
     * Get medoc7
     *
     * @return \PMM\CoreBundle\Entity\Medoc7
     */
    public function getMedoc7()
    {
        return $this->medoc7;
    }

    /**
     * Set medoc8
     *
     * @param \PMM\CoreBundle\Entity\Medoc8 $medoc8
     *
     * @return Commande
     */
    public function setMedoc8(\PMM\CoreBundle\Entity\Medoc8 $medoc8 = null)
    {
        $this->medoc8 = $medoc8;

        return $this;
    }

    /**
     * Get medoc8
     *
     * @return \PMM\CoreBundle\Entity\Medoc8
     */
    public function getMedoc8()
    {
        return $this->medoc8;
    }

    /**
     * Set medoc9
     *
     * @param \PMM\CoreBundle\Entity\Medoc9 $medoc9
     *
     * @return Commande
     */
    public function setMedoc9(\PMM\CoreBundle\Entity\Medoc9 $medoc9 = null)
    {
        $this->medoc9 = $medoc9;

        return $this;
    }

    /**
     * Get medoc9
     *
     * @return \PMM\CoreBundle\Entity\Medoc9
     */
    public function getMedoc9()
    {
        return $this->medoc9;
    }

    /**
     * Set medoc10
     *
     * @param \PMM\CoreBundle\Entity\Medoc10 $medoc10
     *
     * @return Commande
     */
    public function setMedoc10(\PMM\CoreBundle\Entity\Medoc10 $medoc10 = null)
    {
        $this->medoc10 = $medoc10;

        return $this;
    }

    /**
     * Get medoc10
     *
     * @return \PMM\CoreBundle\Entity\Medoc10
     */
    public function getMedoc10()
    {
        return $this->medoc10;
    }

    /**
     * Set medoc11
     *
     * @param \PMM\CoreBundle\Entity\Medoc11 $medoc11
     *
     * @return Commande
     */
    public function setMedoc11(\PMM\CoreBundle\Entity\Medoc11 $medoc11 = null)
    {
        $this->medoc11 = $medoc11;

        return $this;
    }

    /**
     * Get medoc11
     *
     * @return \PMM\CoreBundle\Entity\Medoc11
     */
    public function getMedoc11()
    {
        return $this->medoc11;
    }

    /**
     * Set medoc12
     *
     * @param \PMM\CoreBundle\Entity\Medoc12 $medoc12
     *
     * @return Commande
     */
    public function setMedoc12(\PMM\CoreBundle\Entity\Medoc12 $medoc12 = null)
    {
        $this->medoc12 = $medoc12;

        return $this;
    }

    /**
     * Get medoc12
     *
     * @return \PMM\CoreBundle\Entity\Medoc12
     */
    public function getMedoc12()
    {
        return $this->medoc12;
    }

    /**
     * Set medoc13
     *
     * @param \PMM\CoreBundle\Entity\Medoc13 $medoc13
     *
     * @return Commande
     */
    public function setMedoc13(\PMM\CoreBundle\Entity\Medoc13 $medoc13 = null)
    {
        $this->medoc13 = $medoc13;

        return $this;
    }

    /**
     * Get medoc13
     *
     * @return \PMM\CoreBundle\Entity\Medoc13
     */
    public function getMedoc13()
    {
        return $this->medoc13;
    }

    /**
     * Set medoc14
     *
     * @param \PMM\CoreBundle\Entity\Medoc14 $medoc14
     *
     * @return Commande
     */
    public function setMedoc14(\PMM\CoreBundle\Entity\Medoc14 $medoc14 = null)
    {
        $this->medoc14 = $medoc14;

        return $this;
    }

    /**
     * Get medoc14
     *
     * @return \PMM\CoreBundle\Entity\Medoc14
     */
    public function getMedoc14()
    {
        return $this->medoc14;
    }

    /**
     * Set medoc15
     *
     * @param \PMM\CoreBundle\Entity\Medoc15 $medoc15
     *
     * @return Commande
     */
    public function setMedoc15(\PMM\CoreBundle\Entity\Medoc15 $medoc15 = null)
    {
        $this->medoc15 = $medoc15;

        return $this;
    }

    /**
     * Get medoc15
     *
     * @return \PMM\CoreBundle\Entity\Medoc15
     */
    public function getMedoc15()
    {
        return $this->medoc15;
    }
}
