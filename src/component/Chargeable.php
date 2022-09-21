<?php

namespace oirancage\HolidayCreatorItemStructure\component;

use oirancage\HolidayCreatorItemStructure\Constants;
use pocketmine\nbt\tag\CompoundTag;
use pocketmine\nbt\tag\Tag;

class Chargeable implements IComponent{

    public float $movementModifier;

    public static function create(float $movementModifier) : self{
        $result = new self;
        $result->movementModifier = $movementModifier;
        return $result;
    }

    public function encode(): CompoundTag{
        return CompoundTag::create()
            ->setFloat(Constants::MOVEMENT_MODIFIER, $this->movementModifier);
    }

    public function write(CompoundTag $tag): void{
        $tag->setTag(Constants::MINECRAFT_CHARGEABLE, $this->encode());
    }
}