<?php

namespace oirancage\HolidayCreatorItemStructure\component;

use oirancage\HolidayCreatorItemStructure\Constants;
use pocketmine\nbt\tag\CompoundTag;

class DisplayName implements IComponent{

    use WriteTagTrait;
    
    public string $name;

    public function create(string $name) : self{
        $result = new self;
        $result->name = $name;
        return $result;
    }

    public function getName(): string{
        return Constants::MINECRAFT_DISPLAY_NAME;
    }

    public function encode() : CompoundTag{
        return CompoundTag::create()
            ->setString(Constants::VALUE, $this->name);
    }
}