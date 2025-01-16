<?php

namespace App\Entity;

use App\Repository\ChildrenRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ChildrenRepository::class)]
class Children
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $childname = null;

    #[ORM\Column(length: 255)]
    private ?string $childage = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getChildname(): ?string
    {
        return $this->childname;
    }

    public function setChildname(string $childname): static
    {
        $this->childname = $childname;

        return $this;
    }

    public function getChildage(): ?string
    {
        return $this->childage;
    }

    public function setChildage(string $childage): static
    {
        $this->childage = $childage;

        return $this;
    }
}
