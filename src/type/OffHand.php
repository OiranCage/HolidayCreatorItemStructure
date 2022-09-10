<?php

namespace oirancage\HolidayCreatorItemStructure\type;

use pocketmine\nbt\tag\Tag;

class OffHand implements IType{

	use HandTransformTrait;

	public function getName() : string{
		return "off_hand";
	}
}