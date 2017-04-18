<?php

namespace PMM\LaboBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use PMM\LaboBundle\Entity\Bulletin;

/**
 * FormuleLeucocytaire
 *
 * @ORM\Table(name="formule_leucocytaire")
 * @ORM\Entity(repositoryClass="PMM\LaboBundle\Repository\FormuleLeucocytaireRepository")
 */
class FormuleLeucocytaire
{
    
    /**
     * @ORM\OneToOne(targetEntity="PMM\LaboBundle\Entity\Bulletin", mappedBy="formuleLeucocytaire")
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
     * @ORM\Column(name="neutrophiles", type="text", nullable=true)
     */
    private $neutrophiles;

    /**
     * @var string
     *
     * @ORM\Column(name="eosinophiles", type="text", nullable=true)
     */
    private $eosinophiles;

    /**
     * @var string
     *
     * @ORM\Column(name="basophiles", type="text", nullable=true)
     */
    private $basophiles;

    /**
     * @var string
     *
     * @ORM\Column(name="lymphocytes", type="text", nullable=true)
     */
    private $lymphocytes;

    /**
     * @var string
     *
     * @ORM\Column(name="monocytes", type="text", nullable=true)
     */
    private $monocytes;

    /**
     * @var string
     *
     * @ORM\Column(name="v_s", type="text", nullable=true)
     */
    private $vS;

    /**
     * @var string
     *
     * @ORM\Column(name="gpe_sanguin", type="text", nullable=true)
     */
    private $gpeSanguin;

    /**
     * @var string
     *
     * @ORM\Column(name="goutte_epaisse", type="string", length=255, nullable=true)
     */
    private $goutteEpaisse;

    /**
     * @var string
     *
     * @ORM\Column(name="test_emmel", type="text", nullable=true)
     */
    private $testEmmel;

    /**
     * @var string
     *
     * @ORM\Column(name="rmf_snif", type="text", nullable=true)
     */
    private $rmfSnif;
    
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
     * @return FormuleLeucocytaire
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
     * Set neutrophiles
     *
     * @param string $neutrophiles
     *
     * @return FormuleLeucocytaire
     */
    public function setNeutrophiles($neutrophiles)
    {
        $this->neutrophiles = $neutrophiles;

        return $this;
    }

    /**
     * Get neutrophiles
     *
     * @return string
     */
    public function getNeutrophiles()
    {
        return $this->neutrophiles;
    }

    /**
     * Set eosinophiles
     *
     * @param string $eosinophiles
     *
     * @return FormuleLeucocytaire
     */
    public function setEosinophiles($eosinophiles)
    {
        $this->eosinophiles = $eosinophiles;

        return $this;
    }

    /**
     * Get eosinophiles
     *
     * @return string
     */
    public function getEosinophiles()
    {
        return $this->eosinophiles;
    }

    /**
     * Set basophiles
     *
     * @param string $basophiles
     *
     * @return FormuleLeucocytaire
     */
    public function setBasophiles($basophiles)
    {
        $this->basophiles = $basophiles;

        return $this;
    }

    /**
     * Get basophiles
     *
     * @return string
     */
    public function getBasophiles()
    {
        return $this->basophiles;
    }

    /**
     * Set lymphocytes
     *
     * @param string $lymphocytes
     *
     * @return FormuleLeucocytaire
     */
    public function setLymphocytes($lymphocytes)
    {
        $this->lymphocytes = $lymphocytes;

        return $this;
    }

    /**
     * Get lymphocytes
     *
     * @return string
     */
    public function getLymphocytes()
    {
        return $this->lymphocytes;
    }

    /**
     * Set monocytes
     *
     * @param string $monocytes
     *
     * @return FormuleLeucocytaire
     */
    public function setMonocytes($monocytes)
    {
        $this->monocytes = $monocytes;

        return $this;
    }

    /**
     * Get monocytes
     *
     * @return string
     */
    public function getMonocytes()
    {
        return $this->monocytes;
    }

    /**
     * Set vS
     *
     * @param string $vS
     *
     * @return FormuleLeucocytaire
     */
    public function setVS($vS)
    {
        $this->vS = $vS;

        return $this;
    }

    /**
     * Get vS
     *
     * @return string
     */
    public function getVS()
    {
        return $this->vS;
    }

    /**
     * Set gpeSanguin
     *
     * @param string $gpeSanguin
     *
     * @return FormuleLeucocytaire
     */
    public function setGpeSanguin($gpeSanguin)
    {
        $this->gpeSanguin = $gpeSanguin;

        return $this;
    }

    /**
     * Get gpeSanguin
     *
     * @return string
     */
    public function getGpeSanguin()
    {
        return $this->gpeSanguin;
    }

    /**
     * Set goutteEpaisse
     *
     * @param string $goutteEpaisse
     *
     * @return FormuleLeucocytaire
     */
    public function setGoutteEpaisse($goutteEpaisse)
    {
        $this->goutteEpaisse = $goutteEpaisse;

        return $this;
    }

    /**
     * Get goutteEpaisse
     *
     * @return string
     */
    public function getGoutteEpaisse()
    {
        return $this->goutteEpaisse;
    }

    /**
     * Set testEmmel
     *
     * @param string $testEmmel
     *
     * @return FormuleLeucocytaire
     */
    public function setTestEmmel($testEmmel)
    {
        $this->testEmmel = $testEmmel;

        return $this;
    }

    /**
     * Get testEmmel
     *
     * @return string
     */
    public function getTestEmmel()
    {
        return $this->testEmmel;
    }

    /**
     * Set rmfSnif
     *
     * @param string $rmfSnif
     *
     * @return FormuleLeucocytaire
     */
    public function setRmfSnif($rmfSnif)
    {
        $this->rmfSnif = $rmfSnif;

        return $this;
    }

    /**
     * Get rmfSnif
     *
     * @return string
     */
    public function getRmfSnif()
    {
        return $this->rmfSnif;
    }

    /**
     * Set price
     *
     * @param float $price
     *
     * @return FormuleLeucocytaire
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
     * @return FormuleLeucocytaire
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
