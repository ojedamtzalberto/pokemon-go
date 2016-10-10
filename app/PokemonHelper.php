<?php

namespace App;

class PokemonHelper 
{	
    public function getLevel($cp_mult)
    {
        //Regresa nivel y siguiente multiplier
        switch($cp_mult) {
           case $cp_mult <= 0.094:
                return array(1, 0.135);
            case $cp_mult == 0.135:
                return array(1.5, 0.166);
            case $cp_mult == 0.166:
                return array(2, 0.192);
            case $cp_mult == 0.192:
                return array(2.5, 0.215);
            case $cp_mult == 0.215:
                return array(3, 0.236);
            case $cp_mult == 0.236:
                return array(3.5, 0.255);
            case $cp_mult == 0.255:
                return array(4, 0.273);
            case $cp_mult == 0.273:
                return array(4.5, 0.290);
            case $cp_mult == 0.290:
                return array(5, 0.306);
            case $cp_mult == 0.306:
                return array(5.5, 0.321);
            case $cp_mult == 0.321:
                return array(6, 0.335);
            case $cp_mult == 0.335:
                return array(6.5, 0.349);
            case $cp_mult == 0.349:
                return array(7, 0.362);
            case $cp_mult == 0.362:
                return array(7.5, 0.375);
            case $cp_mult == 0.375:
                return array(8, 0.387);
            case $cp_mult == 0.387:
                return array(8.5, 0.399);
            case $cp_mult == 0.399:
                return array(9, 0.411);
            case $cp_mult == 0.411:
                return array(9.5, 0.422);
            case $cp_mult == 0.422:
                return array(10, 0.432);
            case $cp_mult == 0.432:
                return array(10.5, 0.443);
            case $cp_mult == 0.443:
                return array(11, 0.453);
            case $cp_mult == 0.453:
                return array(11.5, 0.462);
            case $cp_mult == 0.462:
                return array(12, 0.472);
            case $cp_mult == 0.472:
                return array(12.5, 0.481);
            case $cp_mult == 0.481:
                return array(13, 0.490);
            case $cp_mult == 0.490:
                return array(13.5, 0.499);
            case $cp_mult == 0.499:
                return array(14, 0.508);
            case $cp_mult == 0.508:
                return array(14.5, 0.517);
            case $cp_mult == 0.517:
                return array(15, 0.525);
            case $cp_mult == 0.525:
                return array(15.5, 0.534);
            case $cp_mult == 0.534:
                return array(16, 0.542);
            case $cp_mult == 0.542:
                return array(16.5, 0.550);
            case $cp_mult == 0.550:
                return array(17, 0.558);
            case $cp_mult == 0.558:
                return array(17.5, 0.566);
            case $cp_mult == 0.566:
                return array(18, 0.574);
            case $cp_mult == 0.574:
                return array(18.5, 0.582);
            case $cp_mult == 0.582:
                return array(19, 0.589);
            case $cp_mult == 0.589:
                return array(19.5, 0.597);
            case $cp_mult == 0.597:
                return array(20, 0.604);
            case $cp_mult == 0.604:
                return array(20.5, 0.612);
            case $cp_mult == 0.612:
                return array(21, 0.619);
            case $cp_mult == 0.619:
                return array(21.5, 0.626);
            case $cp_mult == 0.626:
                return array(22, 0.633);
            case $cp_mult == 0.633:
                return array(22.5, 0.640);
            case $cp_mult == 0.640:
                return array(23, 0.647);
            case $cp_mult == 0.647:
                return array(23.5, 0.654);
            case $cp_mult == 0.654:
                return array(24, 0.661);
            case $cp_mult == 0.661:
                return array(24.5, 0.667);
            case $cp_mult == 0.667:
                return array(25, 0.674);
            case $cp_mult == 0.674:
                return array(25.5, 0.681);
            case $cp_mult == 0.681:
                return array(26, 0.687);
            case $cp_mult == 0.687:
                return array(26.5, 0.694);
            case $cp_mult == 0.694:
                return array(27, 0.700);
            case $cp_mult == 0.700:
                return array(27.5, 0.706);
            case $cp_mult == 0.706:
                return array(28, 0.713);
            case $cp_mult == 0.713:
                return array(28.5, 0.719);
            case $cp_mult == 0.719:
                return array(29, 0.725);
            case $cp_mult == 0.725:
                return array(29.5, 0.731);
            case $cp_mult == 0.731:
                return array(30, 0.734);
            case $cp_mult == 0.734:
                return array(30.5, 0.737);
            case $cp_mult == 0.737:
                return array(31, 0.740);
            case $cp_mult == 0.740:
                return array(31.5, 0.743);
            case $cp_mult == 0.743:
                return array(32, 0.746);
            case $cp_mult == 0.746:
                return array(32.5, 0.749);
            case $cp_mult == 0.749:
                return array(33, 0.752);
            case $cp_mult == 0.752:
                return array(33.5, 0.755);
            case $cp_mult == 0.755:
                return array(34, 0.758);
            case $cp_mult == 0.758:
                return array(34.5, 0.761);
            case $cp_mult == 0.761:
                return array(35, 0.764);
            case $cp_mult == 0.764:
                return array(35.5, 0.767);
            case $cp_mult == 0.767:
                return array(36, 0.770);
            case $cp_mult == 0.770:
                return array(36.5, 0.773);
            case $cp_mult == 0.773:
                return array(37, 0.776);
            case $cp_mult == 0.776:
                return array(37.5, 0.778);
            case $cp_mult == 0.778:
                return array(38, 0.781);
            case $cp_mult == 0.781:
                return array(38.5, 0.784);
            case $cp_mult == 0.784:
                return array(39, 0.787);
            case $cp_mult == 0.787:
                return array(39.5, 0.790);
            case $cp_mult == 0.790:
                return array(40, 0.790);
            default:
                return 0;
        }
    }

    public function getCaramelos($nivel)
    {
        switch($nivel) {
            case $nivel < 11:
                return 1;
            case $nivel < 21:
                return 2;
            case $nivel < 26:
                return 3;
            case $nivel < 31:
                return 4;
            case $nivel < 33:
                return 6;
            case $nivel < 35:
                return 8;
            case $nivel < 37:
                return 10;
            case $nivel < 39:
                return 12;
            case $nivel <= 40:
                return 15;
        }
    }

    public function getPolvos($nivel)
    {
        switch($nivel) {
            case $nivel < 3:
                return 200;
            case $nivel < 5:
                return 400;
            case $nivel < 7:
                return 600;
            case $nivel < 9:
                return 800;
            case $nivel < 11:
                return 1000;
            case $nivel < 13:
                return 1300;
            case $nivel < 15:
                return 1600;
            case $nivel < 17:
                return 1900;
            case $nivel < 19:
                return 2200;
            case $nivel < 21:
                return 2500;
            case $nivel < 23:
                return 3000;
            case $nivel < 25:
                return 3500;
            case $nivel < 27:
                return 4000;
            case $nivel < 29:
                return 4500;
            case $nivel < 31:
                return 5000;
            case $nivel < 33:
                return 6000;
            case $nivel < 35:
                return 7000;
            case $nivel < 37:
                return 8000;
            case $nivel < 39:
                return 9000;
            case $nivel <= 40:
                return 10000;
        }
    }
}