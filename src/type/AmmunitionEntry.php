<?php

namespace oirancage\HolidayCreatorItemStructure\type;

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

    private const ITEM = "item";
    private const SEARCH_INVENTORY = "search_inventory";
    private const USE_IN_CREATIVE = "use_in_creative";
    private const USE_OFFHAND = "use_offhand";

    public function encode(): CompoundTag{
        return CompoundTag::create()
            ->setTag(self::ITEM, $this->item->encode())
            ->setByte(self::SEARCH_INVENTORY, (int) $this->searchInventory)
            ->setByte(self::USE_IN_CREATIVE, (int) $this->useInCreative)
            ->setByte(self::USE_OFFHAND, (int) $this->useOffhand);
    }
}