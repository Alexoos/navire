<?php

namespace App\Entity;

use App\Repository\PaysRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Table (name :'pays') ]
#[Assert\Unique(fields: ['indicatif'])]
#[ORM\Index(name:'ind_indicatif', columns: ['indicatif'])]
#[ORM\Entity(repositoryClass: PaysRepository::class)]
class Pays
{       
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(name:'nom', length: 70)]
    private ?string $nom = null;

    #[ORM\Column(name:'indicatif', length: 3)]
    #[ORM\Regex(pattern:"/[A-Z]{3}/", message: "L'indicatif Pays a strictement 3 caracrtères")]
    private ?string $indicatif = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getIndicatif(): ?string
    {
        return $this->indicatif;
    }

    public function setIndicatif(string $indicatif): self
    {
        $this->indicatif = $indicatif;

        return $this;
    }
}
