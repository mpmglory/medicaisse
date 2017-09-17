<?php

namespace PMM\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Medicament
 *
 * @ORM\Table(name="medicament")
 * @ORM\Entity(repositoryClass="PMM\CoreBundle\Repository\MedicamentRepository")
 */
class Medicament
{
    /**
     * @ORM\OneToMany(targetEntity="PMM\CoreBundle\Entity\Medoc1", mappedBy="medicament")
     * @ORM\JoinColumn(nullable=true)
     */
    private $medoc1;
    
    /**
     * @ORM\OneToMany(targetEntity="PMM\CoreBundle\Entity\Medoc2", mappedBy="medicament")
     * @ORM\JoinColumn(nullable=true)
     */
    private $medoc2;
    
    /**
     * @ORM\OneToMany(targetEntity="PMM\CoreBundle\Entity\Medoc3", mappedBy="medicament")
     * @ORM\JoinColumn(nullable=true)
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
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime")
     */
    private $date;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="category", type="string", length=255)
     */
    private $category;

    /**
     * @var int
     *
     * @ORM\Column(name="price", type="integer")
     */
    private $price;
    
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->date = new \Datetime();
        $this->setPrice(0);
    }


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
     * Set name
     *
     * @param string $name
     *
     * @return Medicament
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set category
     *
     * @param string $category
     *
     * @return Medicament
     */
    public function setCategory($category)
    {
        $this->category = $category;

        return $this;
    }

    /**
     * Get category
     *
     * @return string
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Set price
     *
     * @param integer $price
     *
     * @return Medicament
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get price
     *
     * @return int
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
     * @return Medicament
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
     * @return Medicament
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
