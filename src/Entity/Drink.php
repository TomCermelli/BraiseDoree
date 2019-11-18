<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\DrinkRepository")
 */
class Drink extends AllProduct
{


    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $centiliter;


    public function getCentiliter(): ?string
    {
        return $this->centiliter;
    }

    public function setCentiliter(?string $centiliter): self
    {
        $this->centiliter = $centiliter;

        return $this;
    }
}
