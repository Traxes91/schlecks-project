<?php

namespace App\Entity;

use App\Repository\SchlecksRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SchlecksRepository::class)]
class Schlecks
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private int $id;

    #[ORM\ManyToOne(targetEntity: Chocolate::class)]
    private ?Chocolate $chocolate = null;

    #[ORM\ManyToOne(targetEntity: Size::class)]
    #[ORM\JoinColumn(nullable: false)]
    private Size $size;

    #[ORM\ManyToOne(targetEntity: Sprinkles::class)]
    private Sprinkles $sprinkles;

    #[ORM\ManyToMany(targetEntity: Ingredient::class)]
    private ArrayCollection $ingredients;

    #[ORM\ManyToMany(targetEntity: Ice::class)]
    private ArrayCollection $ice;

    public function __construct()
    {
        $this->ingredients = new ArrayCollection();
        $this->ice         = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getChocolate(): ?Chocolate
    {
        return $this->chocolate;
    }

    public function setChocolate(?Chocolate $chocolate): self
    {
        $this->chocolate = $chocolate;

        return $this;
    }

    public function getSize(): ?Size
    {
        return $this->size;
    }

    public function setSize(?Size $size): self
    {
        $this->size = $size;

        return $this;
    }

    public function getSprinkles(): ?Sprinkles
    {
        return $this->sprinkles;
    }

    public function setSprinkles(?Sprinkles $sprinkles): self
    {
        $this->sprinkles = $sprinkles;

        return $this;
    }

    /**
     * @return Collection<int, Ingredient>
     */
    public function getIngredients(): Collection
    {
        return $this->ingredients;
    }

    public function addIngredient(Ingredient $ingredient): self
    {
        if (!$this->ingredients->contains($ingredient)) {
            $this->ingredients[] = $ingredient;
        }

        return $this;
    }

    public function removeIngredient(Ingredient $ingredient): self
    {
        $this->ingredients->removeElement($ingredient);

        return $this;
    }

    /**
     * @return Collection<int, Ice>
     */
    public function getIce(): Collection
    {
        return $this->ice;
    }

    public function addIce(Ice $ice): self
    {
        if (!$this->ice->contains($ice)) {
            $this->ice[] = $ice;
        }

        return $this;
    }

    public function removeIce(Ice $ice): self
    {
        $this->ice->removeElement($ice);

        return $this;
    }
}
