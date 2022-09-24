<?php

namespace oirancage\HolidayCreatorItemStructure\component;

use oirancage\HolidayCreatorItemStructure\Constants;
use oirancage\HolidayCreatorItemStructure\type\Color;
use pocketmine\nbt\tag\CompoundTag;

class DyePowder implements IComponent{

    use WriteTagTrait;

    public Color $color;

    public static function create(Color $color) : self{
        $result = new self;
        $result->color = $color;
        return $result;
    }

    public function getName(): string{
        return Constants::MINECRAFT_DYE_POWDER;
    }

    public function encode(): CompoundTag{
        return CompoundTag::create()
            ->setString(Constants::COLOR, $this->color->getValue());
    }

}