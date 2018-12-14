<?php

namespace App\Validator;

interface ValidatorInterface
{
	public function __construct(array $data);
	public function isValid();
	public function getErrors();
	public function getValidData();
}