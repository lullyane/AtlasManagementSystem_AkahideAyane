<?php
namespace App\Calendars\General;

use Carbon\Carbon;
use Auth;

class CalendarView{

    private $carbon;
    function __construct($date){
        $this->carbon = new Carbon($date);
    }

    public function getTitle(){
        return $this->carbon->format('Y年n月');
    }

    function render(){
        $html = [];
        $html[] = '<div class="calendar text-center">';
        $html[] = '<table class="table border">';
        $html[] = '<thead>';
        $html[] = '<tr>';
        $html[] = '<th class="border">月</th>';
        $html[] = '<th class="border">火</th>';
        $html[] = '<th class="border">水</th>';
        $html[] = '<th class="border">木</th>';
        $html[] = '<th class="border">金</th>';
        $html[] = '<th class="border day-sat">土</th>';
        $html[] = '<th class="border day-sun">日</th>';
        $html[] = '</tr>';
        $html[] = '</thead>';
        $html[] = '<tbody>';
        $weeks = $this->getWeeks();
        foreach($weeks as $week){
            $html[] = '<tr class="'.$week->getClassName().'">';
            $days = $week->getDays();
            foreach($days as $day){
                $startDay = $this->carbon->copy()->format("Y-m-01");
                $toDay = $this->carbon->copy()->format("Y-m-d");

                if($startDay <= $day->everyDay() && $toDay >= $day->everyDay()){
                $html[] = '<td class="calendar-td '.$day->getClassName().' past-date border">';
                }else{
                $html[] = '<td class="calendar-td '.$day->getClassName().' border">';
                }

                $html[] = $day->render();

                if(in_array($day->everyDay(), $day->authReserveDay())){$reservePartNum = $day->authReserveDate($day->everyDay())->first()->setting_part;

                    $reservePartLabel = '';
                    if($reservePartNum == 1){
                        $reservePartLabel = "リモ1部";
                    }else if($reservePartNum == 2){
                        $reservePartLabel = "リモ2部";
                    }else if($reservePartNum == 3){
                        $reservePartLabel = "リモ3部";
                    }

                    if($startDay <= $day->everyDay() && $toDay >= $day->everyDay()){
                        $html[] = '<p class="m-auto p-0 w-75 day_part">'. $reservePartNum .'部参加</p>';
                        $html[] = '<input type="hidden" name="getPart[]" value="" form="reserveParts">';
                    }else{
                        $html[] = '<button type="button" class="btn btn-danger p-0 w-75 open-cancel-modal"
                                    data-date="'. $day->everyDay() .'"
                                    data-part="'. $reservePartNum .'"
                                    style="font-size:12px">' . $reservePartLabel . '</button>';
                        $html[] = '<input type="hidden" name="getPart[]" value="" form="reserveParts">';
                    }
                }else{
                    if($startDay <= $day->everyDay() && $toDay >= $day->everyDay()){
                        $html[] = '<p class="m-auto p-0 w-75 day_part">受付終了</p>';
                        $html[] = '<input type="hidden" name="getPart[]" value="" form="reserveParts">';
                    }else{
                        $html[] = $day->selectPart($day->everyDay());
                    }
                }
                $html[] = $day->getDate();
                $html[] = '</td>';
            }
            $html[] = '</tr>';
        }
        $html[] = '</tbody>';
        $html[] = '</table>';
        $html[] = '</div>';
        $html[] = '<form action="/reserve/calendar" method="post" id="reserveParts">'.csrf_field().'</form>';
        $html[] = '<form action="/delete/calendar" method="post" id="deleteParts">'.csrf_field().'</form>';

        return implode('', $html);
    }

    protected function getWeeks(){
        $weeks = [];
        $firstDay = $this->carbon->copy()->firstOfMonth();
        $lastDay = $this->carbon->copy()->lastOfMonth();
        $week = new CalendarWeek($firstDay->copy());
        $weeks[] = $week;
        $tmpDay = $firstDay->copy()->addDay(7)->startOfWeek();
        while($tmpDay->lte($lastDay)){
            $week = new CalendarWeek($tmpDay, count($weeks));
            $weeks[] = $week;
            $tmpDay->addDay(7);
            }
        return $weeks;
    }
}
