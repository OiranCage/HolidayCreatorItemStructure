<?php

namespace oirancage\HolidayCreatorItemStructure\type;

use oirancage\HolidayCreatorItemStructure\Constants;
use oirancage\HolidayCreatorItemStructure\utils\Encodable;
use pocketmine\nbt\tag\CompoundTag;

class MolangValue implements Encodable{

    public ?string $expression;
    
    public MolangVersion $version;

    public static function empty() : self {
        $result = new self;
        $result->expression = null;
        return $result;
    }

    public static function v1(string $expression) : self{
        $result = new self;
        $result->expression = $expression;
        $result->version = MolangVersion::V1;
        return $result;
    }

    public function encode(): CompoundTag{
        if($this->expression === null){
            return $this->encodeEmpty();
        }

        return match($this->version){
            MolangVersion::V1 => self::encodeV1($this->expression)
        };
    }

    protected function encodeEmpty() : CompoundTag{
        return CompoundTag::create()
            ->setString(Constants::EXPRESSION, "")
            ->setInt(Constants::VERSION, -1);
    }

    protected static function encodeV1(string $expression) : CompoundTag{
        return CompoundTag::create()
            ->setString(Constants::EXPRESSION, $expression)
            ->setInt(Constants::VERSION, 1);
    }
}