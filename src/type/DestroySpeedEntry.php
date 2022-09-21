<?php

namespace oirancage\HolidayCreatorItemStructure\type;

use oirancage\HolidayCreatorItemStructure\Constants;
use pocketmine\nbt\tag\CompoundTag;

class DestroySpeedEntry implements IType{

    public string $block;
    public float $speed;

    public static function create(string $block, float $speed) : self{
        $result = new self;
        $result->block = $block;
        $result->speed = $speed;
        return $result;
    }

    public function encode() : CompoundTag{
        return CompoundTag::create()
            ->setString(Constants::BLOCK, $this->block)
            ->setFloat(Constants::SPEED, $this->speed);
    }
}