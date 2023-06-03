<a href="{{ route('document.detail', ['slug' => $document->slug]) }}"
   class="w-full md:w-1/2 lg:w-1/3 mb-4 md:mb-6 px-6">
    <div
        class="flex flex-row gap-4 border border-slate-300 border-solid rounded-lg px-8 py-5 mb-2.5 hover:shadow-card">
        <div class="aspect-[3/4] bg-slate-100 min-w-[50px] md:max-w-[120px] md:min-w-[120px]">
            <img src="https://picsum.photos/500" alt=""
                 class="max-w-full h-full object-cover">
        </div>
        <div class="grow flex flex-col justify-around">
            <h2 class="text-primary font-semibold line-clamp-1 md:line-clamp-3">{{ $document->title }}</h2>
            <p class="text-text-default font-thin text-sm my-2 line-clamp-2 md:line-clamp-4">{{ $document->description }}</p>

            <div class="flex gap-10 font-light text-default-lighter">
                <div class="inline-flex items-center gap-2">
                    <i class="fa-solid fa-file"></i>
                    <span>{{ $document->page_number }}</span>

                </div>
                <div class="inline-flex items-center gap-2">
                    <i class="fa-solid fa-cloud-arrow-down"></i>
                    <span>{{ $document->downloaded_count }}</span>

                </div>
                <div class="inline-flex items-center gap-2">
                    <i class="fa-solid fa-eye"></i>
                    <span>{{ $document->viewed_count }}</span>

                </div>
            </div>

        </div>

    </div>
</a>
