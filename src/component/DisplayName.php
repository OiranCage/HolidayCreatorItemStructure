<?php

namespace oirancage\HolidayCreatorItemStructure\component;

use oirancage\HolidayCreatorItemStructure\Constants;
use pocketmine\nbt\tag\CompoundTag;

class DisplayName implements IComponent{

    
    public string $name;

    public function create(string $name) : self{
        $result = new self;
        $result->name = $name;
        return $result;
    }

    public function encode() : CompoundTag{
        return CompoundTag::create()
            ->setString(Constants::VALUE, $this->name);
    }

    public function write(CompoundTag $tag): void{
        $tag->setTag(Constants::MINECRAFT_DISPLAY_NAME, $this->encode());
    }
}