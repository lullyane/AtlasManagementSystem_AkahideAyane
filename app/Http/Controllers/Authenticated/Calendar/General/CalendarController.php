<?php

namespace App\Http\Controllers\Authenticated\Calendar\General;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Calendars\General\CalendarView;
use App\Models\Calendars\ReserveSettings;
use App\Models\Calendars\Calendar;
use App\Models\USers\User;
use Auth;
use DB;

class CalendarController extends Controller
{
    public function show(){
        $calendar = new CalendarView(time());
        return view('authenticated.calendar.general.calendar', compact('calendar'));
    }

    public function reserve(Request $request){
        DB::beginTransaction();
        try{
            $getPart = $request->getPart;
            $getDate = $request->getData;

                    while (count($getPart) < count($getDate)) {
            array_unshift($getPart, "");
        }

            $reserveDays = array_filter(array_combine($getDate, $getPart));
            foreach($reserveDays as $key => $value){
                $reserve_settings = ReserveSettings::firstOrCreate(
                [
                    'setting_reserve' => $key,
                    'setting_part' => $value,
                ],
                [
                    'limit_users' => 20, // 初期値
                ]
            );
                $reserve_settings->decrement('limit_users');
                $reserve_settings->users()->attach(Auth::id());
            }
            DB::commit();
        }catch(\Exception $e){
            DB::rollback();
        }
        return redirect()->route('calendar.general.show', ['user_id' => Auth::id()]);
    }

public function delete(Request $request)
{
    DB::beginTransaction();
    try {
        $date = $request->date;
        $part = $request->part;
        $user_id = Auth::id();

        // ① 対象の予約枠を取得
        $setting = ReserveSettings::where('setting_reserve', $date)
            ->where('setting_part', $part)
            ->first();

        // 枠が存在しない場合は何もせず戻る
        if (!$setting) {
            DB::rollBack();
            return redirect()->route('calendar.general.show', ['user_id' => $user_id]);
        }

        // ② pivot から「このユーザーだけ」削除
        $setting->users()->detach($user_id);

        // ③ limit_users を 1 つ戻す
        $setting->increment('limit_users');

        DB::commit();

        return redirect()->route('calendar.general.show', ['user_id' => $user_id]);

    } catch (\Exception $e) {
        DB::rollBack();
        return redirect()->route('calendar.general.show', ['user_id' => Auth::id()]);
    }
}



}
