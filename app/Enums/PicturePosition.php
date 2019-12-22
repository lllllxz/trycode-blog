<?php

namespace App\Enums;

use BenSampo\Enum\Contracts\LocalizedEnum;
use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class PicturePosition extends Enum implements LocalizedEnum
{
    const INDEX_HEAD = 1;
    const HIGHLY_RECOMMENTED = 2;
}
