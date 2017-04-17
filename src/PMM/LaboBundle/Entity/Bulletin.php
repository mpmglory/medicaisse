<?php

namespace PMM\LaboBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use PMM\LaboBundle\Entity\FormuleLeucocytaire;
use PMM\LaboBundle\Entity\Hematologie;
use PMM\LaboBundle\Entity\PcvPu;
use PMM\LaboBundle\Entity\Serologie;

/**
 * Bulletin
 *
 * @ORM\Table(name="bulletin")
 * @ORM\Entity(repositoryClass="PMM\LaboBundle\Repository\BulletinRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class Bulletin
{
    
    /**
     * @ORM\ManyToOne(targetEntity="PMM\CoreBundle\Entity\Patient")
     * @ORM\JoinColumn(nullable=false)
     */
    private $patient;
    
    /**
     * @ORM\OneToOne(targetEntity="PMM\LaboBundle\Entity\FormuleLeucocytaire", cascade={"persist", "remove"})
     */
    private $formuleLeucocytaire;
    
    /**
     * @ORM\OneToOne(targetEntity="PMM\LaboBundle\Entity\Hematologie", cascade={"persist", "remove"})
     */
    private $hematologie;
    
    /**
     * @ORM\OneToOne(targetEntity="PMM\LaboBundle\Entity\PcvPu", cascade={"persist", "remove"})
     */
    private $pcvPu;
    
    /**
     * @ORM\OneToOne(targetEntity="PMM\LaboBundle\Entity\Serologie", cascade={"persist", "remove"})
     */
    private $serologie;
    
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
     * @var float
     *
     * @ORM\Column(name="amount", type="float")
     */
    private $amount;
    
    
    public function __construct(){
        
        $this->date = new \Datetime();
    }


    /**
    * @ORM\PrePersist
    * @ORM\PreUpdate
    */
    public function calculAmount(){

        $amt = 0;
        
        if(null !== $this->formuleLeucocytaire){
            
            $amt += $this->formuleLeucocytaire->getPrice();
        }
        
        if(null !== $this->hematologie){
            
            $amt +=  $this->hematologie->getPrice();
        }
        
        if(null !== $this->pcvpu){
            
            $amt += $this->pcvpu->getPrice();
        }
        
        if(null !== $this->serologie){
            
            $amt += $this->serologie->getPrice();
        }
    
        $this->setAmount($amt);
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
     * Set date
     *
     * @param \DateTime $date
     *
     * @return Bulletin
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
     * Set amount
     *
     * @param float $amount
     *
     * @return Bulletin
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;

        return $this;
    }

    /**
     * Get amount
     *
     * @return float
     */
    public function getAmount()
    {
        return $this->amount;
    }
}

