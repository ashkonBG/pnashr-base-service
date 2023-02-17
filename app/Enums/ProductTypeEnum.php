<?php

namespace App\Enums;

use Spatie\Enum\Laravel\Enum;

/**
 * @method static self VIDEO()
 * @method static self BOOK()
 * @method static self PODCAST()
 * @method static self E_BOOK()
 */
final class ProductTypeEnum extends Enum
{
    /**
     * @inheritDoc
     */
    protected static function values(): array
    {
        return [
            'VIDEO' => 'video',
            'BOOK' => 'book',
            'PODCAST' => 'podcast',
            'E_BOOK' => 'e-book',
        ];
    }
}
