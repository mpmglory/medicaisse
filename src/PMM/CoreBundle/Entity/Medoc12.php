<?php

namespace PMM\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Medoc12
 *
 * @ORM\Table(name="medoc12")
 * @ORM\Entity(repositoryClass="PMM\CoreBundle\Repository\Medoc12Repository")
 */
class Medoc12
{
        
    /**
     * @ORM\ManyToOne(targetEntity="PMM\CoreBundle\Entity\Medicament", inversedBy="medoc12")
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
     * @return Medoc12
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
     * @return Medoc12
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
     * @return Medoc12
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
     * @return Medoc12
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
