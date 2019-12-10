<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * @ORM\Entity(repositoryClass="App\Repository\FormulaRepository")
 * @Vich\Uploadable
 */
class Formula extends AllProduct
{


    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $image2;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $image3;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $produit;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $dessert;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $drink;

    /**
      *
      * @Vich\UploadableField(mapping="product_image", fileNameProperty="image2")
      *
      * @var File
      */
    private $imageFile2;

    /**
      *
      * @Vich\UploadableField(mapping="product_image", fileNameProperty="image3")
      *
      * @var File
      */
    private $imageFile3;


    /**
      * @param null|File
      *
      */
    public function getImageFile2(): ?File
  {
      return $this->imageFile2;
  }

  /**
    * @param null|File $imageFile2
    * @return Formula
    */
    public function setImageFile2(?File $imageFile2): Formula
    {
      $this->imageFile2 = $imageFile2;

      if ($this->imageFile2 instanceof UploadedFile) {
            $this->updatedAt = new \DateTime('now');
          }
      return $this;

    }

    /**
      * @param null|File
      *
      */
    public function getImageFile3(): ?File
  {
      return $this->imageFile3;
  }

  /**
    * @param null|File $imageFile3
    * @return Formula
    */
    public function setImageFile3(?File $imageFile3): Formula
    {
      $this->imageFile3 = $imageFile3;

      if ($this->imageFile3 instanceof UploadedFile) {
            $this->updatedAt = new \DateTime('now');
          }
      return $this;

    }

    public function getImage2(): ?string
    {
        return $this->image2;
    }

    public function setImage2(?string $image2): self
    {
        $this->image2 = $image2;

        return $this;
    }

    public function getImage3(): ?string
    {
        return $this->image3;
    }

    public function setImage3(?string $image3): self
    {
        $this->image3 = $image3;

        return $this;
    }

    public function getProduit(): ?string
    {
        return $this->produit;
    }

    public function setProduit(?string $produit): self
    {
        $this->produit = $produit;

        return $this;
    }

    public function getDessert(): ?string
    {
        return $this->dessert;
    }

    public function setDessert(?string $dessert): self
    {
        $this->dessert = $dessert;

        return $this;
    }

    public function getDrink(): ?string
    {
        return $this->drink;
    }

    public function setDrink(?string $drink): self
    {
        $this->drink = $drink;

        return $this;
    }
}
