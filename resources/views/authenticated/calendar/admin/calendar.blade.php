<x-sidebar>
<div>
    <div class="border-0 my-4 mx-auto py-3 px-5 border_radius bg-white shadow calendar_size">
        <div>
            <p class="text-center mt-2 mb-1">{{ $calendar->getTitle() }}</p>
        </div>
        <div>
            {!! $calendar->render() !!}
        </div>
    </div>
</div>
</x-sidebar>
