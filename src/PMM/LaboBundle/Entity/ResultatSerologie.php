<?php

namespace PMM\LaboBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use PMM\LaboBundle\Entity\Bulletin;

/**
 * Serologie
 *
 * @ORM\Table(name="serologie")
 * @ORM\Entity(repositoryClass="PMM\LaboBundle\Repository\SerologieRepository")
 */
class Serologie
{
    
    /**
     * @ORM\OneToOne(targetEntity="PMM\LaboBundle\Entity\Bulletin", mappedBy="serologie")
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
     * @ORM\Column(name="vih", type="string", length=255, nullable=true)
     */
    private $vih;

    /**
     * @var string
     *
     * @ORM\Column(name="also", type="text", nullable=true)
     */
    private $also;

    /**
     * @var string
     *
     * @ORM\Column(name="crp", type="text", nullable=true)
     */
    private $crp;

    /**
     * @var string
     *
     * @ORM\Column(name="tpha", type="text", nullable=true)
     */
    private $tpha;

    /**
     * @var string
     *
     * @ORM\Column(name="vdrl", type="text", nullable=true)
     */
    private $vdrl;

    /**
     * @var string
     *
     * @ORM\Column(name="ag_hbs", type="text", nullable=true)
     */
    private $agHbs;

    /**
     * @var string
     *
     * @ORM\Column(name="toxo_igg", type="text", nullable=true)
     */
    private $toxoIgg;

    /**
     * @var string
     *
     * @ORM\Column(name="widal_test", type="text", nullable=true)
     */
    private $widalTest;

    /**
     * @var string
     *
     * @ORM\Column(name="rubeole", type="text", nullable=true)
     */
    private $rubeole;

    /**
     * @var string
     *
     * @ORM\Column(name="hcv", type="text", nullable=true)
     */
    private $hcv;

    /**
     * @var string
     *
     * @ORM\Column(name="chlamydia", type="text", nullable=true)
     */
    private $chlamydia;

    /**
     * @var string
     *
     * @ORM\Column(name="fr", type="text", nullable=true)
     */
    private $fr;

    /**
     * @var string
     *
     * @ORM\Column(name="selles", type="text", nullable=true)
     */
    private $selles;
    
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
     * @return Serologie
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
     * Set vih
     *
     * @param string $vih
     *
     * @return Serologie
     */
    public function setVih($vih)
    {
        $this->vih = $vih;

        return $this;
    }

    /**
     * Get vih
     *
     * @return string
     */
    public function getVih()
    {
        return $this->vih;
    }

    /**
     * Set also
     *
     * @param string $also
     *
     * @return Serologie
     */
    public function setAlso($also)
    {
        $this->also = $also;

        return $this;
    }

    /**
     * Get also
     *
     * @return string
     */
    public function getAlso()
    {
        return $this->also;
    }

    /**
     * Set crp
     *
     * @param string $crp
     *
     * @return Serologie
     */
    public function setCrp($crp)
    {
        $this->crp = $crp;

        return $this;
    }

    /**
     * Get crp
     *
     * @return string
     */
    public function getCrp()
    {
        return $this->crp;
    }

    /**
     * Set tpha
     *
     * @param string $tpha
     *
     * @return Serologie
     */
    public function setTpha($tpha)
    {
        $this->tpha = $tpha;

        return $this;
    }

    /**
     * Get tpha
     *
     * @return string
     */
    public function getTpha()
    {
        return $this->tpha;
    }

    /**
     * Set vdrl
     *
     * @param string $vdrl
     *
     * @return Serologie
     */
    public function setVdrl($vdrl)
    {
        $this->vdrl = $vdrl;

        return $this;
    }

    /**
     * Get vdrl
     *
     * @return string
     */
    public function getVdrl()
    {
        return $this->vdrl;
    }

    /**
     * Set agHbs
     *
     * @param string $agHbs
     *
     * @return Serologie
     */
    public function setAgHbs($agHbs)
    {
        $this->agHbs = $agHbs;

        return $this;
    }

    /**
     * Get agHbs
     *
     * @return string
     */
    public function getAgHbs()
    {
        return $this->agHbs;
    }

    /**
     * Set toxoIgg
     *
     * @param string $toxoIgg
     *
     * @return Serologie
     */
    public function setToxoIgg($toxoIgg)
    {
        $this->toxoIgg = $toxoIgg;

        return $this;
    }

    /**
     * Get toxoIgg
     *
     * @return string
     */
    public function getToxoIgg()
    {
        return $this->toxoIgg;
    }

    /**
     * Set widalTest
     *
     * @param string $widalTest
     *
     * @return Serologie
     */
    public function setWidalTest($widalTest)
    {
        $this->widalTest = $widalTest;

        return $this;
    }

    /**
     * Get widalTest
     *
     * @return string
     */
    public function getWidalTest()
    {
        return $this->widalTest;
    }

    /**
     * Set rubeole
     *
     * @param string $rubeole
     *
     * @return Serologie
     */
    public function setRubeole($rubeole)
    {
        $this->rubeole = $rubeole;

        return $this;
    }

    /**
     * Get rubeole
     *
     * @return string
     */
    public function getRubeole()
    {
        return $this->rubeole;
    }

    /**
     * Set hcv
     *
     * @param string $hcv
     *
     * @return Serologie
     */
    public function setHcv($hcv)
    {
        $this->hcv = $hcv;

        return $this;
    }

    /**
     * Get hcv
     *
     * @return string
     */
    public function getHcv()
    {
        return $this->hcv;
    }

    /**
     * Set chlamydia
     *
     * @param string $chlamydia
     *
     * @return Serologie
     */
    public function setChlamydia($chlamydia)
    {
        $this->chlamydia = $chlamydia;

        return $this;
    }

    /**
     * Get chlamydia
     *
     * @return string
     */
    public function getChlamydia()
    {
        return $this->chlamydia;
    }

    /**
     * Set fr
     *
     * @param string $fr
     *
     * @return Serologie
     */
    public function setFr($fr)
    {
        $this->fr = $fr;

        return $this;
    }

    /**
     * Get fr
     *
     * @return string
     */
    public function getFr()
    {
        return $this->fr;
    }

    /**
     * Set selles
     *
     * @param string $selles
     *
     * @return Serologie
     */
    public function setSelles($selles)
    {
        $this->selles = $selles;

        return $this;
    }

    /**
     * Get selles
     *
     * @return string
     */
    public function getSelles()
    {
        return $this->selles;
    }

    /**
     * Set price
     *
     * @param float $price
     *
     * @return Serologie
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
     * @return Serologie
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
