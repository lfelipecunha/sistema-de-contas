<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ContasRepository")
 */
class Contas
{
	
	const PARCELADA = 'parcelada';
	const UNICA = 'unica';
	const MEDICAO = 'medicao';
	
	const TIPOS_CONTA = [self::PARCELADA, self::UNICA, self::MEDICAO];
	
	const MASTER_ITAU = 'master_itau';
	const MASTER_NUBANK = 'master_nubank';
	const BOLETO = 'boleto';
	const DEBITO_CONTA = 'debito_conta';
	
	const MEIOS_PAGAMENTO = [self::MASTER_ITAU, self::MASTER_NUBANK, self::BOLETO, self::DEBITO_CONTA];
	const CARTOES_CREDITO = [self::MASTER_ITAU, self::MASTER_NUBANK];
	
	const RESPONSAVEL_LUIZ = 'Luiz';
	const RESPONSAVEL_LUIZ_CINTIA = 'Luiz e Cintia';
	const RESPONSAVEL_CINTIA = 'Cintia';
	const RESPONSAVEIS = [self::RESPONSAVEL_LUIZ, self::RESPONSAVEL_CINTIA, self::RESPONSAVEL_LUIZ_CINTIA];
	
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $tipo = [];

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $descricao;

    /**
     * @ORM\Column(type="float")
     */
    private $valor;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $responsavel = [];

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $meio_pagamento = [];

    /**
     * @ORM\Column(type="datetime")
     */
    private $data_compra;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $mes_fatura;

    /**
     * @ORM\Column(type="integer")
     */
    private $numero_parcelas;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $data_fim;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Lancamentos", mappedBy="conta_id", orphanRemoval=true, cascade={"persist"})
     */
    private $lancamentos;

    public function __construct()
    {
        $this->lancamentos = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTipo(): ?string
    {
        return $this->tipo;
    }

    public function setTipo($tipo): self
    {
        $this->tipo = $tipo;

        return $this;
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

    public function getValor(): ?float
    {
        return $this->valor;
    }

    public function setValor(float $valor): self
    {
        $this->valor = $valor;

        return $this;
    }

    public function getResponsavel(): ?string
    {
        return $this->responsavel;
    }

    public function setResponsavel($responsavel): self
    {
        $this->responsavel = $responsavel;

        return $this;
    }

    public function getMeioPagamento(): ?string
    {
        return $this->meio_pagamento;
    }

    public function setMeioPagamento($meio_pagamento): self
    {
        $this->meio_pagamento = $meio_pagamento;

        return $this;
    }

    public function getDataCompra(): ?\DateTimeInterface
    {
        return $this->data_compra;
    }

    public function setDataCompra(\DateTimeInterface $data_compra): self
    {
        $this->data_compra = $data_compra;

        return $this;
    }

    public function getMesFatura(): ?\DateTimeInterface
    {
        return $this->mes_fatura;
    }

    public function setMesFatura(?\DateTimeInterface $mes_fatura): self
    {
        $this->mes_fatura = $mes_fatura;

        return $this;
    }

    public function getNumeroParcelas(): ?int
    {
        return $this->numero_parcelas;
    }

    public function setNumeroParcelas(int $numero_parcelas): self
    {
        $this->numero_parcelas = $numero_parcelas;

        return $this;
    }

    public function getDataFim(): ?\DateTimeInterface
    {
        return $this->data_fim;
    }

    public function setDataFim(?\DateTimeInterface $data_fim): self
    {
        $this->data_fim = $data_fim;

        return $this;
    }

    /**
     * @return Collection|Lancamentos[]
     */
    public function getLancamentos(): Collection
    {
        return $this->lancamentos;
    }

    public function addLancamento(Lancamentos $lancamento): self
    {
        if (!$this->lancamentos->contains($lancamento)) {
            $this->lancamentos[] = $lancamento;
            $lancamento->setContaId($this);
        }

        return $this;
    }

    public function removeLancamento(Lancamentos $lancamento): self
    {
        if ($this->lancamentos->contains($lancamento)) {
            $this->lancamentos->removeElement($lancamento);
            // set the owning side to null (unless already changed)
            if ($lancamento->getContaId() === $this) {
                $lancamento->setContaId(null);
            }
        }

        return $this;
    }
	
	public function getValorParcela(int $parcela): float
	{
		$valor = $this->getValor();
		$parcelas = $this->getNumeroParcelas();
		$valorParcela = round($valor / $parcelas, 2);
		// se última parcela adiciona correção de valor quebrado (se houver)
		if ($parcela == $parcelas) {
			$valorParcela += $valor - ($valorParcela * $parcelas);
		}
		return $valorParcela;
	}
	
	public function toArray()
	{
		return [
			'id' => $this->getId(),
			'tipo' => $this->getTipo(),
			'descricao' => $this->getDescricao(),
			'valor' => $this->getValor(),
			'responsavel' => $this->getResponsavel(),
			'meio_pagamento' => $this->getMeioPagamento(),
			'data_compra' => $this->getDataCompra(),
			'mes_fatura' => $this->getMesFatura(),
			'numero_parcelas' => $this->getNumeroParcelas(),
			'data_fim' => $this->getDataFim(),
		];
	}
}
