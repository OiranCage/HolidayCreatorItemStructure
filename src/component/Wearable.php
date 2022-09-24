<?php

namespace oirancage\HolidayCreatorItemStructure\component;

use oirancage\HolidayCreatorItemStructure\Constants;
use oirancage\HolidayCreatorItemStructure\utils\Validator;
use pocketmine\nbt\tag\CompoundTag;
use pocketmine\nbt\tag\Tag;

class Wearable implements IComponent{

	use WriteTagTrait;

	public ArmorSlotType $armorSlot;

	public static function create(ArmorSlotType $armorSlot) : self{
		$result = new self;
		$result->armorSlot = $armorSlot;
		return $result;
	}

	public function getName(): string{
        return Tags::WEARABLE;
    }

	public function encode() : Tag{
		return CompoundTag::create()
			->setByte(Constants::DISPENSABLE, 1)
			->setString(Constants::SLOT, $this->armorSlot->getValue());
	}

}