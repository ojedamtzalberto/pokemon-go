<?php

namespace App;

class PokemonHelper 
{	
    public function getLevel($cp_mult)
    {
        switch($cp_mult) {
            case $cp_mult > 0 && $cp_mult <= 0.094:
                return 1;
            case $cp_mult == 0.135:
                return 1.5;
            case $cp_mult == 0.166:
                return 2;
            case $cp_mult == 0.192:
                return 2.5;
            case $cp_mult == 0.215:
                return 3;
            case $cp_mult == 0.236:
                return 3.5;
            case $cp_mult == 0.255:
                return 4;
            case $cp_mult == 0.273:
                return 4.5;
            case $cp_mult == 0.290:
                return 5;
            case $cp_mult == 0.306:
                return 5.5;
            case $cp_mult == 0.321:
                return 6;
            case $cp_mult == 0.335:
                return 6.5;
            case $cp_mult == 0.349:
                return 7;
            case $cp_mult == 0.362:
                return 7.5;
            case $cp_mult == 0.375:
                return 8;
            case $cp_mult == 0.387:
                return 8.5;
            case $cp_mult == 0.399:
                return 9;
            case $cp_mult == 0.411:
                return 9.5;
            case $cp_mult == 0.422:
                return 10;
            case $cp_mult == 0.432:
                return 10.5;
            case $cp_mult == 0.443:
                return 11;
            case $cp_mult == 0.453:
                return 11.5;
            case $cp_mult == 0.462:
                return 12;
            case $cp_mult == 0.472:
                return 12.5;
            case $cp_mult == 0.481:
                return 13;
            case $cp_mult == 0.490:
                return 13.5;
            case $cp_mult == 0.499:
                return 14;
            case $cp_mult == 0.508:
                return 14.5;
            case $cp_mult == 0.517:
                return 15;
            case $cp_mult == 0.525:
                return 15.5;
            case $cp_mult == 0.534:
                return 16;
            case $cp_mult == 0.542:
                return 16.5;
            case $cp_mult == 0.550:
                return 17;
            case $cp_mult == 0.558:
                return 17.5;
            case $cp_mult == 0.566:
                return 18;
            case $cp_mult == 0.574:
                return 18.5;
            case $cp_mult == 0.582:
                return 19;
            case $cp_mult == 0.589:
                return 19.5;
            case $cp_mult == 0.597:
                return 20;
            case $cp_mult == 0.604:
                return 20.5;
            case $cp_mult == 0.612:
                return 21;
            case $cp_mult == 0.619:
                return 21.5;
            case $cp_mult == 0.626:
                return 22;
            case $cp_mult == 0.633:
                return 22.5;
            case $cp_mult == 0.640:
                return 23;
            case $cp_mult == 0.647:
                return 23.5;
            case $cp_mult == 0.654:
                return 24;
            case $cp_mult == 0.661:
                return 24.5;
            case $cp_mult == 0.667:
                return 25;
            case $cp_mult == 0.674:
                return 25.5;
            case $cp_mult == 0.681:
                return 26;
            case $cp_mult == 0.687:
                return 26.5;
            case $cp_mult == 0.694:
                return 27;
            case $cp_mult == 0.700:
                return 27.5;
            case $cp_mult == 0.706:
                return 28;
            case $cp_mult == 0.713:
                return 28.5;
            case $cp_mult == 0.719:
                return 29;
            case $cp_mult == 0.725:
                return 29.5;
            case $cp_mult == 0.731:
                return 30;
            case $cp_mult == 0.734:
                return 30.5;
            case $cp_mult == 0.737:
                return 31;
            case $cp_mult == 0.740:
                return 31.5;
            case $cp_mult == 0.743:
                return 32;
            case $cp_mult == 0.746:
                return 32.5;
            case $cp_mult == 0.749:
                return 33;
            case $cp_mult == 0.752:
                return 33.5;
            case $cp_mult == 0.755:
                return 34;
            case $cp_mult == 0.758:
                return 34.5;
            case $cp_mult == 0.761:
                return 35;
            case $cp_mult == 0.764:
                return 35.5;
            case $cp_mult == 0.767:
                return 36;
            case $cp_mult == 0.770:
                return 36.5;
            case $cp_mult == 0.773:
                return 37;
            case $cp_mult == 0.776:
                return 37.5;
            case $cp_mult == 0.778:
                return 38;
            case $cp_mult == 0.781:
                return 38.5;
            case $cp_mult == 0.784:
                return 39;
            case $cp_mult == 0.787:
                return 39.5;
            case $cp_mult == 0.790:
                return 40;
            default:
                return 0;
        }
    }
}