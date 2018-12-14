<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ProjecoesRepository")
 */
class Projecoes
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $descricao;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $tipo;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $tipo_dias;

    /**
     * @ORM\Column(type="float")
     */
    private $valor;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $tipo_quantidade_dias;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $quantidade_dias;

    /**
     * @ORM\Column(type="array", nullable=true)
     */
    private $dias_da_semana = [];

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $forma_calculo;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $quantidade_tarifa;

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

    public function getDescricao(): ?string
    {
        return $this->descricao;
    }

    public function setDescricao(string $descricao): self
    {
        $this->descricao = $descricao;

        return $this;
    }

    public function getTipo(): ?string
    {
        return $this->tipo;
    }

    public function setTipo(string $tipo): self
    {
        $this->tipo = $tipo;

        return $this;
    }

    public function getTipoDias(): ?string
    {
        return $this->tipo_dias;
    }

    public function setTipoDias(?string $tipo_dias): self
    {
        $this->tipo_dias = $tipo_dias;

        return $this;
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

    public function getTipoQuantidadeDias(): ?string
    {
        return $this->tipo_quantidade_dias;
    }

    public function setTipoQuantidadeDias(?string $tipo_quantidade_dias): self
    {
        $this->tipo_quantidade_dias = $tipo_quantidade_dias;

        return $this;
    }

    public function getQuantidadeDias(): ?int
    {
        return $this->quantidade_dias;
    }

    public function setQuantidadeDias(?int $quantidade_dias): self
    {
        $this->quantidade_dias = $quantidade_dias;

        return $this;
    }

    public function getDiasDaSemana(): ?array
    {
        return $this->dias_da_semana;
    }

    public function setDiasDaSemana(?array $dias_da_semana): self
    {
        $this->dias_da_semana = $dias_da_semana;

        return $this;
    }

    public function getFormaCalculo(): ?string
    {
        return $this->forma_calculo;
    }

    public function setFormaCalculo(?string $forma_calculo): self
    {
        $this->forma_calculo = $forma_calculo;

        return $this;
    }

    public function getQuantidadeTarifa(): ?int
    {
        return $this->quantidade_tarifa;
    }

    public function setQuantidadeTarifa(?int $quantidade_tarifa): self
    {
        $this->quantidade_tarifa = $quantidade_tarifa;

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
