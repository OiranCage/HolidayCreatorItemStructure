<?php

namespace oirancage\HolidayCreatorItemStructure\component;

enum TextureType{
    case None;
    case Leather;
    case Chain;
    case Iron;
    case Diamond;
    case Gold;
    case Elytra;
    case Turtle;
    case Netherite;

    public function getName() : string{
        return match($this){
            self::None => "none",
            self::Leather => "leather",
            self::Chain => "chain",
            self::Iron => "iron",
            self::Diamond => "diamond",
            self::Gold => "gold",
            self::Elytra => "elytra",
            self::Turtle => "turtle",
            self::Netherite => "netherite"
        };
    }
}