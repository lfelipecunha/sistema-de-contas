<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\LancamentosRepository")
 */
class Lancamentos
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Contas", inversedBy="lancamentos")
     * @ORM\JoinColumn(nullable=false)
     */
    private $conta_id;

    /**
     * @ORM\Column(type="datetime")
     */
    private $data_lancamento;

    /**
     * @ORM\Column(type="integer")
     */
    private $parcela;

    /**
     * @ORM\Column(type="float")
     */
    private $valor;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getContaId(): ?Contas
    {
        return $this->conta_id;
    }

    public function setContaId(?Contas $conta_id): self
    {
        $this->conta_id = $conta_id;

        return $this;
    }

    public function getDataLancamento(): ?\DateTimeInterface
    {
        return $this->data_lancamento;
    }

    public function setDataLancamento(\DateTimeInterface $data_lancamento): self
    {
        $this->data_lancamento = $data_lancamento;

        return $this;
    }

    public function getParcela(): ?int
    {
        return $this->parcela;
    }

    public function setParcela(int $parcela): self
    {
        $this->parcela = $parcela;

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
}
