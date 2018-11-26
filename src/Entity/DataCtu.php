<?php

namespace App\Entity;

use DateTime;
use App\Helper\SlugifyHelper;
use Doctrine\Common\Persistence\Event\LifecycleEventArgs;
 
class DataCtu
{
	private $id;
	private $type_valid;		//
    private $code_tarif;		//
	private $num_pass;			//
	private $num_contrat;		//
	private $horodatage;		//
	private $nature_transact;	//
	private $sequence_ctu;		//
	private $ref_transporteur;	//
	private $ref_reseau;		//
	private $ref_ligne;			//
	private $env;
	private $date_integ;
			
  
    public function getType_Valid(): ?string
    {
        return $this->type_valid;
    }
    public function getCode_Tarif(): ?string
    {
        return $this->code_tarif;
    }
	
    public function getNum_Pass(): ?string
    {
        return $this->num_pass;
    }
	public function getNum_Contrat(): ?string
    {
        return $this->num_contrat;
    }
	public function getHorodatage(): DateTime
    {
        return $this->horodatage;
    }
	public function getNature_Transact(): ?string
    {
        return $this->nature_transact;
    }
	
	public function getRef_Transporteur(): ?string
    {
        return $this->ref_transporteur;
    }
	public function getRef_Reseau(): ?string
    {
        return $this->ref_reseau;
    }
	public function getSequence_Ctu(): ?string
    {
        return $this->sequence_ctu;
    }
    public function getRef_Ligne(): ?string
    {
        return $this->ref_ligne;
    }
	public function getDate_Integ(): DateTime
    {
        return $this->date_integ;
    }
	public function getEnv(): ?string
    {
        return $this->env;
    }
}

?>