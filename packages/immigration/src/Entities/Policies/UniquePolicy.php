<?php

namespace Thunderlabid\Immigration\Entities\Policies;

use \Thunderlabid\Immigration\Entities\Policies\Interfaces\IPolicy;
use Exception;
use Validator;

class UniquePolicy implements IPolicy { 

	/**
	 * [__construct description]
	 * @param [string] 	$attribute  attribute name
	 * @param [mixed] 	$value      value to be applied using this policy
	 * @param array  $parameters 	parameter[0]=repository, parameter[1]=except_id
	 */
	public function __construct($attribute, $value, $parameters = [])
	{
		if (!is_string($attribute))
		{
			throw new InvalidArgumentException(json_encode('Parameter 1 must be string'));
		}

		$this->attribute		= $attribute;
		$this->value			= $value;
		$this->repository_class	= $parameters[0];
		$this->repository_specification_class	= $parameters[1];
		$this->except_id		= $parameters[2];
	}

	/**
	 * Apply
	 * @return  [Exception]
	 */
	public function apply()
	{
		///////////////////////////
		// Get data by attribute //
		///////////////////////////
		$this->repo = new $this->repository_class();
		$specification = new $this->repository_specification_class($this->repo->getModel(), $this->value);
		$datas = $this->repo->query([$specification]);

		/////////////////////////////////////
		// Compare ID if there's except id //
		/////////////////////////////////////
		$attribute = $this->attribute;
		if (count($datas))
		{
			foreach ($datas as $data)
			{
				if ($data->$attribute == $this->value)
				{
					if( !$this->except_id )
					{
						throw new Exception($attribute . ' ' . $this->value . ' already exists');
					}
					else
					{
						if ($this->except_id != $data->id)
						{
							throw new Exception($attribute . ' ' . $this->value . ' already exists');
						}
					}
				}
			}
		}
	}
}
