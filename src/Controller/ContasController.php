<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

use App\Service\Contas as ContasService;
use App\Entity\Contas;
use App\Validator\ValidatorInterface;

class ContasController extends AbstractController
{
	public function create(Request $request, ContasService $contasService)
	{
		$data = $request->request->all();
		
		$result = $contasService->create($data);
		if ($result instanceof Contas) {
			return $this->json(['id' => $result->getId()], 201);
		} else if ($result instanceof ValidatorInterface) {
			return $this->json($result->getErrors(), 400);
		} else {
			return $this->json(['error' => 'Ocorreu um erro inesperado!'], 500);
		}
		
		
	}
	
	public function list(ContasService $contasService)
	{
		$contas = $contasService->getList();
		return $this->json($contas);
	}
	
	public function getOne($id, ContasService $contasService)
	{
		$conta = $contasService->get($id);
		if (!$conta) {
			return $this->json('',404);
		}
		return $this->json($conta);
	}
}