<x-guest-layout>
    <form action="{{ route('loginPost') }}" method="POST">
        <div class="w-100 vh-100 d-flex flex-column align-items-center justify-content-center">
            <img class="atlas_logo_size pb-5" src="/image/atlas-black.png" alt="Atlas ロゴ">
            <div class="border vh-50 px-3 bg-white shadow auth_border_radius login_form_with">
                <div class="w-75 m-auto pt-5">
                    <label class="d-block m-0 auth_font_size">メールアドレス</label>
                    <div class="border-bottom border-primary w-100">
                        <input type="text" class="w-100 border-0" name="mail_address">
                    </div>
                </div>
                <div class="w-75 m-auto pt-4">
                    <label class="d-block m-0 auth_font_size">パスワード</label>
                    <div class="border-bottom border-primary w-100">
                        <input type="password" class="w-100 border-0" name="password">
                    </div>
                </div>
                <div class="text-right m-3">
                    <input type="submit" class="btn btn-primary" value="ログイン">
                </div>
                <div class="text-center pb-3">
                    <a href="{{ route('registerView') }}">新規登録はこちら</a>
                </div>
            </div>
            {{ csrf_field() }}
        </div>
        </form>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="{{ asset('js/register.js') }}" rel="stylesheet"></script>
</x-guest-layout>
