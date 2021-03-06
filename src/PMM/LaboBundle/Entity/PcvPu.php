<?php

namespace PMM\LaboBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use PMM\LaboBundle\Entity\Bulletin;

/**
 * PcvPu
 *
 * @ORM\Table(name="pcv_pu")
 * @ORM\Entity(repositoryClass="PMM\LaboBundle\Repository\PcvPuRepository")
 */
class PcvPu
{
    
    /**
     * @ORM\OneToOne(targetEntity="PMM\LaboBundle\Entity\Bulletin", mappedBy="pcvPu")
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
     * @ORM\Column(name="etat_col", type="text", nullable=true)
     */
    private $etatCol;

    /**
     * @var string
     *
     * @ORM\Column(name="leucorrhees", type="text", nullable=true)
     */
    private $leucorrhees;

    /**
     * @var string
     *
     * @ORM\Column(name="etat_frais", type="text", nullable=true)
     */
    private $etatFrais;

    /**
     * @var string
     *
     * @ORM\Column(name="ef_cellules_epitheliales", type="text", nullable=true)
     */
    private $efCellulesEpitheliales;

    /**
     * @var string
     *
     * @ORM\Column(name="ef_leucocytes", type="text", nullable=true)
     */
    private $efLeucocytes;

    /**
     * @var string
     *
     * @ORM\Column(name="ef_germes", type="text", nullable=true)
     */
    private $efGermes;

    /**
     * @var string
     *
     * @ORM\Column(name="ef_elements_levuriformes", type="text", nullable=true)
     */
    private $efElementsLevuriformes;

    /**
     * @var string
     *
     * @ORM\Column(name="ef_trichononas_vaginalis", type="text", nullable=true)
     */
    private $efTrichononasVaginalis;

    /**
     * @var string
     *
     * @ORM\Column(name="ef_clue_cell", type="text", nullable=true)
     */
    private $efClueCell;

    /**
     * @var string
     *
     * @ORM\Column(name="etat_colore", type="text", nullable=true)
     */
    private $etatColore;

    /**
     * @var string
     *
     * @ORM\Column(name="ec_cellules_epitheliales", type="text", nullable=true)
     */
    private $ecCellulesEpitheliales;

    /**
     * @var string
     *
     * @ORM\Column(name="ec_polynucleaires", type="text", nullable=true)
     */
    private $ecPolynucleaires;

    /**
     * @var string
     *
     * @ORM\Column(name="ec_bacilles_gram_negatif", type="text", nullable=true)
     */
    private $ecBacillesGramNegatif;

    /**
     * @var string
     *
     * @ORM\Column(name="ec_bacilles_gram_positif", type="text", nullable=true)
     */
    private $ecBacillesGramPositif;

    /**
     * @var string
     *
     * @ORM\Column(name="ec_cocci_gram_positif", type="text", nullable=true)
     */
    private $ecCocciGramPositif;

    /**
     * @var string
     *
     * @ORM\Column(name="ec_cocci_gram_negatif", type="text", nullable=true)
     */
    private $ecCocciGramNegatif;

    /**
     * @var string
     *
     * @ORM\Column(name="ec_spores_mycosiques", type="text", nullable=true)
     */
    private $ecSporesMycosiques;

    /**
     * @var string
     *
     * @ORM\Column(name="ec_filaments_myceliens", type="text", nullable=true)
     */
    private $ecFilamentsMyceliens;

    /**
     * @var string
     *
     * @ORM\Column(name="ec_flore_doderiein", type="text", nullable=true)
     */
    private $ecFloreDoderiein;

    /**
     * @var string
     *
     * @ORM\Column(name="koh", type="text", nullable=true)
     */
    private $koh;

    /**
     * @var string
     *
     * @ORM\Column(name="ph", type="text", nullable=true)
     */
    private $ph;
    
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
     * @return PcvPu
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
     * Set etatCol
     *
     * @param string $etatCol
     *
     * @return PcvPu
     */
    public function setEtatCol($etatCol)
    {
        $this->etatCol = $etatCol;

        return $this;
    }

    /**
     * Get etatCol
     *
     * @return string
     */
    public function getEtatCol()
    {
        return $this->etatCol;
    }

    /**
     * Set leucorrhees
     *
     * @param string $leucorrhees
     *
     * @return PcvPu
     */
    public function setLeucorrhees($leucorrhees)
    {
        $this->leucorrhees = $leucorrhees;

        return $this;
    }

    /**
     * Get leucorrhees
     *
     * @return string
     */
    public function getLeucorrhees()
    {
        return $this->leucorrhees;
    }

    /**
     * Set etatFrais
     *
     * @param string $etatFrais
     *
     * @return PcvPu
     */
    public function setEtatFrais($etatFrais)
    {
        $this->etatFrais = $etatFrais;

        return $this;
    }

    /**
     * Get etatFrais
     *
     * @return string
     */
    public function getEtatFrais()
    {
        return $this->etatFrais;
    }

    /**
     * Set efCellulesEpitheliales
     *
     * @param string $efCellulesEpitheliales
     *
     * @return PcvPu
     */
    public function setEfCellulesEpitheliales($efCellulesEpitheliales)
    {
        $this->efCellulesEpitheliales = $efCellulesEpitheliales;

        return $this;
    }

    /**
     * Get efCellulesEpitheliales
     *
     * @return string
     */
    public function getEfCellulesEpitheliales()
    {
        return $this->efCellulesEpitheliales;
    }

    /**
     * Set efLeucocytes
     *
     * @param string $efLeucocytes
     *
     * @return PcvPu
     */
    public function setEfLeucocytes($efLeucocytes)
    {
        $this->efLeucocytes = $efLeucocytes;

        return $this;
    }

    /**
     * Get efLeucocytes
     *
     * @return string
     */
    public function getEfLeucocytes()
    {
        return $this->efLeucocytes;
    }

    /**
     * Set efGermes
     *
     * @param string $efGermes
     *
     * @return PcvPu
     */
    public function setEfGermes($efGermes)
    {
        $this->efGermes = $efGermes;

        return $this;
    }

    /**
     * Get efGermes
     *
     * @return string
     */
    public function getEfGermes()
    {
        return $this->efGermes;
    }

    /**
     * Set efElementsLevuriformes
     *
     * @param string $efElementsLevuriformes
     *
     * @return PcvPu
     */
    public function setEfElementsLevuriformes($efElementsLevuriformes)
    {
        $this->efElementsLevuriformes = $efElementsLevuriformes;

        return $this;
    }

    /**
     * Get efElementsLevuriformes
     *
     * @return string
     */
    public function getEfElementsLevuriformes()
    {
        return $this->efElementsLevuriformes;
    }

    /**
     * Set efTrichononasVaginalis
     *
     * @param string $efTrichononasVaginalis
     *
     * @return PcvPu
     */
    public function setEfTrichononasVaginalis($efTrichononasVaginalis)
    {
        $this->efTrichononasVaginalis = $efTrichononasVaginalis;

        return $this;
    }

    /**
     * Get efTrichononasVaginalis
     *
     * @return string
     */
    public function getEfTrichononasVaginalis()
    {
        return $this->efTrichononasVaginalis;
    }

    /**
     * Set efClueCell
     *
     * @param string $efClueCell
     *
     * @return PcvPu
     */
    public function setEfClueCell($efClueCell)
    {
        $this->efClueCell = $efClueCell;

        return $this;
    }

    /**
     * Get efClueCell
     *
     * @return string
     */
    public function getEfClueCell()
    {
        return $this->efClueCell;
    }

    /**
     * Set etatColore
     *
     * @param string $etatColore
     *
     * @return PcvPu
     */
    public function setEtatColore($etatColore)
    {
        $this->etatColore = $etatColore;

        return $this;
    }

    /**
     * Get etatColore
     *
     * @return string
     */
    public function getEtatColore()
    {
        return $this->etatColore;
    }

    /**
     * Set ecCellulesEpitheliales
     *
     * @param string $ecCellulesEpitheliales
     *
     * @return PcvPu
     */
    public function setEcCellulesEpitheliales($ecCellulesEpitheliales)
    {
        $this->ecCellulesEpitheliales = $ecCellulesEpitheliales;

        return $this;
    }

    /**
     * Get ecCellulesEpitheliales
     *
     * @return string
     */
    public function getEcCellulesEpitheliales()
    {
        return $this->ecCellulesEpitheliales;
    }

    /**
     * Set ecPolynucleaires
     *
     * @param string $ecPolynucleaires
     *
     * @return PcvPu
     */
    public function setEcPolynucleaires($ecPolynucleaires)
    {
        $this->ecPolynucleaires = $ecPolynucleaires;

        return $this;
    }

    /**
     * Get ecPolynucleaires
     *
     * @return string
     */
    public function getEcPolynucleaires()
    {
        return $this->ecPolynucleaires;
    }

    /**
     * Set ecBacillesGramNegatif
     *
     * @param string $ecBacillesGramNegatif
     *
     * @return PcvPu
     */
    public function setEcBacillesGramNegatif($ecBacillesGramNegatif)
    {
        $this->ecBacillesGramNegatif = $ecBacillesGramNegatif;

        return $this;
    }

    /**
     * Get ecBacillesGramNegatif
     *
     * @return string
     */
    public function getEcBacillesGramNegatif()
    {
        return $this->ecBacillesGramNegatif;
    }

    /**
     * Set ecBacillesGramPositif
     *
     * @param string $ecBacillesGramPositif
     *
     * @return PcvPu
     */
    public function setEcBacillesGramPositif($ecBacillesGramPositif)
    {
        $this->ecBacillesGramPositif = $ecBacillesGramPositif;

        return $this;
    }

    /**
     * Get ecBacillesGramPositif
     *
     * @return string
     */
    public function getEcBacillesGramPositif()
    {
        return $this->ecBacillesGramPositif;
    }

    /**
     * Set ecCocciGramPositif
     *
     * @param string $ecCocciGramPositif
     *
     * @return PcvPu
     */
    public function setEcCocciGramPositif($ecCocciGramPositif)
    {
        $this->ecCocciGramPositif = $ecCocciGramPositif;

        return $this;
    }

    /**
     * Get ecCocciGramPositif
     *
     * @return string
     */
    public function getEcCocciGramPositif()
    {
        return $this->ecCocciGramPositif;
    }

    /**
     * Set ecCocciGramNegatif
     *
     * @param string $ecCocciGramNegatif
     *
     * @return PcvPu
     */
    public function setEcCocciGramNegatif($ecCocciGramNegatif)
    {
        $this->ecCocciGramNegatif = $ecCocciGramNegatif;

        return $this;
    }

    /**
     * Get ecCocciGramNegatif
     *
     * @return string
     */
    public function getEcCocciGramNegatif()
    {
        return $this->ecCocciGramNegatif;
    }

    /**
     * Set ecSporesMycosiques
     *
     * @param string $ecSporesMycosiques
     *
     * @return PcvPu
     */
    public function setEcSporesMycosiques($ecSporesMycosiques)
    {
        $this->ecSporesMycosiques = $ecSporesMycosiques;

        return $this;
    }

    /**
     * Get ecSporesMycosiques
     *
     * @return string
     */
    public function getEcSporesMycosiques()
    {
        return $this->ecSporesMycosiques;
    }

    /**
     * Set ecFilamentsMyceliens
     *
     * @param string $ecFilamentsMyceliens
     *
     * @return PcvPu
     */
    public function setEcFilamentsMyceliens($ecFilamentsMyceliens)
    {
        $this->ecFilamentsMyceliens = $ecFilamentsMyceliens;

        return $this;
    }

    /**
     * Get ecFilamentsMyceliens
     *
     * @return string
     */
    public function getEcFilamentsMyceliens()
    {
        return $this->ecFilamentsMyceliens;
    }

    /**
     * Set ecFloreDoderiein
     *
     * @param string $ecFloreDoderiein
     *
     * @return PcvPu
     */
    public function setEcFloreDoderiein($ecFloreDoderiein)
    {
        $this->ecFloreDoderiein = $ecFloreDoderiein;

        return $this;
    }

    /**
     * Get ecFloreDoderiein
     *
     * @return string
     */
    public function getEcFloreDoderiein()
    {
        return $this->ecFloreDoderiein;
    }

    /**
     * Set koh
     *
     * @param string $koh
     *
     * @return PcvPu
     */
    public function setKoh($koh)
    {
        $this->koh = $koh;

        return $this;
    }

    /**
     * Get koh
     *
     * @return string
     */
    public function getKoh()
    {
        return $this->koh;
    }

    /**
     * Set ph
     *
     * @param string $ph
     *
     * @return PcvPu
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
     * Set price
     *
     * @param float $price
     *
     * @return PcvPu
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
     * @return PcvPu
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
