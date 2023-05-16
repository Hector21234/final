<?php

namespace App\Entity;

use App\Repository\UsuarioRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UsuarioRepository::class)]
class Usuario
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(name:'nombre_usuario' ,length: 255)]
    private ?string $NombreUsuario = null;

    #[ORM\Column(name:'gmail' ,length: 255)]
    private ?string $Gmail = null;

    #[ORM\Column(name:'password' ,length: 255)]
    private ?string $password = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNombreUsuario(): ?string
    {
        return $this->NombreUsuario;
    }

    public function setNombreUsuario(string $NombreUsuario): self
    {
        $this->NombreUsuario = $NombreUsuario;

        return $this;
    }

    public function getGmail(): ?string
    {
        return $this->Gmail;
    }

    public function setGmail(string $Gmail): self
    {
        $this->Gmail = $Gmail;

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
}
