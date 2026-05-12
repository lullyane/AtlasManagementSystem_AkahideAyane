<x-sidebar>
<div class="py-4">
    <div class="border m-auto py-4 border_radius bg-white shadow calendar_layout">
        <div class="border-0 mx-4">
            <p class="text-center">{{ $calendar->getTitle() }}</p>
            <div class="w-100">
                {!! $calendar->render() !!}
            </div>
            <div class="adjust-table-btn w-100 mt-4 text-right">
            <input type="submit" class="btn btn-primary" value="登録" form="reserveSetting" onclick="return confirm('登録してよろしいですか？')">
            </div>
        </div>
    </div>
</div>
</x-sidebar>
