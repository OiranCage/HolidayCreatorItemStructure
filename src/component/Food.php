<?php

namespace oirancage\HolidayCreatorItemStructure\component;

use oirancage\HolidayCreatorItemStructure\Constants;
use oirancage\HolidayCreatorItemStructure\utils\Validator;
use pocketmine\nbt\tag\CompoundTag;
use pocketmine\nbt\tag\Tag;

class Food implements IComponent{

	public bool $canAlwaysEat;
	public int $nutrition;
	public float $saturationModifier;

	public static function create(
		bool $canAlwaysEat,
		int $nutrition,
		float $saturationModifier
	) : self{
		Validator::validateRange($saturationModifier, min: 0.0);

		$result = new self;
		$result->canAlwaysEat = $canAlwaysEat;
		$result->nutrition = $nutrition;
		$result->saturationModifier = $saturationModifier;
		return $result;
	}

	public function encode() : Tag{
		return CompoundTag::create()
			->setByte(Constants::CAN_ALWAYS_EAT, (int) $this->canAlwaysEat)
			->setInt(Constants::NUTRITION, $this->nutrition)
			->setFloat(Constants::SATURATION_MODIFIER, $this->saturationModifier);
	}

	public function write(CompoundTag $tag): void{
        $tag->setTag(Constants::MINECRAFT_FOOD, $this->encode());
    }
}