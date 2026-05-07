<x-sidebar>
<div class="vh-100 d-flex" style="align-items:center; justify-content:center;">
    <div class="w-50 m-auto h-75">
        <p><span>{{ \Carbon\Carbon::parse($date)->format('Y年m月d日') }}</span><span class="ml-3">{{ $part }}部</span></p>
        <div class="h-75 border">
            <table class="">
                <tr class="text-center">
                    <th class="w-25">ID</th>
                    <th class="w-25">名前</th>
                    <th class="w-25">場所</th>
                </tr>

            </table>
        </div>
    </div>
</div>
</x-sidebar>
