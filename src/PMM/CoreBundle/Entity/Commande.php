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
     * @ORM\OneToMany(targetEntity="PMM\CoreBundle\Entity\CommandeMedicament", mappedBy="commande", cascade={"persist"})
     */
    private $commande_medicaments;
    
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
     * Add commandeMedicament
     *
     * @param \PMM\CoreBundle\Entity\CommandeMedicament $commandeMedicament
     *
     * @return Commande
     */
    public function addCommandeMedicament(\PMM\CoreBundle\Entity\CommandeMedicament $commandeMedicament)
    {
        $this->commande_medicaments[] = $commandeMedicament;
        
        $commandeMedicament->setCommande($this);

        return $this;
    }

    /**
     * Remove commandeMedicament
     *
     * @param \PMM\CoreBundle\Entity\CommandeMedicament $commandeMedicament
     */
    public function removeCommandeMedicament(\PMM\CoreBundle\Entity\CommandeMedicament $commandeMedicament)
    {
        $this->commande_medicaments->removeElement($commandeMedicament);
    }

    /**
     * Get commandeMedicaments
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCommandeMedicaments()
    {
        return $this->commande_medicaments;
    }
}