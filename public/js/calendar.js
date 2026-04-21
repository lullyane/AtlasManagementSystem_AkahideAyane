$(function () {
    // スクール予約確認とスクール枠登録の項目を講師アカウントにのみ表示させる
    const adminLinks = document.querySelectorAll('a[href*="admin"]');

    adminLinks.forEach(Link => {
        const p = Link.closest('p');
        const url = new URL(Link.href);
        const role = Number(url.searchParams.get('role'));
        if (![1, 2, 3].includes(role)) {
            p.style.display = 'none';
        }
    })

    // 過去日の背景色をグレーにする
    const today = new Date();
    const todayBase = new Date(today.getFullYear(), today.getMonth(), today.getDate());

    document.querySelectorAll('.calendar-td').forEach(td => {
        const hidden = td.querySelector('input[name="getData[]"]');
        if (!hidden) return;
        const cellDate = new Date(hidden.value);
        if (cellDate < todayBase) {
            td.classList.add('past-date');
        }
    });

    // 予約キャンセルモーダル
    $(document).on('click', '.open-cancel-modal', function () {
        const date = $(this).data('date');
        const part = $(this).data('part');

        $('#cancelDate').text(date);
        $('#cancelPart').text(part);

        $('#cancel_date_input').val(date);
        $('#cancel_part_input').val(part);

        $('#cancelModal').modal('show');
    });
});
