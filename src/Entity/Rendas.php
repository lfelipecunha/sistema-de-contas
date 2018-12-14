<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\RendasRepository")
 */
class Rendas
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="float")
     */
    private $valor;

    /**
     * @ORM\Column(type="datetime")
     */
    private $mes_inicio;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $mes_fim;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getValor(): ?float
    {
        return $this->valor;
    }

    public function setValor(float $valor): self
    {
        $this->valor = $valor;

        return $this;
    }

    public function getMesInicio(): ?\DateTimeInterface
    {
        return $this->mes_inicio;
    }

    public function setMesInicio(\DateTimeInterface $mes_inicio): self
    {
        $this->mes_inicio = $mes_inicio;

        return $this;
    }

    public function getMesFim(): ?\DateTimeInterface
    {
        return $this->mes_fim;
    }

    public function setMesFim(?\DateTimeInterface $mes_fim): self
    {
        $this->mes_fim = $mes_fim;

        return $this;
    }
}
