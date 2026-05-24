<x-sidebar>
<div>
    <div class="border-0 my-4 mx-auto py-3 px-5 border_radius bg-white shadow calendar_size">
        <div>
            <p class="text-center mt-2 mb-1">{{ $calendar->getTitle() }}</p>
        </div>
        <div>
            {!! $calendar->render() !!}
        </div>
        <div class="d-flex justify-content-end">
            <input type="submit" class="btn btn-primary" value="予約する" form="reserveParts">
        </div>
    </div>
</div>
<div class="modal fade" id="cancelModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <p>以下の予約をキャンセルしてもよろしいですか</p>
                <p>予約日：<span id="cancelDate"></span></p>
                <p>時間：リモ<span id="cancelPart"></span>部</p>
                <form id="deleteCalendar" method="POST" action="{{ route('deleteParts') }}">
                    @csrf
                    <input type="hidden" name="date" id="cancel_date_input">
                    <input type="hidden" name="part" id="cancel_part_input">
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">閉じる</button>
                <button type="submit" form="deleteCalendar" class="btn btn-danger">キャンセルする</button>
            </div>
        </div>
    </div>
</div>
</x-sidebar>
