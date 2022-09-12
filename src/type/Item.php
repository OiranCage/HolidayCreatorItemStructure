<?php

namespace oirancage\HolidayCreatorItemStructure\type;

use pocketmine\nbt\tag\CompoundTag;

class Item implements IType{

    public string $name;

    private const NAME = "name";

    public function encode(): CompoundTag{
        return CompoundTag::create()
            ->setString(self::NAME, $this->name);
    }
}