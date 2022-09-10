<?php

namespace oirancage\HolidayCreatorItemStructure\component;

use oirancage\HolidayCreatorItemStructure\utils\Validator;
use pocketmine\nbt\tag\CompoundTag;
use pocketmine\nbt\tag\Tag;

class Armor implements IComponent{

	const acceptableTextureTypes = [ "leather", "none", "chain", "iron", "diamond", "gold", "elytra", "turtle", "netherite" ];

	private int $protection;
	private string $textureType;

	public function create(
		int $protection,
		string $textureType
	){
		Validator::validateRange($protection, min: 0);
		Validator::validateTrue(in_array($textureType, self::acceptableTextureTypes, true));
		$this->protection = $protection;
		$this->textureType = $textureType;
	}

	public function getName() : string{
		return "minecraft:armor";
	}

	public function encode() : Tag{
		return CompoundTag::create()
			->setInt("protection", $this->protection)
			->setString("texture_type", $this->textureType);
	}
}