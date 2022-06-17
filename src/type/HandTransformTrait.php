<?php

namespace oirancage\HolidayCreatorItemLoader\type;

use pocketmine\nbt\tag\CompoundTag;

trait HandTransformTrait{
	private Scale $firstPersonScale;
	private Scale $thirdPersonScale;

	public function encode(): CompoundTag{
		return CompoundTag::create()
			->setTag("first_person", CompoundTag::create()
				->setTag($this->firstPersonScale->getName(), $this->firstPersonScale->encode())
			)
			->setTag("third_person", CompoundTag::create()
				->setTag($this->thirdPersonScale->getName(), $this->thirdPersonScale->encode())
			);
	}

}