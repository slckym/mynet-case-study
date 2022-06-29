<?php

namespace App\Enums;

class GenderEnum
{
    const MALE_KEY = "male";
    const FEMALE_KEY = "female";
    const OTHER_KEY = "other";

    const MALE_VALUE = "Male";
    const FEMALE_VALUE = "Female";
    const OTHER_VALUE = "Other";

    /**
     * @param $gender
     *
     * @return string|null
     */
    public static function getGender($gender): ?string
    {
        return self::getGenders()[$gender] ?? null;
    }

    /**
     * @return string[]
     */
    public static function getGenders(): array
    {
        return [
            self::MALE_KEY => self::MALE_VALUE,
            self::FEMALE_KEY => self::FEMALE_VALUE,
            self::OTHER_KEY => self::OTHER_VALUE,
        ];
    }
}
