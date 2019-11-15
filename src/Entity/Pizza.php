<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PizzaRepository")
 */
class Pizza extends AllProduct
{


    /**
     * @ORM\Column(type="float")
     */
    private $highPrice;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $sauce;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $ingredient;

    /**
     * @ORM\Column(type="boolean")
     */
    private $other;



    public function getHighPrice(): ?float
    {
        return $this->highPrice;
    }

    public function setHighPrice(float $highPrice): self
    {
        $this->highPrice = $highPrice;

        return $this;
    }

    public function getSauce(): ?string
    {
        return $this->sauce;
    }

    public function setSauce(?string $sauce): self
    {
        $this->sauce = $sauce;

        return $this;
    }

    public function getIngredient(): ?string
    {
        return $this->ingredient;
    }

    public function setIngredient(string $ingredient): self
    {
        $this->ingredient = $ingredient;

        return $this;
    }

    public function getOther(): ?bool
    {
        return $this->other;
    }

    public function setOther(bool $other): self
    {
        $this->other = $other;

        return $this;
    }
}
