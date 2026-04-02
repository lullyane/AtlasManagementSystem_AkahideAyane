<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use DB;

use App\Models\Users\Subjects;
use App\Models\Users\User;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $subjects = Subjects::all();
        return view('auth.register.register', compact('subjects'));
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $old_year = $request->old_year;
        $old_month = $request->old_month;
        $old_day = $request->old_day;
        $data = $old_year . '-' . $old_month . '-' . $old_day;
        $birth_day = date('Y-m-d', strtotime($data));
        $subjects = $request->subject;

        $request->merge([
            'birth_day' => $data
            ]);

        $request->validate([
            'over_name' => ['required','regex:/^[ぁ-んァ-ヶー一-龠々A-Za-z]+$/u','max:10'],
            'under_name' => ['required','regex:/^[ぁ-んァ-ヶー一-龠々A-Za-z]+$/u','max:10'],
            'over_name_kana' => ['required','regex:/\A[ァ-ヶー]+\z/u','max:30'],
            'under_name_kana' => ['required','regex:/\A[ァ-ヶー]+\z/u','max:30'],
            'mail_address' => ['required','email','unique:users,mail_address','max:100'],
            'sex' => ['required','in:1,2,3'],
            'birth_day' => ['required','date','after_or_equal:2000-01-01','before_or_equal:today'],
            'role' => ['required','in:1,2,3,4'],
            'password' => ['required','alpha_num','between:8,30','confirmed']
            ],[
                'over_name.required' => '名前（姓）は必ず入力してください。',
                'over_name.regex' => '名前（姓）に数字や記号は使用できません。',
                'over_name.max' => '名前（姓）は10文字以内で入力してください。',

                'under_name.required' => '名前（名）は必ず入力してください。',
                'under_name.regex' => '名前（名）に数字や記号は使用できません。',
                'under_name.max' => '名前（名）は10文字以内で入力してください。',

                'over_name_kana.required' => 'フリガナ（セイ）は必ず入力してください。',
                'over_name_kana.regex' => 'フリガナ（セイ）はカタカナで入力してください。',
                'over_name_kana.max' => 'フリガナ（セイ）は30文字以内で入力してください。',

                'under_name_kana.required' => 'フリガナ（メイ）は必ず入力してください。',
                'under_name_kana.regex' => 'フリガナ（メイ）はカタカナで入力してください。',
                'under_name_kana.max' => 'フリガナ（メイ）は30文字以内で入力してください。',

                'mail_address.required' => 'メールアドレスは必ず入力してください。',
                'mail_address.email' => 'メールアドレスの形式で入力してください（例：example@domain.com）',
                'mail_address.max' => 'メールアドレスは100文字以内で入力してください。',
                'mail_address.unique' => 'このメールアドレスは既に登録されています。',

                'sex.required' => '性別は必ず選択してください。',
                'sex.in' => '男性、女性、その他のいずれかを選択してください。',

                'birth_day.required' => '生年月日は必ず選択してください。',
                'birth_day.date' => '生年月日は実在する日付を指定してください。',
                'birth_day.after_or_equal' => '生年月日は2000年1月1日以降の日付を指定してください。',
                'birth_day.before_or_equal' => '生年月日は過去の日付を指定してください。',

                'role.required' => '役職は必ず選択してください。',
                'role.in' => '「教師(国語)、教師(数学)、教師(英語)、生徒」のいずれかを選択してください。',

                'password.required' => 'パスワードは必ず入力してください。',
                'password.alpha_num' => 'パスワードは英数字のみ使用できます。',
                'password.between' => 'パスワードは8文字以上30文字以内で入力してください。',
                'password.confirmed' => 'パスワード確認が一致していません。',
                ]);

        try{
            DB::beginTransaction();

            $user_get = User::create([
                'over_name' => $request->over_name,
                'under_name' => $request->under_name,
                'over_name_kana' => $request->over_name_kana,
                'under_name_kana' => $request->under_name_kana,
                'mail_address' => $request->mail_address,
                'sex' => $request->sex,
                'birth_day' => $birth_day,
                'role' => $request->role,
                'password' => bcrypt($request->password)
            ]);
            if($request->role == 4){
                $user = User::findOrFail($user_get->id);
                $user->subjects()->attach($subjects);
            }
            DB::commit();
            return view('auth.login.login');
        }catch(\Exception $e){
            DB::rollback();
            return redirect()->route('loginView');
        }
    }
}
