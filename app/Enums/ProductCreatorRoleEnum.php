<?php

namespace App\Enums;

use Spatie\Enum\Laravel\Enum;

/**
 * @method static self WRITER()
 * @method static self AUTHOR()
 * @method static self TRANSLATOR()
 * @method static self TEACHER()
 * @method static self SPEAKER()
 * @method static self CAMERAMAN()
 */
final class ProductCreatorRoleEnum extends Enum
{
    /**
     * @inheritDoc
     */
    protected static function values(): array
    {
        return [
            'WRITER' => 'writer',
            'AUTHOR' => 'author',
            'TRANSLATOR' => 'translator',
            'TEACHER' => 'teacher',
            'SPEAKER' => 'speaker',
            'CAMERAMAN' => 'cameraman'
        ];
    }
}
