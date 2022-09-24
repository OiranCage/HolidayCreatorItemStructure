<?php

namespace oirancage\HolidayCreatorItemStructure\type;

use oirancage\HolidayCreatorItemStructure\Constants;
use pocketmine\nbt\tag\CompoundTag;

class Item implements IType{

    public string $name;

    public static function create(string $name) : self{
        $result = new self;
        $result->name = $name;
        return $result;
    }

    public const NAME = "name";

    public function encode(): CompoundTag{
        return CompoundTag::create()
            ->setString(Constants::NAME, $this->name);
    }
}