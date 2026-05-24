<?php
namespace App\Calendars\Admin;
use Carbon\Carbon;
use App\Models\Users\User;

class CalendarView{
    private $carbon;

    function __construct($date){
        $this->carbon = new Carbon($date);
    }

    public function getTitle(){
        return $this->carbon->format('Y年n月');
    }

    public function render(){
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
        $html[] = '<th class="border day_sat">土</th>';
        $html[] = '<th class="border day_sun">日</th>';
        $html[] = '</tr>';
        $html[] = '</thead>';
        $html[] = '<tbody>';

        $weeks = $this->getWeeks();

        foreach($weeks as $week){
            $html[] = '<tr class="'.$week->getClassName().'">';
            $days = $week->getDays();
            foreach($days as $day){
                $startDay = $this->carbon->format("Y-m-01");
                $toDay = $this->carbon->format("Y-m-d");
                if($startDay <= $day->everyDay() && $toDay >= $day->everyDay()){
                $html[] = '<td class="calendar_td '.$day->getClassName().' past_day border calendar_layout">';
                $html[] = '<div class="days_container">';
                }else{
                $html[] = '<td class="calendar_td '.$day->getClassName().' border calendar_layout">';
                $html[] = '<div class="days_container">';
                }
                $html[] = $day->render();
                $html[] = $day->dayPartCounts($day->everyDay());
                $html[] = '</div>';
                $html[] = '</td>';
            }
            $html[] = '</tr>';
        }
        $html[] = '</tbody>';
        $html[] = '</table>';
        $html[] = '</div>';

        return implode("", $html);
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
