<a href="{{ route('document.detail', ['slug' => $document->slug]) }}" class="w-full md:w-1/2 lg:w-1/3 mb-4 md:mb-6 px-6">
    <div
        class="flex gap-4 border border-slate-300 border-solid rounded-lg px-8 py-5 mb-2.5 hover:shadow-card">
        <div class="w-2/5 aspect-[3/4] bg-slate-100 ">
            <img src="https://picsum.photos/200" alt=""
                 class="max-w-full w-full h-full object-cover">
        </div>
        <div class=" grow  flex flex-col justify-around">
            <h2 class="text-primary font-semibold line-clamp-3">{{ $document->title }}</h2>
              <p class="text-text-default font-thin text-sm py-2 line-clamp-2">{{ $document->categories->first()->name ?? 'Science' }}</p>

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
