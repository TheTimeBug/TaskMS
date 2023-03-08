<?php
    function interval($crateDATE,$createTIME,$endDATE,$endTIME){
        $timestamp =strtotime(date($crateDATE.' '.$createTIME))-strtotime(date($endDATE.' '.$endTIME));
        $time=$timestamp/(60*60);

        return $time;
    }
    function interval2($crateDATEtime,$endDATE,$endTIME){
        $timestamp =strtotime(date($crateDATEtime))-strtotime(date($endDATE.' '.$endTIME));
        $time=$timestamp/(60*60);

        return $time;
    }


?>