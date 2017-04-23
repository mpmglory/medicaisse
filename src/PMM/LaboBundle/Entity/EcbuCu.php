<?php

namespace PMM\LaboBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use PMM\LaboBundle\Entity\Bulletin;

/**
 * EcbuCu
 *
 * @ORM\Table(name="ecbu_cu")
 * @ORM\Entity(repositoryClass="PMM\LaboBundle\Repository\EcbuCuRepository")
 */
class EcbuCu
{
    /**
     * @ORM\OneToOne(targetEntity="PMM\LaboBundle\Entity\Bulletin", mappedBy="ecbuCu")
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
     * @ORM\Column(name="aspect", type="text", nullable=true)
     */
    private $aspect;

    /**
     * @var string
     *
     * @ORM\Column(name="etatFrais", type="text", nullable=true)
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
     * @ORM\Column(name="ef_parasites", type="text", nullable=true)
     */
    private $efParasites;


    /**
     * @var string
     *
     * @ORM\Column(name="efCristaux", type="text", nullable=true)
     */
    private $efCristaux;

    /**
     * @var string
     *
     * @ORM\Column(name="etatColore", type="text", nullable=true)
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
     * @ORM\Column(name="ecCristaux", type="text", nullable=true)
     */
    private $ecCristaux;
    
    /**
     * @var string
     *
     * @ORM\Column(name="ecAutres", type="text", nullable=true)
     */
    private $ecAutres;

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
     * @return EcbuCu
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
     * Set aspect
     *
     * @param string $aspect
     *
     * @return EcbuCu
     */
    public function setAspect($aspect)
    {
        $this->aspect = $aspect;

        return $this;
    }

    /**
     * Get aspect
     *
     * @return string
     */
    public function getAspect()
    {
        return $this->aspect;
    }

    /**
     * Set etatFrais
     *
     * @param string $etatFrais
     *
     * @return EcbuCu
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
     * @return EcbuCu
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
     * @return EcbuCu
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
     * @return EcbuCu
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
     * @return EcbuCu
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
     * Set efParasites
     *
     * @param string $efParasites
     *
     * @return EcbuCu
     */
    public function setEfParasites($efParasites)
    {
        $this->efParasites = $efParasites;

        return $this;
    }

    /**
     * Get efParasites
     *
     * @return string
     */
    public function getEfParasites()
    {
        return $this->efParasites;
    }

    /**
     * Set efCristaux
     *
     * @param string $efCristaux
     *
     * @return EcbuCu
     */
    public function setEfCristaux($efCristaux)
    {
        $this->efCristaux = $efCristaux;

        return $this;
    }

    /**
     * Get efCristaux
     *
     * @return string
     */
    public function getEfCristaux()
    {
        return $this->efCristaux;
    }

    /**
     * Set etatColore
     *
     * @param string $etatColore
     *
     * @return EcbuCu
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
     * @return EcbuCu
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
     * @return EcbuCu
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
     * @return EcbuCu
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
     * @return EcbuCu
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
     * @return EcbuCu
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
     * @return EcbuCu
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
     * @return EcbuCu
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
     * @return EcbuCu
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
     * @return EcbuCu
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
     * Set ecCristaux
     *
     * @param string $ecCristaux
     *
     * @return EcbuCu
     */
    public function setEcCristaux($ecCristaux)
    {
        $this->ecCristaux = $ecCristaux;

        return $this;
    }

    /**
     * Get ecCristaux
     *
     * @return string
     */
    public function getEcCristaux()
    {
        return $this->ecCristaux;
    }

    /**
     * Set ecAutres
     *
     * @param string $ecAutres
     *
     * @return EcbuCu
     */
    public function setEcAutres($ecAutres)
    {
        $this->ecAutres = $ecAutres;

        return $this;
    }

    /**
     * Get ecAutres
     *
     * @return string
     */
    public function getEcAutres()
    {
        return $this->ecAutres;
    }

    /**
     * Set price
     *
     * @param float $price
     *
     * @return EcbuCu
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
     * @return EcbuCu
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
