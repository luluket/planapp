<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PlanNabaveRepository")
 */
class PlanNabave
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $evidencijskiBroj;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Cpv", inversedBy="planovi")
     */
    private $cpv;

    /**
     * @ORM\Column(type="decimal", precision=8, scale=2)
     */
    private $procijenjenaVrijednost;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $vrstaPostupka;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $posebniRezimNabave;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $podijeljenNaGrupe;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $sporazum;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $planiraniPocetak;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $planiranoTrajanje;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $napomena;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $status;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Godina", inversedBy="planovi")
     */
    private $godina;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="planovi")
     */
    private $user;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEvidencijskiBroj(): ?string
    {
        return $this->evidencijskiBroj;
    }

    public function setEvidencijskiBroj(string $evidencijskiBroj): self
    {
        $this->evidencijskiBroj = $evidencijskiBroj;

        return $this;
    }


    public function getCpv(): ?Cpv
    {
        return $this->cpv;
    }

    public function setCpv(Cpv $cpv): self
    {
        $this->cpv = $cpv;

        return $this;
    }

    public function getProcijenjenaVrijednost()
    {
        return $this->procijenjenaVrijednost;
    }

    public function setProcijenjenaVrijednost($procijenjenaVrijednost): self
    {
        $this->procijenjenaVrijednost = $procijenjenaVrijednost;

        return $this;
    }

    public function getVrstaPostupka(): ?string
    {
        return $this->vrstaPostupka;
    }

    public function setVrstaPostupka(string $vrstaPostupka): self
    {
        $this->vrstaPostupka = $vrstaPostupka;

        return $this;
    }

    public function getPosebniRezimNabave(): ?string
    {
        return $this->posebniRezimNabave;
    }

    public function setPosebniRezimNabave(string $posebniRezimNabave): self
    {
        $this->posebniRezimNabave = $posebniRezimNabave;

        return $this;
    }

    public function getPodijeljenNaGrupe(): ?string
    {
        return $this->podijeljenNaGrupe;
    }

    public function setPodijeljenNaGrupe(string $podijeljenNaGrupe): self
    {
        $this->podijeljenNaGrupe = $podijeljenNaGrupe;

        return $this;
    }

    public function getSporazum(): ?string
    {
        return $this->sporazum;
    }

    public function setSporazum(string $sporazum): self
    {
        $this->sporazum = $sporazum;

        return $this;
    }

    public function getPlaniraniPocetak(): ?string
    {
        return $this->planiraniPocetak;
    }

    public function setPlaniraniPocetak(string $planiraniPocetak): self
    {
        $this->planiraniPocetak = $planiraniPocetak;

        return $this;
    }

    public function getPlaniranoTrajanje(): ?string
    {
        return $this->planiranoTrajanje;
    }

    public function setPlaniranoTrajanje(string $planiranoTrajanje): self
    {
        $this->planiranoTrajanje = $planiranoTrajanje;

        return $this;
    }

    public function getNapomena(): ?string
    {
        return $this->napomena;
    }

    public function setNapomena(string $napomena): self
    {
        $this->napomena = $napomena;

        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(string $status): self
    {
        $this->status = $status;

        return $this;
    }

    public function getGodina(): ?Godina
    {
        return $this->godina;
    }

    public function setGodina(Godina $godina): self
    {
        $this->godina = $godina;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(User $user): self
    {
        $this->user = $user;

        return $this;
    }
}
