<?php

namespace PMM\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CommandeMedicament
 *
 * @ORM\Table(name="commande_medicament")
 * @ORM\Entity(repositoryClass="PMM\CoreBundle\Repository\CommandeMedicamentRepository")
 */
class CommandeMedicament
{
    /**
     * @ORM\ManyToOne(targetEntity="PMM\CoreBundle\Entity\Commande", inversedBy="commande_medicaments")
     * @ORM\JoinColumn(nullable=true)
     */
    private $commande;
    
    /**
     * @ORM\ManyToOne(targetEntity="PMM\CoreBundle\Entity\Medicament", inversedBy="commande_medicaments")
     */
    private $medicament;
    
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
     * @ORM\Column(name="quantite", type="integer")
     */
    private $quantite;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime")
     */
    private $date;

    public function __construct()
    {
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
     * Set quantite
     *
     * @param integer $quantite
     *
     * @return CommandeMedicament
     */
    public function setQuantite($quantite)
    {
        $this->quantite = $quantite;

        return $this;
    }

    /**
     * Get quantite
     *
     * @return integer
     */
    public function getQuantite()
    {
        return $this->quantite;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     *
     * @return CommandeMedicament
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
     * Set commande
     *
     * @param \PMM\CoreBundle\Entity\Commande $commande
     *
     * @return CommandeMedicament
     */
    public function setCommande(\PMM\CoreBundle\Entity\Commande $commande = null)
    {
        $this->commande = $commande;
        $commande->addCommandeMedicament($this);

        return $this;
    }

    /**
     * Get commande
     *
     * @return \PMM\CoreBundle\Entity\Commande
     */
    public function getCommande()
    {
        return $this->commande;
    }

    /**
     * Set medicament
     *
     * @param \PMM\CoreBundle\Entity\Medicament $medicament
     *
     * @return CommandeMedicament
     */
    public function setMedicament(\PMM\CoreBundle\Entity\Medicament $medicament = null)
    {
        $this->medicament = $medicament;

        return $this;
    }

    /**
     * Get medicament
     *
     * @return \PMM\CoreBundle\Entity\Medicament
     */
    public function getMedicament()
    {
        return $this->medicament;
    }
}
