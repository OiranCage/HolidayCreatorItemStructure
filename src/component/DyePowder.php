<?php

namespace oirancage\HolidayCreatorItemStructure\component;

use oirancage\HolidayCreatorItemStructure\Constants;
use oirancage\HolidayCreatorItemStructure\type\Color;
use pocketmine\nbt\tag\CompoundTag;

class DyePowder implements IComponent{

    public Color $color;

    public function encode(): CompoundTag{
        return CompoundTag::create()
            ->setString(Constants::COLOR, $this->color->getValue());
    }

    public function write(CompoundTag $tag): void{
        $tag->setTag(Constants::MINECRAFT_DYE_POWDER, $this->encode());
    }
}