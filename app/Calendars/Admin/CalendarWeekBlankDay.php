<?php
namespace App\Calendars\Admin;

class CalendarWeekBlankDay extends CalendarWeekDay{
    function getClassName(){
        return "day_blank";
    }

    function render(){
        return '';
    }

    function everyDay(){
        return '';
    }

    function dayPartCounts($ymd = null){
        return '';
    }

    function dayNumberAdjustment(){
        return '';
    }
}
