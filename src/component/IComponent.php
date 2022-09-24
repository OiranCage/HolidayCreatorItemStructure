<?php

namespace oirancage\HolidayCreatorItemStructure\component;

use oirancage\HolidayCreatorItemStructure\type\IType;
use pocketmine\nbt\tag\CompoundTag;

interface IComponent extends IType{

    public function getName() : string;

    /**
     * Write into CompoundTag
     */
    public function write(CompoundTag $tag) : void;
}