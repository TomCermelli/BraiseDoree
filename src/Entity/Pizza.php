<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PizzaRepository")
 * @Vich\Uploadable
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
}
