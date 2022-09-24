<?php

namespace oirancage\HolidayCreatorItemStructure\component;

use oirancage\HolidayCreatorItemStructure\Constants;
use pocketmine\nbt\tag\CompoundTag;
use pocketmine\nbt\tag\Tag;

class BlockPlacer implements IComponent{

    use WriteTagTrait;

    public string $block;

    public static function create(string $block) : self{
        $result = new self;
        $result->block = $block;
        return $result;
    }

    public function getName(): string{
        return Tags::BLOCK_PLACER;
    }

    public function encode(): CompoundTag{
        return CompoundTag::create()
            ->setString(Constants::BLOCK, $this->block);
    }
}