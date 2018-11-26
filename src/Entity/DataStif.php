<?php

namespace App\Entity;

use DateTime;
use App\Helper\SlugifyHelper;
use Doctrine\Common\Persistence\Event\LifecycleEventArgs;
 
class DataStif
{
	private $id;
    private $prestataire; 		//
    private $code_tarif;		//
	private $num_profil;		//
	private $num_anonyme;		//
	private $date_debut_val;	//
	private $date_fin_val;		//
	private $zones;				//
	private $horodatage;		//
	private $nature_transact;	//
	private $code_station_event;//
	private $num_borne;
	private $transporteur;
	private $sens;
	private $mode_valid;
	private $sequence_ctu;
	private $ident_equip;
	private $ident_vehicule;	//
	private $ref_ligne;			//
	private $ref_mission;		//
	private $env;
	private $date_integ;
			
    /**
     * Get prestataire
     *
     * @return String
     */
    public function getPrestataire(): ?string
    {
        return $this->prestataire;
    }
	 /**
     * Set prestataire
     *
     * @param string $prestataire
     * @return DataStif
     */
    public function setPrestataire(string $prestataire): self
    {
        $this->prestataire = $prestataire;
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
     * @return DataStif
     */
    public function setNum_Profil(string $num_profil): self
    {
        $this->num_profil = $num_profil;
        return $this;
    }
	/**
     * Get date_debut_val
     *
     * @return datetime
     */
    public function getDate_Debut_Val(): ?datetime
    {
        return $this->date_debut_val;
    }
	/**
     * Get date_fin_val
     *
     * @return Datetime
     */
    public function getDate_Fin_Val(): ?datetime
    {
        return $this->date_fin_val;
    }
	/**
     * Get zones
     *
     * @return String
     */
    public function getZones(): ?string
    {
        return $this->zones;
    }
	
	/**
     * Get numPass
     *
     * @return String
     */
    public function getNum_Anonyme(): ?string
    {
        return $this->num_anonyme;
    }
	 /**
     * Set num_Anonyme
     *
     * @param string $numAnonyme
     * @return DataStif
     */
    public function setNum_Anonyme(string $numPass): self
    {
        $this->num_Anonyme = $numPass;
        return $this;
	}
	public function getHorodatage(): DateTime
    {
        return $this->horodatage;
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
	public function getCode_Station_Event(): ?string
    {
        return $this->code_station_event;
    }
	public function getNum_Borne(): ?string
    {
        return $this->num_borne;
    }
	public function getTransporteur(): ?string
    {
        return $this->transporteur;
    }
	public function getSens(): ?string
    {
        return $this->sens;
    }
	public function getMode_Valid(): ?string
    {
        return $this->mode_valid;
    }
	public function getSequence_Ctu(): ?string
    {
        return $this->sequence_ctu;
    }
	public function getIdent_Equip(): ?string
    {
        return $this->ident_equip;
    }
		
	/**
     * Get identVehicule
     *
     * @return String
     */
    public function getIdent_Vehicule(): ?string
    {
        return $this->ident_vehicule;
    }
	 /**
     * Set identVehicule
     *
     * @param string $identVehicule
     * @return DataStif
     */
    public function setIdent_Vehicule(string $identVehicule): self
    {
        $this->ident_vehicule = $identVehicule;
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
     * Get refMission
     *
     * @return String
     */
    public function getRef_Mission(): ?string
    {
        return $this->ref_mission;
    }
	 /**
     * Set refMission
     *
     * @param string $refMission
     * @return DataStif
     */
    public function setrRef_Mission(string $refMission): self
    {
        $this->ref_mission = $refMission;
        return $this;
    }
	
	
	public function setIntegAtValue(LifecycleEventArgs $event): self
    {
        $this->date_integ = new DateTime();
        return $this;
    }
	
	public function getDate_Integ(): DateTime
    {
        return $this->date_integ;
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
    /**
     * Set env
     *
     * @param string $env
     * @return DataStif
     */
    public function setEnv(string $env): self
    {
        $this->env = $env;
        return $this;
    }
}

?>