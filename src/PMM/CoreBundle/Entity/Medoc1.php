<?php

namespace PMM\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Medoc1
 *
 * @ORM\Table(name="medoc1")
 * @ORM\Entity(repositoryClass="PMM\CoreBundle\Repository\Medoc1Repository")
 */
class Medoc1
{
        
    /**
     * @ORM\ManyToOne(targetEntity="PMM\CoreBundle\Entity\Medicament", inversedBy="medoc1")
     */
    private $medicament;
    
    /**
     * @ORM\OneToOne(targetEntity="PMM\CoreBundle\Entity\Commande", mappedBy="medoc1")
     */
    private $commande;
    
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
     * @ORM\Column(name="quantity", type="integer", nullable=true)
     */
    private $quantity;
    
    /**
     * @var int
     *
     * @ORM\Column(name="price", type="integer", nullable=true)
     */
    private $price;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime", nullable=true)
     */
    private $date;
    
    public function __construct()
    {
        $this->date = new \Datetime();
        $this->setPrice(0);
        $this->setQuantity(0);
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
     * Set quantity
     *
     * @param integer $quantity
     *
     * @return Medoc1
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;

        return $this;
    }

    /**
     * Get quantity
     *
     * @return integer
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * Set price
     *
     * @param integer $price
     *
     * @return Medoc1
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get price
     *
     * @return integer
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     *
     * @return Medoc1
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
     * Set medicament
     *
     * @param \PMM\CoreBundle\Entity\Medicament $medicament
     *
     * @return Medoc1
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

    /**
     * Set commande
     *
     * @param \PMM\CoreBundle\Entity\Commande $commande
     *
     * @return Medoc1
     */
    public function setCommande(\PMM\CoreBundle\Entity\Commande $commande = null)
    {
        $this->commande = $commande;

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
}
