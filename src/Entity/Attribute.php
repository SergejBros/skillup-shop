<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\AttributeRepository")
 * @ORM\Table(name="attributes")
 */
class Attribute
{
    const TYPE_INT = 1;
    const TYPE_LIST = 2;

    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="integer")
     */
    private $type;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Category", mappedBy="attributes")
     */
    private $categories;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\AttrubuteValue", mappedBy="attribute")
     */
    private $attrubuteValues;

    public function __construct()
    {
        $this->type = self::TYPE_INT;
        $this->categories = new ArrayCollection();
        $this->attrubuteValues = new ArrayCollection();
    }

    public function __toString()
    {
        return $this->getName();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getType(): ?int
    {
        return $this->type;
    }

    public function setType(int $type): self
    {
        $this->type = $type;

        return $this;
    }

    /**
     * @return Collection|Category[]
     */
    public function getCategories(): Collection
    {
        return $this->categories;
    }

    public function addCategory(Category $category): self
    {
        if (!$this->categories->contains($category)) {
            $this->categories[] = $category;
            $category->addAttribute($this);
        }

        return $this;
    }

    public function removeCategory(Category $category): self
    {
        if ($this->categories->contains($category)) {
            $this->categories->removeElement($category);
            $category->removeAttribute($this);
        }

        return $this;
    }

    /**
     * @return Collection|AttrubuteValue[]
     */
    public function getAttrubuteValues(): Collection
    {
        return $this->attrubuteValues;
    }

    public function addAttrubuteValue(AttrubuteValue $attrubuteValue): self
    {
        if (!$this->attrubuteValues->contains($attrubuteValue)) {
            $this->attrubuteValues[] = $attrubuteValue;
            $attrubuteValue->setAttribute($this);
        }

        return $this;
    }

    public function removeAttrubuteValue(AttrubuteValue $attrubuteValue): self
    {
        if ($this->attrubuteValues->contains($attrubuteValue)) {
            $this->attrubuteValues->removeElement($attrubuteValue);
            // set the owning side to null (unless already changed)
            if ($attrubuteValue->getAttribute() === $this) {
                $attrubuteValue->setAttribute(null);
            }
        }

        return $this;
    }
}
