<?php

namespace App\Domain\Player\Enum;

enum PlayerBodyTypeEnum : string
{
    case THIN = 'Thin';
    case ATHLETIC = 'Athletic';
    case SOLID = 'Solid';
    case AVERAGE = 'Average';
    case A_FEW_EXTRA_KILOS = 'A Few Extra Kilos';
    case BIG_AND_TALL = 'Big And Tall';
}
