<?php

namespace oirancage\HolidayCreatorItemStructure\component;

enum ArmorSlotType{
    case None;
    case WeaponMainhand;
    case WeaponOffhand;
    case ArmorHead;
    case ArmorChest;
    case ArmorLegs;
    case ArmorFeet;
    case Hotbar;
    case Inventory;
    case Enderchest;
    case Saddle;
    case Armor;
    case Chest;
    case Equippable;

    public function getValue() : string{
        return match($this){
            self::None => "none",
            self::WeaponMainhand => "slot.weapon.mainhand",
            self::WeaponOffhand => "slot.weapon.offhand",
            self::ArmorHead => "slot.armor.head",
            self::ArmorChest => "slot.armor.chest",
            self::ArmorLegs => "slot.armor.legs",
            self::ArmorFeet => "slot.armor.feet",
            self::Hotbar => "slot.hotbar",
            self::Inventory => "slot.inventory",
            self::Enderchest => "slot.enderchest",
            self::Saddle => "slot.saddle",
            self::Armor => "slot.armor",
            self::Chest => "slot.chest",
            self::Equippable => "slot.equippable"
        };
    }
}