<?php

namespace oirancage\HolidayCreatorItemStructure\component;

use oirancage\HolidayCreatorItemStructure\type\MainHand;
use oirancage\HolidayCreatorItemStructure\type\OffHand;
use pocketmine\nbt\tag\CompoundTag;
use pocketmine\nbt\tag\Tag;

class RenderOffsets implements IComponent{

	private MainHand $mainHand;
	private OffHand $offHand;

	public static function create(
		MainHand $mainHand,
		OffHand $offHand
	): self {
		$result = new self;
		$result->mainHand = $mainHand;
		$result->offHand = $offHand;
		return $result;
	}

	public function getName() : string{
		return "minecraft:render_offsets";
	}

	public function encode() : Tag{
		return CompoundTag::create()
			->setTag($this->mainHand->getName(), $this->mainHand->encode())
			->setTag($this->offHand->getName(), $this->offHand->encode());
	}
}