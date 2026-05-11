<x-guest-layout>
<form action="{{ route('registerPost') }}" method="POST">
    <div class="w-100 d-flex m-5 justify-content-center">
        <div class="vh-75 px-3 bg-white shadow border_radius register_form_with">
            <div class="p-4">
                @if ($errors->has('over_name'))
                    @foreach ($errors->get('over_name') as $error)
                        <li class="text-danger auth_font_size">{{ $error }}</li>
                    @endforeach
                @endif
                @if ($errors->has('under_name'))
                    @foreach ($errors->get('under_name') as $error)
                        <li class="text-danger auth_font_size">{{ $error }}</li>
                    @endforeach
                @endif
                <div class="d-flex justify-content-between mt-3">
                    <div class="name_border">
                        <label class="d-block m-0 auth_font_size">姓</label>
                        <div class="border-bottom border-primary w-100">
                            <input type="text" class="border-0 over_name" name="over_name">
                        </div>
                    </div>
                    <div class="name_border">
                        <label class=" d-block m-0 auth_font_size">名</label>
                        <div class="border-bottom border-primary w-100">
                            <input type="text" class="border-0 under_name" name="under_name">
                        </div>
                    </div>
                </div>
                @if ($errors->has('over_name_kana'))
                    @foreach ($errors->get('over_name_kana') as $error)
                        <li class="text-danger auth_font_size">{{ $error }}</li>
                    @endforeach
                @endif
                @if ($errors->has('under_name_kana'))
                    @foreach ($errors->get('under_name_kana') as $error)
                        <li class="text-danger auth_font_size">{{ $error }}</li>
                    @endforeach
                @endif
                <div class="d-flex mt-3 justify-content-between">
                    <div class="name_border">
                        <label class="d-block m-0 auth_font_size">セイ</label>
                        <div class="border-bottom border-primary w-100">
                            <input type="text" class="border-0 over_name_kana" name="over_name_kana">
                        </div>
                    </div>
                    <div class="name_border">
                        <label class="d-block m-0 auth_font_size">メイ</label>
                        <div class="border-bottom border-primary w-100">
                            <input type="text" class="border-0 under_name_kana" name="under_name_kana">
                        </div>
                    </div>
                </div>
                @if ($errors->has('mail_address'))
                    @foreach ($errors->get('mail_address') as $error)
                        <li class="text-danger auth_font_size">{{ $error }}</li>
                    @endforeach
                @endif
                <div class="mt-3">
                    <label class="m-0 d-block auth_font_size">メールアドレス</label>
                    <div class="border-bottom border-primary">
                        <input type="mail" class="w-100 border-0 mail_address" name="mail_address">
                    </div>
                </div>
                @if ($errors->has('sex'))
                    @foreach ($errors->get('sex') as $error)
                        <li class="text-danger auth_font_size">{{ $error }}</li>
                    @endforeach
                @endif
                <div class="mt-3 d-flex justify-content-center">
                    <div>
                        <input type="radio" name="sex" class="sex" value="1">
                        <label class="auth_font_size">男性</label>
                    </div>
                    <div class="sex_margin">
                        <input type="radio" name="sex" class="sex" value="2">
                        <label class="auth_font_size">女性</label>
                    </div>
                    <div>
                        <input type="radio" name="sex" class="sex" value="3">
                        <label class="auth_font_size">その他</label>
                    </div>
                </div>
                @if ($errors->has('birth_day'))
                    @foreach ($errors->get('birth_day') as $error)
                        <li class="text-danger auth_font_size">{{ $error }}</li>
                    @endforeach
                @endif
                <div class="mt-3">
                    <label class="d-block m-0 auth_font_size">生年月日</label>
                    <div class="d-flex justify-content-center">
                        <div>
                            <select class="border-bottom border-primary birth_day_border old_year" name="old_year">
                                <option value="none">-----</option>
                                <option value="1985">1985</option>
                                <option value="1986">1986</option>
                                <option value="1987">1987</option>
                                <option value="1988">1988</option>
                                <option value="1989">1989</option>
                                <option value="1990">1990</option>
                                <option value="1991">1991</option>
                                <option value="1992">1992</option>
                                <option value="1993">1993</option>
                                <option value="1994">1994</option>
                                <option value="1995">1995</option>
                                <option value="1996">1996</option>
                                <option value="1997">1997</option>
                                <option value="1998">1998</option>
                                <option value="1999">1999</option>
                                <option value="2000">2000</option>
                                <option value="2001">2001</option>
                                <option value="2002">2002</option>
                                <option value="2003">2003</option>
                                <option value="2004">2004</option>
                                <option value="2005">2005</option>
                                <option value="2006">2006</option>
                                <option value="2007">2007</option>
                                <option value="2008">2008</option>
                                <option value="2009">2009</option>
                                <option value="2010">2010</option>
                            </select>
                            <label class="auth_font_size">年</label>
                        </div>
                        <div class="mx-2">
                            <select class="border-bottom border-primary birth_day_border old_month" name="old_month">
                                <option value="none">-----</option>
                                <option value="01">1</option>
                                <option value="02">2</option>
                                <option value="03">3</option>
                                <option value="04">4</option>
                                <option value="05">5</option>
                                <option value="06">6</option>
                                <option value="07">7</option>
                                <option value="08">8</option>
                                <option value="09">9</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                            </select>
                            <label class="auth_font_size">月</label>
                        </div>
                        <div>
                            <select class="border-bottom border-primary birth_day_border old_day" name="old_day">
                                <option value="none">-----</option>
                                <option value="01">1</option>
                                <option value="02">2</option>
                                <option value="03">3</option>
                                <option value="04">4</option>
                                <option value="05">5</option>
                                <option value="06">6</option>
                                <option value="07">7</option>
                                <option value="08">8</option>
                                <option value="09">9</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                                <option value="13">13</option>
                                <option value="14">14</option>
                                <option value="15">15</option>
                                <option value="16">16</option>
                                <option value="17">17</option>
                                <option value="18">18</option>
                                <option value="19">19</option>
                                <option value="20">20</option>
                                <option value="21">21</option>
                                <option value="22">22</option>
                                <option value="23">23</option>
                                <option value="24">24</option>
                                <option value="25">25</option>
                                <option value="26">26</option>
                                <option value="27">27</option>
                                <option value="28">28</option>
                                <option value="29">29</option>
                                <option value="30">30</option>
                                <option value="31">31</option>
                            </select>
                            <label class="auth_font_size">日</label>
                        </div>
                    </div>
                </div>
                @if ($errors->has('role'))
                    @foreach ($errors->get('role') as $error)
                        <li class="text-danger auth_font_size">{{ $error }}</li>
                    @endforeach
                @endif
                <div class="mt-3">
                    <label class="d-block m-0 auth_font_size">役職</label>
                    <div class="d-flex justify-content-between">
                        <div>
                            <input type="radio" name="role" class="admin_role role" value="1">
                            <label class="auth_font_size">教師(国語)</label>
                        </div>
                        <div>
                            <input type="radio" name="role" class="admin_role role" value="2">
                            <label class="auth_font_size">教師(数学)</label>
                        </div>
                        <div>
                            <input type="radio" name="role" class="admin_role role" value="3">
                            <label class="auth_font_size">教師(英語)</label>
                        </div>
                        <div>
                            <input type="radio" name="role" class="other_role role" value="4">
                            <label class="auth_font_size">生徒</label>
                        </div>
                    </div>
                </div>
                <div class="select_teacher d-none">
                    <label class="d-block m-0 auth_font_size">選択科目</label>
                    @foreach($subjects as $subject)
                    <div class="">
                        <input type="checkbox" name="subject[]" value="{{ $subject->id }}">
                        <label>{{ $subject->subject }}</label>
                    </div>
                    @endforeach
                </div>
                @if ($errors->has('password'))
                    @foreach ($errors->get('password') as $error)
                        <li class="text-danger auth_font_size">{{ $error }}</li>
                    @endforeach
                @endif
                <div class="mt-3">
                    <label class="d-block m-0 auth_font_size">パスワード</label>
                    <div class="border-bottom border-primary">
                        <input type="password" class="border-0 w-100 password" name="password">
                    </div>
                </div>
                <div class="mt-3">
                    <label class="d-block m-0 auth_font_size">確認用パスワード</label>
                    <div class="border-bottom border-primary">
                        <input type="password" class="border-0 w-100 password_confirmation" name="password_confirmation">
                    </div>
                </div>
                <div class="mt-3 text-right">
                    <input type="submit" class="btn btn-primary register_btn" disabled value="新規登録" onclick="return confirm('登録してよろしいですか？')">
                </div>
                <div class="text-center">
                    <a href="{{ route('loginView') }}">ログインはこちら</a>
                </div>
            </div>
            {{ csrf_field() }}
        </div>
    </div>
</form>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="{{ asset('js/register.js') }}" rel="stylesheet"></script>
</x-guest-layout>
