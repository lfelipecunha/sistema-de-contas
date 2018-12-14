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
			return $this->json(['id' => $result->getId()]);
		} else if ($result instanceof ValidatorInterface) {
			return $this->json($result->getErrors(), 400);
		} else {
			return $this->json(['error' => 'Ocorreu um erro inesperado!'], 500);
		}
		
		
	}
	
	private function basicValidationCreate(Request $request)
	{
		$request->request->get('mes_compra');
		
	}
	
	public function list()
	{
		return $this->json([]);
	}
	
	public function get($id)
	{
		return $this->json(['id' => $id]);
	}
}