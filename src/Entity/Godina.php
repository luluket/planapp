<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

/**
 * @ORM\Entity(repositoryClass="App\Repository\GodinaRepository")
 */
class Godina
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $kalendarskaGodina;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\PlanNabave", mappedBy="godina")
     */
    private $planovi;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getKalendarskaGodina(): ?int
    {
        return $this->kalendarskaGodina;
    }

    public function setKalendarskaGodina(int $kalendarskaGodina): self
    {
        $this->kalendarskaGodina = $kalendarskaGodina;

        return $this;
    }

    /**
     * @return Collection|PlanNabave[]
     */
    public function getPlanovi(): Collection
    {
        return $this->planovi;
    }
}
