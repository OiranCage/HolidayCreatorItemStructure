<?php

namespace oirancage\HolidayCreatorItemStructure\type;

use oirancage\HolidayCreatorItemStructure\Constants;
use pocketmine\nbt\tag\CompoundTag;

class AmmunitionEntry implements IType{

    public Item $item;
    public bool $searchInventory;
    public bool $useInCreative;
    public bool $useOffhand;

    public static function create(Item $item, bool $serachInventory, bool $useInCreative, bool $useOffhand) : self{
        $result = new self;
        $result->item = $item;
        $result->searchInventory = $serachInventory;
        $result->useInCreative = $useInCreative;
        $result->useOffhand = $useOffhand;
        return $result;
    }

    public function encode(): CompoundTag{
        return CompoundTag::create()
            ->setTag(Constants::ITEM, $this->item->encode())
            ->setByte(Constants::SEARCH_INVENTORY, (int) $this->searchInventory)
            ->setByte(Constants::USE_IN_CREATIVE, (int) $this->useInCreative)
            ->setByte(Constants::USE_OFFHAND, (int) $this->useOffhand);
    }
}