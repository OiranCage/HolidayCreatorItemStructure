<?php

namespace oirancage\HolidayCreatorItemStructure\type;

use oirancage\HolidayCreatorItemStructure\component\IComponent;
use pocketmine\nbt\tag\CompoundTag;

class Icon implements IType{

	public string $texture;
	public string $legacyId; // used for namespace?

	public static function create(string $texture, string $legacyId) : self{
		$result = new self;
		$result->texture = $texture;
		$result->legacyId = $legacyId;
		return $result;
	}

	public static function getName() : string{
		return "minecraft:icon";
	}

	public function encode() : CompoundTag{
		return CompoundTag::create()
			->setString("legacy_id", $this->legacyId)
			->setString("texture", $this->texture);
	}
}