<?php

namespace oirancage\HolidayCreatorItemLoader\utils;

final class Validator{
	private function __construct(){
		// nope
	}

	public static function validateRange(int|float $subject, int|float|null $min = null, int|float|null $max = null): void {
		if($min !== null && $subject < $min){
			throw new ValidateException("the value should be $min or larger, $subject given.");
		}

		if($max !== null && $subject > $max){
			throw new ValidateException("the value should be $max or smaller, $subject given.");
		}
	}

	public static function validateTrue(bool $condition){
		if(!$condition){
			throw new ValidateException("the condition should be true but actually false.");
		}
	}
}