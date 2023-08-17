<?php

namespace App\Entity\Vehiculo;

use App\Repository\Vehiculo\registroRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: registroRepository::class)]
class registro
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    public function getId(): ?int
    {
        return $this->id;
    }
}
