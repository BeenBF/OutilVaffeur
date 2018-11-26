<?php //src/Entity/Environnement.php

namespace App\Entity;
 
class Environnement
{
   
	private $id;
    private $nomCourt; 
    private $nomDNS;
	private $typeEnv;
	private $nomLong;
		
	 /**
     * Get ID
     *
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }
    /**
     * Get nomCourt
     *
     * @return String
     */
    public function getNomCourt(): ?string
    {
        return $this->nomCourt;
    }
	 /**
     * Set nomCourt
     *
     * @param string $nomCourt
     * @return Environnement
     */
    public function setNomCourt(string $nomCourt): self
    {
        $this->nomCourt = $nomCourt;
        return $this;
    }
    /**
     * Get nomDNS
     *
     * @return string
     */
    public function getNomDNS(): ?string
    {
        return $this->nomDNS;
    }
    /**
     * Set nomDNS
     *
     * @param string $nomDNS
     * @return Environnement
     */
    public function setNomDNS(string $nomDNS): self
    {
        $this->nomDNS = $nomDNS;
        return $this;
    }
	
	/**
     * Get typeEnv
     *
     * @return String
     */
    public function getTypeEnv(): ?string
    {
        return $this->typeEnv;
    }
	 /**
     * Set typeEnv
     *
     * @param string $typeEnv
     * @return Environnement
     */
    public function setTypeEnv(string $typeEnv): self
    {
        $this->typeEnv = $typeEnv;
        return $this;
    }
	/**
     * Get nomLong
     *
     * @return String
     */
    public function getNomLong(): ?string
    {
        return $this->nomLong;
    }
	 /**
     * Set nomLong
     *
     * @param string $nomLong
     * @return Environnement
     */
    public function setNomLong(string $nomLong): self
    {
        $this->nomLong = $nomLong;
        return $this;
    }
	
}

?>