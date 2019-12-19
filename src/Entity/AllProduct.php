<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Vich\UploaderBundle\Mapping\Annotation as Vich;



 /*
  * AllProduct
  * @Vich\Uploadable
  */
abstract class AllProduct
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    protected $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    protected $name;

    /**
     * @ORM\Column(type="float")
     */
    protected $price;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    protected $image;

    /**
      *
      * @Vich\UploadableField(mapping="product_image", fileNameProperty="image")
      *
      * @var File
      */
    protected $imageFile;


    /**
     * @ORM\Column(type="datetime", nullable=true)
     *
     * @var \DateTime
     */
    protected $updatedAt;



    /**
      * @param null|File
      *
      */
    public function getImageFile(): ?File
  {
      return $this->imageFile;
  }

  /**
    * @param null|File $imageFile
    * @return AllProduct
    */
    public function setImageFile(?File $imageFile): AllProduct
    {
      $this->imageFile = $imageFile;

      if ($this->imageFile instanceof UploadedFile) {
            $this->updatedAt = new \DateTime('now');
          }
      return $this;

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

    public function getPrice(): ?float
    {
        return $this->price;
    }

    public function setPrice(float $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(?string $image): self
    {
        $this->image = $image;

        return $this;
    }
}
