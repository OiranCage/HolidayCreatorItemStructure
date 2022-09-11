<?php

namespace oirancage\HolidayCreatorItemStructure\utils;

use pocketmine\nbt\tag\Tag;

interface Encodable{
	public function encode(): Tag;
}