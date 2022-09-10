<?php

namespace oirancage\HolidayCreatorItemStructure\component;

use oirancage\HolidayCreatorItemStructure\utils\Validator;
use pocketmine\nbt\tag\CompoundTag;
use pocketmine\nbt\tag\Tag;

class Food implements IComponent{

	private bool $canAlwaysEat;
	private int $nutrition;
	private float $saturationModifier;

	public static function create(
		?bool $canAlwaysEat = null,
		?int $nutrition = null,
		?float $saturationModifier = null
	): self{
		Validator::validateRange($saturationModifier, min: 0.0);

		$result = new self;
		$result->canAlwaysEat = $canAlwaysEat ?? false;
		$result->nutrition = $nutrition ?? 0;
		$result->saturationModifier = $saturationModifier ?? 0.6;
		return $result;
	}

	public function getName() : string{
		return "minecraft:food";
	}

	public function encode() : Tag{
		return CompoundTag::create()
			->setByte("can_always_eat", $this->canAlwaysEat)
			->setInt("nutrition", $this->nutrition)
			->setFloat("saturation_modifier", $this->saturationModifier);
	}
}