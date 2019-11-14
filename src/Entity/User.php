<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 * @UniqueEntity(
 * fields={"mail"},
 * message="L'email que vous avez indiqué est déja utilisé"
 *)
 */
 /*On indique qu'il faut un mail unique à chaque User*/

class User implements UserInterface
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank
     * @Assert\Length(min=2, max=55, minMessage="Veuillez rentrer un nom valide")
     */
    private $firstname;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank
     * @Assert\Length(min=2, max=60, minMessage="Veuillez rentrer un nom valide")
     */
    private $lastname;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Email()
     */
    private $mail;


    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Length(min="3", minMessage="Votre mot de passe doit faire minimum 3 caractères")
     * @Assert\EqualTo(propertyPath="confirm_password", message="Vous n'avez pas noté le même mot de passe")
     */
    private $password;


   /*
    * @Assert\EqualTo(propertyPath="password" message="Vous n'avez pas noté le même mot de passe")
    */
    private $confirm_password;


    /**
     * @ORM\Column(type="json_array", nullable=true)
     */
    private $roles;



    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(string $firstname): self
    {
        $this->firstname = $firstname;

        return $this;
    }

    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    public function setLastname(string $lastname): self
    {
        $this->lastname = $lastname;

        return $this;
    }

    public function getMail(): ?string
    {
        return $this->mail;
    }

    public function setMail(string $mail): self
    {
        $this->mail = $mail;

        return $this;
    }


    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getConfirmPassword(): ?string
    {
        return $this->confirm_password;
    }

    public function setConfirmPassword(string $confirm_password): self
    {
        $this->confirm_password = $confirm_password;

        return $this;
    }


    public function getRoles(): ?array
    {

      /*return $this->roles;*/

      $tmpRoles = $this->roles;

      if(in_array('ROLE_USER', $tmpRoles) === false){
        $tmpRoles[] = 'ROLE_USER';
      }

      return $tmpRoles;

    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }


/*Besoin de ces getter pour pouvoir encoder les mots de passes*/
    public function getUsername() {

    }

    public function eraseCredentials() {

    }

    public function getSalt() {

    }


}
