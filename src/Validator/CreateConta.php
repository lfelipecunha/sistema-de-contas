<?php
namespace App\Validator;

use Symfony\Component\Validator\Validation;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Context\ExecutionContextInterface;

use App\Entity\Contas;

class CreateConta implements ValidatorInterface
{
	const DATE_REGEX = '/^((([02468][048]|[13579][26])00|\d\d([2468][048]|[13579][26]|0[48]))-02-29)|(\d{4,}-((0\d|1[0-2])-([0-1][0-9]|2[0-8])|(0[13456789]|1[0-2])-(29|30)|(0[13578]|1[02])-31))$/';

	private $data;
	
	private $errors = [];
	
	private $isValid = false;
	
	public function __construct(array $data)
	{
		$defaultData = ['mes_fatura' => null];
		$this->data = array_merge($defaultData, $data);
	}
	
	public function isValid(): bool
	{
		$validator = Validation::createValidator();
		
		$constrains = new Assert\Collection([
			'descricao' => new Assert\NotBlank(),
			'tipo' => new Assert\Choice(Contas::TIPOS_CONTA),
			'valor' => [
				new Assert\NotBlank,
				new Assert\GreaterThanOrEqual(0.01)
			],
			'responsavel' => new Assert\Choice(Contas::RESPONSAVEIS),
			'meio_pagamento' => new Assert\Choice(Contas::MEIOS_PAGAMENTO),
			'data_compra' => new Assert\Date(),
			'numero_parcelas' => new Assert\GreaterThanOrEqual(1),
			'mes_fatura' => new Assert\Callback([$this, 'validateMesfatura'])
		]);
		
		$violations = $validator->validate($this->data, $constrains);
		$result = true;
		
		if (count($violations)>0) {
			$result = false;
			foreach ($violations as $key => $violation) {
				$this->errors[str_replace(['[',']'], '', $violation->getPropertyPath())] = $violation->getMessage();
			}
		}
		
		$this->isValid = $result;
		
		return $result;
	}
	
	public function validateMesfatura($object, ExecutionContextInterface $context, $payload)
	{
		$value = $context->getValue();
		$root = $context->getRoot();
		if (in_array($root['meio_pagamento'], Contas::CARTOES_CREDITO)) {
			$assert = new Assert\Date();
			
			$validator = $assert->validatedBy();
			$validator = new $validator;
			$validator->initialize($context);
			$validator->validate($value, $assert);
		} else {
			// remove qualquer dado passado pois nada deve ser persistido
			$this->data['mes_fatura'] = null;
		}
	}
	
	public function getErrors(): array
	{
		return $this->errors;
	}

	public function getValidData()
	{
		return $this->data;
	}
}