<x-sidebar>
<div>
    <div class="border-0 my-4 mx-auto py-3 px-5 border_radius bg-white shadow calendar_size">
        <div>
            <p class="text-center mt-2 mb-1">{{ $calendar->getTitle() }}</p>
        </div>
        <div>
            {!! $calendar->render() !!}
        </div>
        <div class="adjust_table-btn w-100 mt-1 text-right">
            <input type="submit" class="btn btn-primary" value="登録" form="reserveSetting" onclick="return confirm('登録してよろしいですか？')">
        </div>
    </div>
</div>
</x-sidebar>
