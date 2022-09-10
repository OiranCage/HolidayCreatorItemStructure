<?php

namespace oirancage\HolidayCreatorItemStructure\type;

use pocketmine\nbt\tag\Tag;

interface IType{
	public function getName(): string;
	public function encode(): Tag;
}