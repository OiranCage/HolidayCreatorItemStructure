<?php

namespace oirancage\HolidayCreatorItemLoader\component;

use oirancage\HolidayCreatorItemLoader\utils\Validator;
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

	public function encode() : Tag{
		return CompoundTag::create()
			->setString("category", $this->category)
			->setFloat("duration", $this->duration);
	}
}