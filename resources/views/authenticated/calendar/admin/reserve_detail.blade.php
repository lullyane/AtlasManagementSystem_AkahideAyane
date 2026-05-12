<x-sidebar>
<div class="vh-100">
    <div class="my-5 mx-auto w-75">
        <p><span>{{ \Carbon\Carbon::parse($date)->format('Y年m月d日') }}</span><span class="ml-3">{{ $part }}部</span></p>
        <div class="d-flex justify-content-between border border_radius bg-white shadow p-2">
            <table class="table table-sm w-100 m-0">
                <thead>
                    <tr class="text-center reserve_table_header">
                        <th>ID</th>
                        <th>名前</th>
                        <th>場所</th>
                    </tr>
                </thead>
                <tbody class="reserve_table_body">
                @if($reserve && $reserve->users->isNotEmpty())
                @foreach($reserve->users as $user)
                    <tr class="text-center">
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->over_name }} {{ $user->under_name }}</td>
                        <td>リモート</td>
                    </tr>
                @endforeach
                @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
</x-sidebar>
