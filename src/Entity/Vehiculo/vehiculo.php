<?php

namespace App\Entity\Vehiculo;

use App\Repository\Vehiculo\vehiculoRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: vehiculoRepository::class)]
class vehiculo
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
