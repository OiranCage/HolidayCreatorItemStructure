<?php

namespace oirancage\HolidayCreatorItemStructure\component;

use oirancage\HolidayCreatorItemStructure\Constants;
use oirancage\HolidayCreatorItemStructure\utils\Validator;
use pocketmine\nbt\tag\CompoundTag;
use pocketmine\nbt\tag\Tag;

class Wearable implements IComponent{

	public ArmorSlotType $armorSlot;

	public static function create(ArmorSlotType $armorSlot) : self{
		$result = new self;
		$result->armorSlot = $armorSlot;
		return $result;
	}

	public function encode() : Tag{
		return CompoundTag::create()
			->setByte(Constants::DISPENSABLE, 1)
			->setString(Constants::SLOT, $this->armorSlot->getValue());
	}

	public function write(CompoundTag $tag): void{
        $tag->setTag(Constants::MINECRAFT_WEARABLE, $this->encode());
    }
}