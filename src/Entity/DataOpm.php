<?php 

namespace App\Entity;

use DateTime;
use App\Helper\SlugifyHelper;
use Doctrine\Common\Persistence\Event\LifecycleEventArgs;
 
class DataOpm
{
	private $id;
    private $transporteur; 			//
    private $code_tarif;			//
	private $num_profil;			//
	private $zonage_titre;			//
	private $zone_valid;			//
	private $horodatage;			//
	private $ligne_controle;		//
	private $nature_transact;		//
	private $code_station_event;	//
	private $num_borne;				////spe ferre
	private $recette;				////spe ferre 
	private $reseau;				//
	private $statut_valid; 			//
	private $equipement; 			//// Spe Bus
	private $coquille; 				//// spe Bus
	private $ref_ligne;				////
	private $date_integ_olaf; 		//
	private $env;			  		//
	private $date_integ;			//utile pour la suppression des données de validation
			
    /**
     * Get transporteur
     *
     * @return String
     */
    public function getTransporteur(): ?string
    {
        return $this->transporteur;
    }
	 /**
     * Set transporteur
     *
     * @param string $transporteur
     * @return DataStif
     */
    public function setTransporteur(string $transporteur): self
    {
        $this->transporteur = $transporteur;
        return $this;
    }
	/**
     * Get codeTarif
     *
     * @return String
     */
    public function getCode_Tarif(): ?string
    {
        return $this->code_tarif;
    }
	 /**
     * Set codeTarif
     *
     * @param string $codeTarif
     * @return DataStif
     */
    public function setCode_Tarif(string $codeTarif): self
    {
        $this->code_tarif = $codeTarif;
        return $this;
    }
	/**
     * Get num_profil
     *
     * @return String
     */
    public function getNum_Profil(): ?string
    {
        return $this->num_profil;
    }
	 /**
     * Set num_profil
     *
     * @param string $num_profil
     * @return DataOlaf
     */
    public function setNum_Profil(string $num_profil): self
    {
        $this->num_profil = $num_profil;
        return $this;
    }
	
	/**
     * Get zonageTitre
     *
     * @return String
     */
	public function getZonage_Titre(): ?string
	{
		return $this->zonage_titre;
	}
	/**
     * Get zoneValid
     *
     * @return String
     */
	public function getZone_Valid(): ?string
	{
		return $this->zone_valid;
	}
	/**
     * Get ligneControle
     *
     * @return String
     */
	public function getLigne_Controle(): ?string
	{
		return $this->ligne_controle;
	}
	/**
     * Get nature_transact
     *
     * @return String
     */
	public function getNature_Transact(): ?string
	{
		return $this->nature_transact;
	}
	/**
     * Get code_station_event
     *
     * @return String
     */
	public function getCode_Station_Event(): ?string
	{
		return $this->code_station_event;
	}
	/**
     * Get reseau
     *
     * @return String
     */
	public function getReseau(): ?string
	{
		return $this->reseau;
	}
	/**
     * Get recette
     *
     * @return String
     */
	public function getRecette(): ?string
	{
		return $this->recette;
	}
	/**
     * Get statut_valid
     *
     * @return String
     */
	public function getStatut_Valid(): ?string
	{
		return $this->statut_valid;
	}	
	/**
     * Get numBorne
     *
     * @return String
     */
    public function getNum_Borne(): ?string
    {
        return $this->num_borne;
    }
	 /**
     * Set numBorne
     *
     * @param string $numBorne
     * @return DataOlaf
     */
    public function setNum_Borne(string $numBorne): self
    {
        $this->numBorne = $numBorne;
        return $this;
    }
	public function getHorodatage(): DateTime
    {
        return $this->horodatage;
    }
	
	/**
     * Get identVehicule
     *
     * @return String
     */
    public function getCoquille(): ?string
    {
        return $this->coquille;
    }
	 /**
     * Set coquille
     *
     * @param string $coquille
     * @return DataOlaf
     */
    public function setCoquille(string $coquille): self
    {
        $this->coquille = $coquille;
        return $this;
    }
	/**
     * Get refLigne
     *
     * @return String
     */
    public function getRef_Ligne(): ?string
    {
        return $this->ref_ligne;
    }
	 /**
     * Set refLigne
     *
     * @param string $refLigne
     * @return DataStif
     */
    public function setRef_Ligne(string $refLigne): self
    {
        $this->ref_ligne = $refLigne;
        return $this;
    } 
	 
	 /**
     * Get equipement
     *
     * @return String
     */
    public function getEquipement(): ?string
    {
        return $this->equipement;
    }
	 /**
     * Set refEquipement
     *
     * @param string $refEquipement
     * @return DataOlaf
     */
    public function setEquipement(string $equipement): self
    {
        $this->equipement = $equipement;
        return $this;
    }
	
	
	public function setIntegAtValue(LifecycleEventArgs $event): self
    {
        $this->date_integ = new DateTime();
        return $this;
    }
	
	public function getDate_Integ_Olaf(): DateTime
    {
        return $this->date_integ_olaf;
    }
	
    /**
     * Get env
     *
     * @return string
     */
    public function getEnv(): ?string
    {
        return $this->env;
    }
    
}

?>