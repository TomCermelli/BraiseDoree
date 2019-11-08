<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TestRepository")
 */
class Test
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $salut;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSalut(): ?string
    {
        return $this->salut;
    }

    public function setSalut(string $salut): self
    {
        $this->salut = $salut;

        return $this;
    }
}
