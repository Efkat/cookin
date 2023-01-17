<?php

namespace App\Entity;

use App\Repository\RecipeRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RecipeRepository::class)]
class Recipe
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $Title = null;

    #[ORM\Column(length: 255)]
    private ?string $Summary = null;

    #[ORM\Column]
    private ?int $CookingTime = null;

    #[ORM\Column]
    private ?int $PreparationTime = null;

    #[ORM\Column]
    private array $Steps = [];

    #[ORM\Column]
    private array $Ingredients = [];

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->Title;
    }

    public function setTitle(string $Title): self
    {
        $this->Title = $Title;

        return $this;
    }

    public function getSummary(): ?string
    {
        return $this->Summary;
    }

    public function setSummary(string $Summary): self
    {
        $this->Summary = $Summary;

        return $this;
    }

    public function getCookingTime(): ?int
    {
        return $this->CookingTime;
    }

    public function setCookingTime(int $CookingTime): self
    {
        $this->CookingTime = $CookingTime;

        return $this;
    }

    public function getPreparationTime(): ?int
    {
        return $this->PreparationTime;
    }

    public function setPreparationTime(int $PreparationTime): self
    {
        $this->PreparationTime = $PreparationTime;

        return $this;
    }

    public function getSteps(): array
    {
        return $this->Steps;
    }

    public function setSteps(array $Steps): self
    {
        $this->Steps = $Steps;

        return $this;
    }

    public function getIngredients(): array
    {
        return $this->Ingredients;
    }

    public function setIngredients(array $Ingredients): self
    {
        $this->Ingredients = $Ingredients;

        return $this;
    }
}
