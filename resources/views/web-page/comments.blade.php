<div class="lg:col-span-3">
    <div class="border-b border-gray-300">
        <nav class="flex gap-4">
            <a href="#" title=""
                class="border-b-2 border-gray-900 py-4 text-sm font-medium text-gray-900 hover:border-gray-400 hover:text-gray-800">
                Description </a>

            <a href="#" title=""
                class="inline-flex items-center border-b-2 border-transparent py-4 text-sm font-medium text-gray-600">
                Reviews
                <span
                    class="ml-2 block rounded-full bg-gray-500 px-2 py-px text-xs font-bold text-gray-100">
                    1,209 </span>
            </a>
        </nav>
    </div>

    <div class="mt-8 flow-root sm:mt-12">
        @foreach ($details as $detail)
            @if ($loop->first)
                <h1 class="text-3xl font-bold">#1. {{ $detail->detail_name }}</h1>
            @else
                <h1 class="text-3xl font-bold">#{{ $loop->index }}. {{ $detail->detail_name }}</h1>
            @endif

            <p>
                <img src="{{ asset('storage/' . $detail->image) }}" alt="" class="img-fluid">
            </p>
            <p class="mt-4">
                {{ Illuminate\Support\Str::limit(strip_tags($detail->description), 50, '...') }}</p>
        @endforeach

    </div>
</div>