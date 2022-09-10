<?php

namespace oirancage\HolidayCreatorItemStructure\component;

use oirancage\HolidayCreatorItemStructure\utils\Validator;
use pocketmine\nbt\tag\CompoundTag;
use pocketmine\nbt\tag\Tag;

class Fuel implements IComponent{

	private float $duration;

	public static function create(
		float $duration
	) : self{
		Validator::validateRange($duration, min: 0.05);
		$result = new self;
		$result->duration = $duration;
		return $result;
	}

	public function getName() : string{
		return "minecraft:fuel";
	}

	public function encode() : Tag{
		return CompoundTag::create()
			->setFloat("duration", $this->duration);
	}
}