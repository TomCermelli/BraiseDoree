<?php
namespace App\Entity;

use Symfony\Component\Validator\Constraints as Assert;

class Contact {


  /**
   *@var string|null
   *@Assert\NotBlank()
   *@Assert\Length(min=2, max=100)
   */
  private $firstname;

  /**
   *@var string|null
   *@Assert\NotBlank()
   *@Assert\Length(min=2, max=100)
   */
  private $lastname;

  /**
   *@var string|null
   *@Assert\NotBlank()
   *@Assert\Email()
   */
  private $email;

  /**
   *@var string|null
   *@Assert\NotBlank()
   *@Assert\Length(min=2)
   */
  private $subject;

  /**
   *@var string|null
   *@Assert\NotBlank()
   *@Assert\Length(min=8, max=700)
   */
  private $message;



  /**
    *@return null|string
    */
  public function getFirstname(): ?string
    {
      return $this->firstname;
    }

  /**
   *@param null|string $firstname
   *@return Contact
   */
  public function setFirstname(?string $firstname): Contact
  {
    $this->firstname = $firstname;
    return $this;
  }

  /**
    *@return null|string
    */
  public function getLastname(): ?string
    {
      return $this->lastname;
    }

  /**
   *@param null|string $lastname
   *@return Contact
   */
  public function setLastname(?string $lastname): Contact
  {
    $this->lastname = $lastname;
    return $this;
  }


/**
  *@return null|string
  */
public function getEmail(): ?string
  {
    return $this->email;
  }

/**
 *@param null|string $email
 *@return Contact
 */
public function setEmail(?string $email): Contact
{
  $this->email = $email;
  return $this;
}

/**
  *@return null|string
  */
public function getSubject(): ?string
  {
    return $this->subject;
  }

/**
 *@param null|string $subject
 *@return Contact
 */
public function setSubject(?string $subject): Contact
{
  $this->subject = $subject;
  return $this;
}


/**
 *@return null|string
 */
public function getMessage(): ?string
{
  return $this->message;
}

/**
 *@param null|string $message
 *@return Contact
 */
public function setMessage(?string $message): Contact
{
  $this->message = $message;
  return $this;
}






}
