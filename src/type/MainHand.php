<?php

namespace oirancage\HolidayCreatorItemLoader\type;

use pocketmine\nbt\tag\CompoundTag;
use pocketmine\nbt\tag\Tag;

class MainHand implements IType{

	use HandTransformTrait;

	public function getName() : string{
		return "main_hand";
	}
}