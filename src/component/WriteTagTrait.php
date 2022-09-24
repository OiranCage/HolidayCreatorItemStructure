<?php

namespace oirancage\HolidayCreatorItemStructure\component;

use pocketmine\nbt\tag\CompoundTag;
use pocketmine\nbt\tag\Tag;

trait WriteTagTrait{

    abstract function getName() : string;
    abstract function encode() : Tag;

    public function write(CompoundTag $tag) : void{
        $tag->setTag($this->getName(), $this->encode());
    }
}