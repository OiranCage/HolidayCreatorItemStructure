<?php

namespace oirancage\HolidayCreatorItemStructure\component;

use oirancage\HolidayCreatorItemStructure\Constants;
use oirancage\HolidayCreatorItemStructure\type\Hand;
use oirancage\HolidayCreatorItemStructure\type\MainHand;
use oirancage\HolidayCreatorItemStructure\type\OffHand;
use pocketmine\nbt\tag\CompoundTag;
use pocketmine\nbt\tag\Tag;

class RenderOffsets implements IComponent{

	use WriteTagTrait;

	public Hand $mainHand;
	public Hand $offHand;

	public static function create(
		Hand $mainHand,
		Hand $offHand
	): self {
		$result = new self;
		$result->mainHand = $mainHand;
		$result->offHand = $offHand;
		return $result;
	}

	public function getName(): string{
        return Tags::RENDER_OFFSETS;
    }
	
	public function encode() : Tag{
		return CompoundTag::create()
			->setTag(Constants::MAIN_HAND, $this->mainHand->encode())
			->setTag(Constants::OFF_HAND, $this->offHand->encode());
	}
}