<?php

namespace PMM\LaboBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use PMM\LaboBundle\Entity\Bulletin;

/**
 * Biochimie
 *
 * @ORM\Table(name="biochimie")
 * @ORM\Entity(repositoryClass="PMM\LaboBundle\Repository\BiochimieRepository")
 */
class Biochimie
{
    /**
     * @ORM\OneToOne(targetEntity="PMM\LaboBundle\Entity\Bulletin", mappedBy="biochimie")
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
     * @ORM\Column(name="uree", type="text", nullable=true)
     */
    private $uree;

    /**
     * @var string
     *
     * @ORM\Column(name="creatinine", type="text", nullable=true)
     */
    private $creatinine;

    /**
     * @var string
     *
     * @ORM\Column(name="sgot", type="text", nullable=true)
     */
    private $sgot;
    
    /**
     * @var string
     *
     * @ORM\Column(name="sgpt", type="text", nullable=true)
     */
    private $sgpt;
    
    /**
     * @var string
     *
     * @ORM\Column(name="sggt", type="text", nullable=true)
     */
    private $sggt;
    
    /**
     * @var string
     *
     * @ORM\Column(name="acideUrique", type="text", nullable=true)
     */
    private $acideUrique;
    
    /**
     * @var string
     *
     * @ORM\Column(name="cholesterol", type="text", nullable=true)
     */
    private $cholesterol;
    
    /**
     * @var string
     *
     * @ORM\Column(name="glycemie", type="text", nullable=true)
     */
    private $glycemie;
    
    /**
     * @var string
     *
     * @ORM\Column(name="bilirubine", type="text", nullable=true)
     */
    private $bilirubine;
    
    /**
     * @var string
     *
     * @ORM\Column(name="magnesemie", type="text", nullable=true)
     */
    private $magnesemie;
    
    /**
     * @var string
     *
     * @ORM\Column(name="potassium", type="text", nullable=true)
     */
    private $potassium;
    
    /**
     * @var string
     *
     * @ORM\Column(name="triglyceride", type="text", nullable=true)
     */
    private $triglyceride;
    
    /**
     * @var string
     *
     * @ORM\Column(name="amylase", type="text", nullable=true)
     */
    private $amylase;
    
    /**
     * @var string
     *
     * @ORM\Column(name="pal", type="text", nullable=true)
     */
    private $pal;
    
    /**
     * @var string
     *
     * @ORM\Column(name="calcemie", type="text", nullable=true)
     */
    private $calcemie;
    
    /**
     * @var string
     *
     * @ORM\Column(name="ck", type="text", nullable=true)
     */
    private $ck;


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
     * @return Biochimie
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
     * Set uree
     *
     * @param string $uree
     *
     * @return Biochimie
     */
    public function setUree($uree)
    {
        $this->uree = $uree;

        return $this;
    }

    /**
     * Get uree
     *
     * @return string
     */
    public function getUree()
    {
        return $this->uree;
    }

    /**
     * Set creatinine
     *
     * @param string $creatinine
     *
     * @return Biochimie
     */
    public function setCreatinine($creatinine)
    {
        $this->creatinine = $creatinine;

        return $this;
    }

    /**
     * Get creatinine
     *
     * @return string
     */
    public function getCreatinine()
    {
        return $this->creatinine;
    }

    /**
     * Set sgot
     *
     * @param string $sgot
     *
     * @return Biochimie
     */
    public function setSgot($sgot)
    {
        $this->sgot = $sgot;

        return $this;
    }

    /**
     * Get sgot
     *
     * @return string
     */
    public function getSgot()
    {
        return $this->sgot;
    }

    /**
     * Set sgpt
     *
     * @param string $sgpt
     *
     * @return Biochimie
     */
    public function setSgpt($sgpt)
    {
        $this->sgpt = $sgpt;

        return $this;
    }

    /**
     * Get sgpt
     *
     * @return string
     */
    public function getSgpt()
    {
        return $this->sgpt;
    }

    /**
     * Set sggt
     *
     * @param string $sggt
     *
     * @return Biochimie
     */
    public function setSggt($sggt)
    {
        $this->sggt = $sggt;

        return $this;
    }

    /**
     * Get sggt
     *
     * @return string
     */
    public function getSggt()
    {
        return $this->sggt;
    }

    /**
     * Set acideUrique
     *
     * @param string $acideUrique
     *
     * @return Biochimie
     */
    public function setAcideUrique($acideUrique)
    {
        $this->acideUrique = $acideUrique;

        return $this;
    }

    /**
     * Get acideUrique
     *
     * @return string
     */
    public function getAcideUrique()
    {
        return $this->acideUrique;
    }

    /**
     * Set cholesterol
     *
     * @param string $cholesterol
     *
     * @return Biochimie
     */
    public function setCholesterol($cholesterol)
    {
        $this->cholesterol = $cholesterol;

        return $this;
    }

    /**
     * Get cholesterol
     *
     * @return string
     */
    public function getCholesterol()
    {
        return $this->cholesterol;
    }

    /**
     * Set glycemie
     *
     * @param string $glycemie
     *
     * @return Biochimie
     */
    public function setGlycemie($glycemie)
    {
        $this->glycemie = $glycemie;

        return $this;
    }

    /**
     * Get glycemie
     *
     * @return string
     */
    public function getGlycemie()
    {
        return $this->glycemie;
    }

    /**
     * Set bilirubine
     *
     * @param string $bilirubine
     *
     * @return Biochimie
     */
    public function setBilirubine($bilirubine)
    {
        $this->bilirubine = $bilirubine;

        return $this;
    }

    /**
     * Get bilirubine
     *
     * @return string
     */
    public function getBilirubine()
    {
        return $this->bilirubine;
    }

    /**
     * Set magnesemie
     *
     * @param string $magnesemie
     *
     * @return Biochimie
     */
    public function setMagnesemie($magnesemie)
    {
        $this->magnesemie = $magnesemie;

        return $this;
    }

    /**
     * Get magnesemie
     *
     * @return string
     */
    public function getMagnesemie()
    {
        return $this->magnesemie;
    }

    /**
     * Set potassium
     *
     * @param string $potassium
     *
     * @return Biochimie
     */
    public function setPotassium($potassium)
    {
        $this->potassium = $potassium;

        return $this;
    }

    /**
     * Get potassium
     *
     * @return string
     */
    public function getPotassium()
    {
        return $this->potassium;
    }

    /**
     * Set triglyceride
     *
     * @param string $triglyceride
     *
     * @return Biochimie
     */
    public function setTriglyceride($triglyceride)
    {
        $this->triglyceride = $triglyceride;

        return $this;
    }

    /**
     * Get triglyceride
     *
     * @return string
     */
    public function getTriglyceride()
    {
        return $this->triglyceride;
    }

    /**
     * Set amylase
     *
     * @param string $amylase
     *
     * @return Biochimie
     */
    public function setAmylase($amylase)
    {
        $this->amylase = $amylase;

        return $this;
    }

    /**
     * Get amylase
     *
     * @return string
     */
    public function getAmylase()
    {
        return $this->amylase;
    }

    /**
     * Set pal
     *
     * @param string $pal
     *
     * @return Biochimie
     */
    public function setPal($pal)
    {
        $this->pal = $pal;

        return $this;
    }

    /**
     * Get pal
     *
     * @return string
     */
    public function getPal()
    {
        return $this->pal;
    }

    /**
     * Set calcemie
     *
     * @param string $calcemie
     *
     * @return Biochimie
     */
    public function setCalcemie($calcemie)
    {
        $this->calcemie = $calcemie;

        return $this;
    }

    /**
     * Get calcemie
     *
     * @return string
     */
    public function getCalcemie()
    {
        return $this->calcemie;
    }

    /**
     * Set ck
     *
     * @param string $ck
     *
     * @return Biochimie
     */
    public function setCk($ck)
    {
        $this->ck = $ck;

        return $this;
    }

    /**
     * Get ck
     *
     * @return string
     */
    public function getCk()
    {
        return $this->ck;
    }

    /**
     * Set price
     *
     * @param float $price
     *
     * @return Biochimie
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
}
