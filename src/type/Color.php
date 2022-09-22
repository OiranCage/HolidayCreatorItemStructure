<?php

namespace oirancage\HolidayCreatorItemStructure\type;

enum Color{
    case Black;
    case Red;
    case Green;
    case Brown;
    case Blue;
    case Purple;
    case Cyan;
    case Silver;
    case Gray;
    case Pink;
    case Lime;
    case Yellow;
    case Lightblue;
    case Magenta;
    case Orange;
    case White;

    public function getValue() : string{
        return match($this){
            self::Black => "black",
            self::Red => "red",
            self::Green => "green",
            self::Brown => "brown",
            self::Blue => "blue",
            self::Purple => "purple",
            self::Cyan => "cyan",
            self::Silver => "silver",
            self::Gray => "gray",
            self::Pink => "pink",
            self::Lime => "lime",
            self::Yellow => "yellow",
            self::Lightblue => "lightblue",
            self::Magenta => "magenta",
            self::Orange => "orange",
            self::White => "white"
        };
    }
}