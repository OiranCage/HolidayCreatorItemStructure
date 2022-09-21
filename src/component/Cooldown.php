<?php

namespace oirancage\HolidayCreatorItemStructure\component;

use oirancage\HolidayCreatorItemStructure\Constants;
use oirancage\HolidayCreatorItemStructure\utils\Validator;
use pocketmine\nbt\tag\CompoundTag;
use pocketmine\nbt\tag\Tag;

class Cooldown implements IComponent{

	public string $category;
	public float $duration;

	public static function create(
		string $category,
		float $duration
	): self {
		$result = new self;
		$result->category = $category;
		$result->duration = $duration;
		return $result;
	}

	public function encode() : Tag{
		return CompoundTag::create()
			->setString(Constants::CATEGORY, $this->category)
			->setFloat(Constants::DURATION, $this->duration);
	}

	public function write(CompoundTag $tag): void{
        $tag->setTag(Constants::MINECRAFT_COOLDOWN, $this->encode());
    }
}