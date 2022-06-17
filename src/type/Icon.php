<?php

namespace oirancage\HolidayCreatorItemLoader\type;

use oirancage\HolidayCreatorItemLoader\component\IComponent;
use pocketmine\nbt\tag\CompoundTag;

class Icon implements IType{

	public string $texture;
	public string $legacyId; // used for namespace?

	public function getName() : string{
		return "minecraft:icon";
	}

	public function encode() : CompoundTag{
		return CompoundTag::create()
			->setString("texture", $this->texture)
			->setString("legacy_id", $this->legacyId);
	}
}