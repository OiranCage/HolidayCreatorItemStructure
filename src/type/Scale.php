<?php

namespace oirancage\HolidayCreatorItemStructure\type;

use pocketmine\nbt\NBT;
use pocketmine\nbt\tag\FloatTag;
use pocketmine\nbt\tag\ListTag;

class Scale implements IType{

	public float $x;
	public float $y;
	public float $z;

	public static function create(
		float $x,
		float $y,
		float $z
	): self{
		$result = new self;
		$result->x = $x;
		$result->y = $y;
		$result->z = $z;
		return $result;
	}

	public function getName() : string{
		return "scale";
	}

	public function encode() : ListTag{
		return new ListTag([
			new FloatTag($this->x),
			new FloatTag($this->y),
			new FloatTag($this->z)
		], NBT::TAG_Float);
	}
}
