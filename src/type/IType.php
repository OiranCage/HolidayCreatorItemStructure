<?php

namespace oirancage\HolidayCreatorItemStructure\type;

use oirancage\HolidayCreatorItemStructure\utils\Encodable;

interface IType extends Encodable{
	public function getName(): string;
}