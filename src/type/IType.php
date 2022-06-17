<?php

namespace oirancage\HolidayCreatorItemLoader\type;

use pocketmine\nbt\tag\Tag;

interface IType{
	public function getName(): string;
	public function encode(): Tag;
}