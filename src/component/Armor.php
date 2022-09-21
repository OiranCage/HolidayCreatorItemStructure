<?php

namespace oirancage\HolidayCreatorItemStructure\component;

use oirancage\HolidayCreatorItemStructure\Constants;
use oirancage\HolidayCreatorItemStructure\utils\Validator;
use pocketmine\nbt\tag\CompoundTag;
use pocketmine\nbt\tag\Tag;

class Armor implements IComponent{

	public int $protection;
	public TextureType $textureType;

	public static function create(
		int $protection,
		TextureType $textureType
	) : self{
		$result = new self;
		Validator::validateRange($protection, min: 0);
		$result->protection = $protection;
		$result->textureType = $textureType;
		return $result;
	}
	
	public function encode() : Tag{
		return CompoundTag::create()
			->setInt(Constants::PROTECTION, $this->protection)
			->setString(Constants::TEXTURE_TYPE, $this->textureType->getName());
	}

	public function write(CompoundTag $tag): void{
        $tag->setTag(Constants::MINECRAFT_ARMOR, $this->encode());
    }
}