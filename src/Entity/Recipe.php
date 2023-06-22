<?php

namespace App\Entity;

use App\Repository\RecipeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
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

    #[ORM\Column(length: 255)]
    private ?string $Picture = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $publishDate = null;

    #[ORM\Column]
    private ?int $cookingTime = null;

    #[ORM\Column]
    private ?int $preparationTime = null;

    #[ORM\ManyToOne(inversedBy: 'recipes')]
    private ?Category $Category = null;

    #[ORM\ManyToMany(targetEntity: Tag::class, inversedBy: 'recipes')]
    private Collection $Tags;

    #[ORM\OneToMany(mappedBy: 'recipe', targetEntity: Ingredient::class, orphanRemoval: true)]
    private Collection $ingredientsList;

    public function __construct()
    {
        $this->Tags = new ArrayCollection();
        $this->ingredientsList = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->Title;
    }

    public function setTitle(string $Title): static
    {
        $this->Title = $Title;

        return $this;
    }

    public function getSummary(): ?string
    {
        return $this->Summary;
    }

    public function setSummary(string $Summary): static
    {
        $this->Summary = $Summary;

        return $this;
    }

    public function getPicture(): ?string
    {
        return $this->Picture;
    }

    public function setPicture(string $Picture): static
    {
        $this->Picture = $Picture;

        return $this;
    }

    public function getPublishDate(): ?\DateTimeInterface
    {
        return $this->publishDate;
    }

    public function setPublishDate(\DateTimeInterface $publishDate): static
    {
        $this->publishDate = $publishDate;

        return $this;
    }

    public function getCookingTime(): ?int
    {
        return $this->cookingTime;
    }

    public function setCookingTime(int $cookingTime): static
    {
        $this->cookingTime = $cookingTime;

        return $this;
    }

    public function getPreparationTime(): ?int
    {
        return $this->preparationTime;
    }

    public function setPreparationTime(int $preparationTime): static
    {
        $this->preparationTime = $preparationTime;

        return $this;
    }

    public function getCategory(): ?Category
    {
        return $this->Category;
    }

    public function setCategory(?Category $Category): static
    {
        $this->Category = $Category;

        return $this;
    }

    /**
     * @return Collection<int, Tag>
     */
    public function getTags(): Collection
    {
        return $this->Tags;
    }

    public function addTag(Tag $tag): static
    {
        if (!$this->Tags->contains($tag)) {
            $this->Tags->add($tag);
        }

        return $this;
    }

    public function removeTag(Tag $tag): static
    {
        $this->Tags->removeElement($tag);

        return $this;
    }

    /**
     * @return Collection<int, Ingredient>
     */
    public function getIngredientsList(): Collection
    {
        return $this->ingredientsList;
    }

    public function addIngredientsList(Ingredient $ingredientsList): static
    {
        if (!$this->ingredientsList->contains($ingredientsList)) {
            $this->ingredientsList->add($ingredientsList);
            $ingredientsList->setRecipe($this);
        }

        return $this;
    }

    public function removeIngredientsList(Ingredient $ingredientsList): static
    {
        if ($this->ingredientsList->removeElement($ingredientsList)) {
            // set the owning side to null (unless already changed)
            if ($ingredientsList->getRecipe() === $this) {
                $ingredientsList->setRecipe(null);
            }
        }

        return $this;
    }
}
