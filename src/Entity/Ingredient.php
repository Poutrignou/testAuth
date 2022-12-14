<?php

namespace App\Entity;

use App\Repository\IngredientRepository;
use DateTime;
use DateTimeImmutable;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: IngredientRepository::class)]
class Ingredient
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;


    #[ORM\Column(length: 255)]
    #[assert\NotBlank()]
    #[Assert\Length(
        min: 2,
        max: 50,
        minMessage: 'Your first name must be at least {{ 2 }} characters long',
        maxMessage: 'Your first name cannot be longer than {{ 50 }} characters',
    )]

    private ?string $name = null;
    #[ORM\Column]
    #[assert\NotNull()]
    #[Assert\Positive]
    #[Assert\LessThan(200)]
    private ?float $price = null;

    #[ORM\Column]
    #[assert\NotNull()]
    private ?\DateTimeImmutable $createdAt = null;

/**
 * Constructor Function
 */

    public function __construct() 
    
    {
        $this->createdAt = new DateTimeImmutable();
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

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->createdAt; 
    }

    public function setCreatedAt(\DateTimeImmutable $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }
}
