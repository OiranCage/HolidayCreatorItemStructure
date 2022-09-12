<?php

namespace oirancage\HolidayCreatorItemStructure\component;

use oirancage\HolidayCreatorItemStructure\utils\Validator;
use pocketmine\nbt\tag\CompoundTag;
use pocketmine\nbt\tag\Tag;

class Armor implements IComponent{

	private int $protection;
	private TextureType $textureType;

	public function __construct(
		int $protection,
		TextureType $textureType
	){
		Validator::validateRange($protection, min: 0);
		$this->protection = $protection;
		$this->textureType = $textureType;
	}

	public static function create(
		int $protection,
		TextureType $textureType
	) : self{
		return new self($protection, $textureType);
	}

	public function getName() : string{
		return "minecraft:armor";
	}
	
	private const PROTECTION = "protection";
	private const TEXTURE_TYPE = "texture_type";

	public function encode() : Tag{
		return CompoundTag::create()
			->setInt(self::PROTECTION, $this->protection)
			->setString(self::TEXTURE_TYPE, $this->textureType->getName());
	}
}