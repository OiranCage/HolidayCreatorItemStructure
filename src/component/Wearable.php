<?php

namespace oirancage\HolidayCreatorItemLoader\component;

use oirancage\HolidayCreatorItemLoader\utils\Validator;
use pocketmine\nbt\tag\CompoundTag;
use pocketmine\nbt\tag\Tag;

class Wearable implements IComponent{

	const acceptableArmorSlotTypes = [ "slot.weapon.mainhand", "none", "slot.weapon.offhand", "slot.armor.head", "slot.armor.chest", "slot.armor.legs", "slot.armor.feet", "slot.hotbar", "slot.inventory", "slot.enderchest", "slot.saddle", "slot.armor", "slot.chest", "slot.equippable" ];

	private string $armorSlot;

	public static function create(string $armorSlot) : self{
		Validator::validateTrue(in_array($armorSlot, self::acceptableArmorSlotTypes));
		$result = new self;
		$result->armorSlot = $armorSlot;
		return $result;
	}

	public function getName() : string{
		return "minecraft:wearable";
	}

	public function encode() : Tag{
		return CompoundTag::create()
			->setString("slot", $this->armorSlot)
			->setByte("dispensable", 1);
	}
}