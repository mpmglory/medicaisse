<?php

namespace PMM\LaboBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use PMM\LaboBundle\Entity\Bulletin;

/**
 * ResultatUrineLrc
 *
 * @ORM\Table(name="resultat_urine_lrc")
 * @ORM\Entity(repositoryClass="PMM\LaboBundle\Repository\ResultatUrineLrcRepository")
 */
class ResultatUrineLrc
{
    /**
     * @ORM\OneToOne(targetEntity="PMM\LaboBundle\Entity\Bulletin", mappedBy="rUrineLrc")
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
     * @ORM\Column(name="ph", type="text", nullable=true)
     */
    private $ph;

    /**
     * @var string
     *
     * @ORM\Column(name="proteine", type="text", nullable=true)
     */
    private $proteine;

    /**
     * @var string
     *
     * @ORM\Column(name="glucose", type="text", nullable=true)
     */
    private $glucose;

    /**
     * @var string
     *
     * @ORM\Column(name="densite", type="text", nullable=true)
     */
    private $densite;

    /**
     * @var string
     *
     * @ORM\Column(name="leucocytes", type="text", nullable=true)
     */
    private $leucocytes;

    /**
     * @var string
     *
     * @ORM\Column(name="nitrites", type="text", nullable=true)
     */
    private $nitrites;

    /**
     * @var string
     *
     * @ORM\Column(name="acetone", type="text", nullable=true)
     */
    private $acetone;

    /**
     * @var string
     *
     * @ORM\Column(name="urobilinogene", type="text", nullable=true)
     */
    private $urobilinogene;

    /**
     * @var string
     *
     * @ORM\Column(name="bilirubine", type="text", nullable=true)
     */
    private $bilirubine;

    /**
     * @var string
     *
     * @ORM\Column(name="sang", type="text", nullable=true)
     */
    private $sang;

    /**
     * @var string
     *
     * @ORM\Column(name="hb", type="text", nullable=true)
     */
    private $hb;

    /**
     * @var string
     *
     * @ORM\Column(name="hcg", type="text", nullable=true)
     */
    private $hcg;

    /**
     * @var string
     *
     * @ORM\Column(name="selsBilaires", type="text", nullable=true)
     */
    private $selsBilaires;

    /**
     * @var string
     *
     * @ORM\Column(name="pigBilaires", type="text", nullable=true)
     */
    private $pigBilaires;
    
    
    public function __construct(){
        
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
     * Set date
     *
     * @param \DateTime $date
     *
     * @return UrineLrc
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
     * Set ph
     *
     * @param string $ph
     *
     * @return UrineLrc
     */
    public function setPh($ph)
    {
        $this->ph = $ph;

        return $this;
    }

    /**
     * Get ph
     *
     * @return string
     */
    public function getPh()
    {
        return $this->ph;
    }

    /**
     * Set proteine
     *
     * @param string $proteine
     *
     * @return UrineLrc
     */
    public function setProteine($proteine)
    {
        $this->proteine = $proteine;

        return $this;
    }

    /**
     * Get proteine
     *
     * @return string
     */
    public function getProteine()
    {
        return $this->proteine;
    }

    /**
     * Set glucose
     *
     * @param string $glucose
     *
     * @return UrineLrc
     */
    public function setGlucose($glucose)
    {
        $this->glucose = $glucose;

        return $this;
    }

    /**
     * Get glucose
     *
     * @return string
     */
    public function getGlucose()
    {
        return $this->glucose;
    }

    /**
     * Set densite
     *
     * @param string $densite
     *
     * @return UrineLrc
     */
    public function setDensite($densite)
    {
        $this->densite = $densite;

        return $this;
    }

    /**
     * Get densite
     *
     * @return string
     */
    public function getDensite()
    {
        return $this->densite;
    }

    /**
     * Set leucocytes
     *
     * @param string $leucocytes
     *
     * @return UrineLrc
     */
    public function setLeucocytes($leucocytes)
    {
        $this->leucocytes = $leucocytes;

        return $this;
    }

    /**
     * Get leucocytes
     *
     * @return string
     */
    public function getLeucocytes()
    {
        return $this->leucocytes;
    }

    /**
     * Set nitrites
     *
     * @param string $nitrites
     *
     * @return UrineLrc
     */
    public function setNitrites($nitrites)
    {
        $this->nitrites = $nitrites;

        return $this;
    }

    /**
     * Get nitrites
     *
     * @return string
     */
    public function getNitrites()
    {
        return $this->nitrites;
    }

    /**
     * Set acetone
     *
     * @param string $acetone
     *
     * @return UrineLrc
     */
    public function setAcetone($acetone)
    {
        $this->acetone = $acetone;

        return $this;
    }

    /**
     * Get acetone
     *
     * @return string
     */
    public function getAcetone()
    {
        return $this->acetone;
    }

    /**
     * Set urobilinogene
     *
     * @param string $urobilinogene
     *
     * @return UrineLrc
     */
    public function setUrobilinogene($urobilinogene)
    {
        $this->urobilinogene = $urobilinogene;

        return $this;
    }

    /**
     * Get urobilinogene
     *
     * @return string
     */
    public function getUrobilinogene()
    {
        return $this->urobilinogene;
    }

    /**
     * Set bilirubine
     *
     * @param string $bilirubine
     *
     * @return UrineLrc
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
     * Set sang
     *
     * @param string $sang
     *
     * @return UrineLrc
     */
    public function setSang($sang)
    {
        $this->sang = $sang;

        return $this;
    }

    /**
     * Get sang
     *
     * @return string
     */
    public function getSang()
    {
        return $this->sang;
    }

    /**
     * Set hb
     *
     * @param string $hb
     *
     * @return UrineLrc
     */
    public function setHb($hb)
    {
        $this->hb = $hb;

        return $this;
    }

    /**
     * Get hb
     *
     * @return string
     */
    public function getHb()
    {
        return $this->hb;
    }

    /**
     * Set hcg
     *
     * @param string $hcg
     *
     * @return UrineLrc
     */
    public function setHcg($hcg)
    {
        $this->hcg = $hcg;

        return $this;
    }

    /**
     * Get hcg
     *
     * @return string
     */
    public function getHcg()
    {
        return $this->hcg;
    }

    /**
     * Set selsBilaires
     *
     * @param string $selsBilaires
     *
     * @return UrineLrc
     */
    public function setSelsBilaires($selsBilaires)
    {
        $this->selsBilaires = $selsBilaires;

        return $this;
    }

    /**
     * Get selsBilaires
     *
     * @return string
     */
    public function getSelsBilaires()
    {
        return $this->selsBilaires;
    }

    /**
     * Set pigBilaires
     *
     * @param string $pigBilaires
     *
     * @return UrineLrc
     */
    public function setPigBilaires($pigBilaires)
    {
        $this->pigBilaires = $pigBilaires;

        return $this;
    }

    /**
     * Get pigBilaires
     *
     * @return string
     */
    public function getPigBilaires()
    {
        return $this->pigBilaires;
    }

    /**
     * Set bulletin
     *
     * @param \PMM\LaboBundle\Entity\Bulletin $bulletin
     *
     * @return UrineLrc
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
