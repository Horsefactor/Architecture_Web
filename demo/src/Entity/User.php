<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\Collection;
use ApiPlatform\Core\Annotation\ApiResource;
use ApiPlatform\Core\Annotation\ApiSubresource;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 * @UniqueEntity(
 * fields= {"email"},
 * message= "This email addres is already-used"
 * )
 * @ApiResource()
 */
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
     * @Groups({"annonces"})
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"annonces"})
     */
    private $surname;

    /**
     * @ORM\Column(type="smallint")
     * @Groups({"annonces"})
     */
    private $age;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Email()
     * @Groups({"annonces"})
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"annonces"})
     */
    private $phoneNumber;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Annonce", mappedBy="user", orphanRemoval=true)
     * @ApiSubresource
     */
    private $Annonces;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $address;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Length(min=6, minMessage = "Your password should have at least 6 characters")
     */
    private $password;

    public $confirm_password;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"annonces"})
     */
    private $type;
    
    public function __construct()
    {
        $this->Annonces = new ArrayCollection();
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

    public function getSurname(): ?string
    {
        return $this->surname;
    }

    public function setSurname(string $surname): self
    {
        $this->surname = $surname;

        return $this;
    }

    public function getAge(): ?int
    {
        return $this->age;
    }

    public function setAge(int $age): self
    {
        $this->age = $age;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getPhoneNumber(): ?string
    {
        return $this->phoneNumber;
    }

    public function setPhoneNumber(string $phoneNumber): self
    {
        $this->phoneNumber = $phoneNumber;

        return $this;
    }

    /**
     * @return Collection|Annonce[]
     */
    public function getAnnonces(): Collection
    {
        return $this->Annonces;
    }

    public function addAnnonce(Annonce $Annonce): self
    {
        if (!$this->Annonces->contains($Annonce)) {
            $this->Annonces[] = $Annonce;
            $Annonce->setUser($this);
        }

        return $this;
    }

    public function removeAnnonce(Annonce $Annonce): self
    {
        if ($this->Annonces->contains($Annonce)) {
            $this->Annonces->removeElement($Annonce);
            // set the owning side to null (unless already changed)
            if ($Annonce->getUser() === $this) {
                $Annonce->setUser(null);
            }
        }

        return $this;
    }

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(?string $address): self
    {
        $this->address = $address;

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
    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUsername(): string
    {
        return (string) $this->email;
    }

    public function eraseCredentials(){}

    public function getSalt(){}

    public function getRoles(){
        return ['ROLE_USER'];
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }
}
