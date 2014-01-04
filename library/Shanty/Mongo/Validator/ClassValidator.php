<?php

namespace Shanty\Mongo\Validator;

use Zend\Validator\AbstractValidator;

class ClassValidator extends AbstractValidator
{
        const CLASS_NOT_VALID = 'classNotValid';

	/**
         * @var array
         */
	protected $_messageTemplates = array(
		self::CLASS_NOT_VALID => "'%value%' is not a %class%"
	);

        /**
         * @var array
         */
        protected $_messageVariables = array(
                'class' => '_class'
        );

	protected $_class = null;

	public function __construct($class)
	{
		$this->setClass($class);
	}

	public function setClass($class)
	{
		$this->_class = $class;
	}

	public function getClass()
	{
		return $this->_class;
	}

	public function isValid($value)
	{
		$this->_setValue($value);
		$class = $this->getClass();

		if (!($value instanceof $class)) {
			$this->_error(self::CLASS_NOT_VALID);
			return false;
		}

		return true;
	}
}
