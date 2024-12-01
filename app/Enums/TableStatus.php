<?php 


namespace App\Enums;



enum TableStatus: string
{
    case Panding = 'Panding';
    case Avaliable = 'Avaliable';
    case Unavaliable = 'Unavaliable';
}