<?php

namespace App\Entity;

use App\Repository\IceRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: IceRepository::class)]
class Ice
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private int $id;

    #[ORM\Column(type: 'string', length: 255)]
    private string $name;

    #[ORM\Column(type: 'integer')]
    private int $proportion;

    #[ORM\Column(type: 'boolean')]
    private bool $vegan;

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getVegan(): bool
    {
        return $this->vegan;
    }

    public function setVegan(bool $vegan): self
    {
        $this->vegan = $vegan;

        return $this;
    }

    public function getProportion(): int
    {
        return $this->proportion;
    }

    public function setProportion(int $proportion): self
    {
        $this->proportion = $proportion;

        return $this;
    }
}
