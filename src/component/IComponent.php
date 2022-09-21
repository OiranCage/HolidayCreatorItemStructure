<?php

namespace oirancage\HolidayCreatorItemStructure\component;

use oirancage\HolidayCreatorItemStructure\type\IType;
use pocketmine\nbt\tag\CompoundTag;

interface IComponent extends IType{

    /**
     * Write into CompoundTag
     */
    public function write(CompoundTag $tag) : void;
}