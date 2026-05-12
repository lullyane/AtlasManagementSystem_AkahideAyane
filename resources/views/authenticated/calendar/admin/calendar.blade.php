<x-sidebar>
<div class="py-4">
    <div class="border m-auto py-4 border_radius bg-white shadow calendar_layout">
        <div class="border-0 mx-4">
            <p class="text-center">{{ $calendar->getTitle() }}</p>
            <div class="w-100">
                {!! $calendar->render() !!}
            </div>
        </div>
    </div>
</div>
</x-sidebar>
