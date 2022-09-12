<?php

namespace oirancage\HolidayCreatorItemStructure\component;

use oirancage\HolidayCreatorItemStructure\type\Hand;
use oirancage\HolidayCreatorItemStructure\type\MainHand;
use oirancage\HolidayCreatorItemStructure\type\OffHand;
use pocketmine\nbt\tag\CompoundTag;
use pocketmine\nbt\tag\Tag;

class RenderOffsets implements IComponent{

	private Hand $mainHand;
	private Hand $offHand;

	public static function create(
		Hand $mainHand,
		Hand $offHand
	): self {
		$result = new self;
		$result->mainHand = $mainHand;
		$result->offHand = $offHand;
		return $result;
	}
	
	private const MAIN_HAND = "main_hand";
	private const OFF_HAND = "off_hand";
	public function encode() : Tag{
		return CompoundTag::create()
			->setTag(self::MAIN_HAND, $this->mainHand->encode())
			->setTag(self::OFF_HAND, $this->offHand->encode());
	}
}