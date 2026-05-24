<x-sidebar>
<div class="vh-100 border">
    <p class="m-2">
        <span>{{ $user->over_name }}</span><span>{{ $user->under_name }}さんのプロフィール</span>
    </p>
    <div class="top_area w-75 m-auto pt-5">
        <div class="user_status p-3">
            <p>名前 : <span>{{ $user->over_name }}</span><span class="ml-1">{{ $user->under_name }}</span></p>
            <p>カナ : <span>{{ $user->over_name_kana }}</span><span class="ml-1">{{ $user->under_name_kana }}</span></p>
            <p>性別 : @if($user->sex == 1)<span>男</span>@else<span>女</span>@endif</p>
            <p>生年月日 : <span>{{ $user->birth_day }}</span></p>
            <div class="mb-3">選択科目 :
                @foreach($user->subjects as $subject)
                <span>{{ $subject->subject }}</span>
                @endforeach
            </div>
            <div class="">
                @can('admin')
                <div class="course_register d-flex justify-content-start aline-item-center">
                    <span class="mr-2 sidebar_color">選択科目の登録</span>
                    <div class="chevron subject_edit_btn pt-1">
                        <span></span>
                        <span></span>
                    </div>
                </div>
                <div class="subject_inner mt-3">
                    <form action="{{ route('user.edit') }}" method="post">
                        <div class="row ml-0">
                            <div class="col-auto p-0 d-flex align-items-center">
                                @foreach($subject_lists as $subject_list)
                                <label class="m-0">{{ $subject_list->subject }}</label>
                                <input class="mr-1" type="checkbox" name="subjects[]" value="{{ $subject_list->id }}">
                                @endforeach
                                <input type="submit" value="登録" class="btn btn-primary">
                                <input type="hidden" name="user_id" value="{{ $user->id }}">
                            </div>
                        </div>
                        {{ csrf_field() }}
                    </form>
                </div>
                @endcan
            </div>
        </div>
    </div>
</div>

</x-sidebar>
