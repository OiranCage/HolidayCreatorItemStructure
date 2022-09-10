<?php

namespace oirancage\HolidayCreatorItemStructure\type;

use oirancage\HolidayCreatorItemStructure\utils\Validator;
use pocketmine\nbt\tag\CompoundTag;

class DamageChance implements IType{

	private int $max;
	private int $min;

	public static function create(
		int $min = 100,
		int $max = 100,
	) : self{
		Validator::validateRange($min, min: 0, max: 100);
		Validator::validateRange($max, min: 0, max: 100);
		Validator::validateTrue($min <= $max);
		$result = new self;
		$result->min = $min;
		$result->max = $max;
		return $result;
	}

	public function getName() : string{
		return "damage_chance";
	}

	public function encode() : CompoundTag{
		return CompoundTag::create()
			->setInt("min", $this->min)
			->setInt("max", $this->max);
	}
}