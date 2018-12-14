<?php

namespace App\Service;

use App\Validator\CreateConta;
use App\Entity;

use Doctrine\ORM\EntityManagerInterface;

class Contas
{

	private $entityManager;
	
	public function __construct(EntityManagerInterface $entityManager) 
	{
		$this->entityManager = $entityManager;
	}
	public function create(array $data)
	{
		$validator = new CreateConta($data);
		if ($validator->isValid()) {
			$data = $validator->getValidData();
			$mesFatura = isset($data['mes_fatura']) ? $data['mes_fatura'] : null;
			if ($mesFatura) {
				$mesFatura = new \DateTime($mesFatura);
			}
			
			$dataCompra = new \DateTime($data['data_compra']);
			$conta = new Entity\Contas();
			$conta->setDescricao($data['descricao'])
				->setTipo($data['tipo'])
				->setResponsavel($data['responsavel'])
				->setValor($data['valor'])
				->setMeioPagamento($data['meio_pagamento'])
				->setMesFatura($mesFatura)
				->setDataCompra($dataCompra)
				->setNumeroParcelas($data['tipo']== $conta::PARCELADA ? $data['numero_parcelas'] : 1);
				
			if ($conta->getTipo() != Entity\Contas::MEDICAO) {
				$dataLancamento = clone (in_array($conta->getMeioPagamento(), $conta::CARTOES_CREDITO) ? $mesFatura : $dataCompra);
				for ($i=1; $i<=$conta->getNumeroParcelas(); $i++) {
					
					$lancamento = new Entity\Lancamentos();
					$lancamento->setDataLancamento($dataLancamento)
						->setParcela($i)
						->setValor($conta->getValorParcela($i));
					$conta->addLancamento($lancamento);
					
					// repontera para não modificar o objeto ainda não persistido
					$dataLancamento = clone $dataLancamento;
					
					$dataLancamento->modify("+1month");
				}
			}
			
			$this->entityManager->persist($conta);
			$this->entityManager->flush();
			
			return $conta;
		}
		
		return $validator;
	}
	
	public function getList()
	{
		$contas = $this->entityManager->getRepository(Entity\Contas::class)->findAll();
		$contasArray = [];
		foreach ($contas as $conta) {
			$contasArray[] = $conta->toArray();
		}
		return $contasArray;
	}
	
	public function get($id)
	{
		$conta = $this->entityManager->getRepository(Entity\Contas::class)->find($id);
		return $conta ? $conta->toArray() : null;
	}
}