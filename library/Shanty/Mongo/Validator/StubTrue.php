<?php

namespace Shanty\Mongo\Validator;

use Zend\Validator\AbstractValidator;

class StubTrue extends AbstractValidator
{
	public function isValid($value)
	{
		return true;
	}
}
