<?php

namespace PMM\LaboBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use PMM\LaboBundle\Entity\Bulletin;

/**
 * Hematologie
 *
 * @ORM\Table(name="hematologie")
 * @ORM\Entity(repositoryClass="PMM\LaboBundle\Repository\HematologieRepository")
 */
class Hematologie
{
    
    /**
     * @ORM\OneToOne(targetEntity="PMM\LaboBundle\Entity\Bulletin", mappedBy="hematologie")
     * @ORM\JoinColumn(name="bulletin_id", referencedColumnName="id")
     */
    private $bulletin;
    
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
     * @ORM\Column(name="globules_blancs", type="text", nullable=true)
     */
    private $globulesBlancs;

    /**
     * @var string
     *
     * @ORM\Column(name="globules_rouges", type="text", nullable=true)
     */
    private $globulesRouges;

    /**
     * @var string
     *
     * @ORM\Column(name="taux_hemoglobine", type="text", nullable=true)
     */
    private $tauxHemoglobine;
    
    /**
     * @var float
     *
     * @ORM\Column(name="price", type="float")
     */
    private $price;
    
    
    public function __construct(){
        
        $this->date = new \Datetime();
        $this->price = 0;
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
     * Set date
     *
     * @param \DateTime $date
     *
     * @return Hematologie
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
     * Set globulesBlancs
     *
     * @param string $globulesBlancs
     *
     * @return Hematologie
     */
    public function setGlobulesBlancs($globulesBlancs)
    {
        $this->globulesBlancs = $globulesBlancs;

        return $this;
    }

    /**
     * Get globulesBlancs
     *
     * @return string
     */
    public function getGlobulesBlancs()
    {
        return $this->globulesBlancs;
    }

    /**
     * Set globulesRouges
     *
     * @param string $globulesRouges
     *
     * @return Hematologie
     */
    public function setGlobulesRouges($globulesRouges)
    {
        $this->globulesRouges = $globulesRouges;

        return $this;
    }

    /**
     * Get globulesRouges
     *
     * @return string
     */
    public function getGlobulesRouges()
    {
        return $this->globulesRouges;
    }

    /**
     * Set tauxHemoglobine
     *
     * @param string $tauxHemoglobine
     *
     * @return Hematologie
     */
    public function setTauxHemoglobine($tauxHemoglobine)
    {
        $this->tauxHemoglobine = $tauxHemoglobine;

        return $this;
    }

    /**
     * Get tauxHemoglobine
     *
     * @return string
     */
    public function getTauxHemoglobine()
    {
        return $this->tauxHemoglobine;
    }

    /**
     * Set price
     *
     * @param float $price
     *
     * @return Hematologie
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get price
     *
     * @return float
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set bulletin
     *
     * @param \PMM\LaboBundle\Entity\Bulletin $bulletin
     *
     * @return Hematologie
     */
    public function setBulletin(\PMM\LaboBundle\Entity\Bulletin $bulletin = null)
    {
        $this->bulletin = $bulletin;

        return $this;
    }

    /**
     * Get bulletin
     *
     * @return \PMM\LaboBundle\Entity\Bulletin
     */
    public function getBulletin()
    {
        return $this->bulletin;
    }
}
