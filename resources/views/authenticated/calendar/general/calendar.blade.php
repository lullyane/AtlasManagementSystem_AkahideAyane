<x-sidebar>
<div class="vh-100 pt-4">
    <div class="border m-auto py-4 border_radius bg-white shadow calendar_layout">
        <div class="border-0 mx-4">
            <p class="text-center">{{ $calendar->getTitle() }}</p>
            <div class="w-100">
                {!! $calendar->render() !!}
            </div>
            <div class="text-right w-100">
                <input type="submit" class="btn btn-primary" value="予約する" form="reserveParts">
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
    </div>
</div>
</x-sidebar>
