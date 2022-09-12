<?php

namespace oirancage\HolidayCreatorItemStructure\component;

use oirancage\HolidayCreatorItemStructure\utils\Validator;
use pocketmine\nbt\tag\CompoundTag;
use pocketmine\nbt\tag\Tag;

class Cooldown implements IComponent{

	private string $category;
	private float $duration;

	public static function create(
		string $category,
		float $duration
	): self {
		$result = new self;
		$result->category = $category;
		$result->duration = $duration;
		return $result;
	}

	public function getName() : string{
		return "minecraft:cooldown";
	}

	private const CATEGORY = "category";
	private const DURATION = "duration";

	public function encode() : Tag{
		return CompoundTag::create()
			->setString(self::CATEGORY, $this->category)
			->setFloat(self::DURATION, $this->duration);
	}
}