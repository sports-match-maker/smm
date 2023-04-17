<?php

namespace App\Domain\Player\Enum;

enum PlayerLevelEnum : string
{
    case BEGINNER = 'Beginner';
    case INTERMEDIATE = 'Intermediate';
    case ADVANCED = 'Advanced';
    case PROFESSIONAL = 'Professional';
}
