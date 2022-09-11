<?php

namespace oirancage\HolidayCreatorItemStructure\component;

use oirancage\HolidayCreatorItemStructure\utils\Validator;
use pocketmine\nbt\tag\CompoundTag;
use pocketmine\nbt\tag\Tag;

class Armor implements IComponent{

	private int $protection;
	private TextureType $textureType;

	public function create(
		int $protection,
		TextureType $textureType
	){
		Validator::validateRange($protection, min: 0);
		$this->protection = $protection;
		$this->textureType = $textureType;
	}

	public function getName() : string{
		return "minecraft:armor";
	}

	public function encode() : Tag{
		return CompoundTag::create()
			->setInt("protection", $this->protection)
			->setString("texture_type", $this->textureType->getName());
	}
}