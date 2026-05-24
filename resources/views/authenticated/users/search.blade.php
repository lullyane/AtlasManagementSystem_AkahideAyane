<x-sidebar>
<div class="w-100 h-100 d-flex">
    <div class="user_search_wrapper w-75">
        <div class="user_search_container">
            @foreach($users as $user)
            <div class="border one_person bg-white shadow border_radius ">
                <div>
                    <span>ID : </span><span>{{ $user->id }}</span>
                </div>
                <div class="register_information">
                    <div>
                        <span>名前 : </span>
                        <a href="{{ route('user.profile', ['id' => $user->id]) }}">
                            <span class="bold sidebar_color">{{ $user->over_name }}</span>
                            <span class="bold sidebar_color">{{ $user->under_name }}</span>
                        </a>
                    </div>
                    <div>
                        <span>カナ : </span>
                        <span class="bold">({{ $user->over_name_kana }}</span>
                        <span class="bold">{{ $user->under_name_kana }})</span>
                    </div>
                    <div>
                        @if($user->sex == 1)
                        <span>性別 : </span><span class="bold">男</span>
                        @elseif($user->sex == 2)
                        <span>性別 : </span><span class="bold">女</span>
                        @else
                        <span>性別 : </span><span class="bold">その他</span>
                        @endif
                    </div>
                    <div>
                        <span>生年月日 : </span><span class="bold">{{ $user->birth_day }}</span>
                    </div>
                    <div>
                        @if($user->role == 1)
                        <span>役職 : </span><span class="bold">教師(国語)</span>
                        @elseif($user->role == 2)
                        <span>役職 : </span><span class="bold">教師(数学)</span>
                        @elseif($user->role == 3)
                        <span>役職 : </span><span class="bold">講師(英語)</span>
                        @else
                        <span>役職 : </span><span class="bold">生徒</span>
                        @endif
                    </div>
                    @if($user->role == 4)
                    <div>
                        <span>選択科目 : </span class="bold">@foreach($user->subjects as $subject)<span>{{ $subject->subject }}</span>
                        @endforeach
                    </div>
                    @endif
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <div class="search_area_wrapper d-flex w-25 h-100 border">
        <div class="search_area_container w-75 mx-auto mt-5 d-flex flex-column">
            <div class="d-flex flex-column w-100 mb-2">
                <level class="mb-1">検索</level>
                <input type="text" class="free_word search_box" name="keyword" placeholder="    キーワードを検索" form="userSearchRequest">
            </div>
            <div class="d-flex flex-column w-100 mb-2">
                <level class="mb-1">カテゴリ</level>
                <select form="userSearchRequest" name="category" class="search_box w-50 pl-3">
                    <option value="name">名前</option>
                    <option value="id">社員ID</option>
                </select>
            </div>
            <div class="d-flex flex-column w-100 mb-4">
                <label class="mb-1">並び替え</label>
                <select name="updown" form="userSearchRequest" class="search_box w-50 pl-3">
                    <option value="ASC">昇順</option>
                    <option value="DESC">降順</option>
                </select>
            </div>
            <div class="w-100 h-auto mb-4">
                <div class="search_conditions_wrapper d-flex justify-content-between">
                    <p class="m-0"><span>検索条件の追加</span></p>
                    <div class="search_conditions chevron pt-1 mr-2">
                        <span></span>
                        <span></span>
                    </div>
                </div>
                <div class="search_conditions_inner">
                    <div class="my-2">
                        <label class="d-flex m-0 mb-1">性別</label>
                        <span>男</span><input type="radio" name="sex" value="1" form="userSearchRequest">
                        <span>女</span><input type="radio" name="sex" value="2" form="userSearchRequest">
                        <span>その他</span><input type="radio" name="sex" value="3" form="userSearchRequest">
                    </div>
                    <div class="mb-2">
                        <label class="d-flex m-0 mb-1">権限</label>
                        <select name="role" form="userSearchRequest" class="engineer search_box">
                            <option selected disabled>----</option>
                            <option value="1">教師(国語)</option>
                            <option value="2">教師(数学)</option>
                            <option value="3">教師(英語)</option>
                            <option value="4" class="">生徒</option>
                        </select>
                    </div>
                    <div class="selected_engineer mb-3">
                        <label class="d-flex m-0 mb-1">選択科目</label>
                        <span>国語</span><input type="checkbox" name="subject[]" value="1" form="userSearchRequest">
                        <span>数学</span><input type="checkbox" name="subject[]" value="2" form="userSearchRequest">
                        <span>英語</span><input type="checkbox" name="subject[]" value="3" form="userSearchRequest">
                    </div>
                </div>
            </div>
            <div class="w-100 mb-4">
                <input type="submit" name="search_btn" value="検索" form="userSearchRequest" class="user_search_btn w-100">
            </div>
            <div class="w-100">
                <input type="reset" value="リセット" form="userSearchRequest" class="reset_btn">
            </div>
        </div>
        <form action="{{ route('user.show') }}" method="get" id="userSearchRequest"></form>
    </div>
</div>
</x-sidebar>
