@extends('frontend_v4.layouts.master')
@push('before_styles')
@endpush
@push('after_styles')
@endpush

@push('before_scripts')
@endpush

@push('after_scripts')
@endpush
@section('content')
    <div class="bg-white py-8">
        <div
            class="container mx-auto mb-10 px-2 md:px-0 flex justify-between md:gap-6 flex-row md:flex-col flex-wrap text-default-lighter">
            <p class="text-lg md:text-xl lg:text-3xl text-black">Result</p>
            @foreach($documents as $document)
{{--                <a href="{{ route('document.detail', ['slug' => $document->slug]) }}"--}}
{{--                   class="flex flex-col items-center mb-2 border border-solid border-slate-300 hover:border-transparent hover:shadow-hover  md:mb-0  md:gap-8 md:flex-row  md:px-5 md:py-4   rounded md:rounded-3xl basis-[49%] md:basis-full ">--}}
{{--                    <div class=" aspect-[3/4] md:aspect-auto max-w-xs w-full md:basis-3/12 lg:basis-2/12">--}}
{{--                        <img--}}
{{--                            class="h-full  w-full md:h-36 object-cover md:border md:border-slate-300 md:border-solid rounded-tl rounded-tr md:rounded-2xl"--}}
{{--                            src="https://picsum.photos/200" alt="">--}}
{{--                    </div>--}}
{{--                    <div--}}
{{--                        class="bg-slate-200 md:bg-transparent py-6 md:py-0 px-2 md:basis-9/12 lg:basis-10/12 flex flex-1 gap-8 rounded-bl rounded-br">--}}
{{--                        <div class="flex flex-col gap-2 justify-between basis-full md:basis-1/2 grow">--}}
{{--                            <div class="mb-3 md:mb-0 ">--}}
{{--                            <span class="font-medium text-primary text-base line-clamp-4 md:line-clamp-2">--}}
{{--                                {{ $document->title }}--}}
{{--                            </span>--}}
{{--                                <div class="hidden md:block lg:flex gap-8 flex-col lg:flex-row   mt-4 mb-8">--}}
{{--                                <span class="inline-flex  gap-2 items-center   ">--}}
{{--                                    <i class="fa-solid fa-user"></i>--}}
{{--                                    <span class="">{{ $document->user->name }}</span>--}}
{{--                                </span>--}}
{{--                                    <p class="flex gap-2 items-center">--}}
{{--                                        <i class="fa-solid fa-book"></i>--}}

{{--                                        <span class="">Triết học Mac-Lenin</span>--}}
{{--                                    </p>--}}


{{--                                    <span href="" class="flex gap-2 items-center">--}}
{{--                                    <i class="fa-sharp fa-solid fa-book-open"></i>--}}
{{--                                    <span class="">Đại học Quốc gia Hà Nội</span>--}}
{{--                                </span>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="flex  gap-16">--}}
{{--                                <div class="flex items-center gap-6">--}}
{{--                                <span class="inline-flex gap-2.5 items-center">--}}
{{--                                    <i class="fa-solid fa-file"></i>--}}
{{--                                    <span>{{ $document->page_number }}</span>--}}
{{--                                </span>--}}
{{--                                    <span class="inline-flex gap-2.5 items-center ">--}}
{{--                                    <i class="fa-solid fa-cloud-arrow-down"></i>--}}
{{--                                    <span>{{ $document->downloaded_count }}</span>--}}
{{--                                </span>--}}
{{--                                    <span class="inline-flex gap-2.5 items-center">--}}
{{--                                    <i class="fa-solid fa-eye"></i>--}}
{{--                                    <span>{{ $document->viewed_count }}</span>--}}
{{--                                </span>--}}
{{--                                </div>--}}
{{--                                <div class="hidden md:inline-flex gap-2.5 items-center">--}}
{{--                                    <i class="fa-regular fa-calendar"></i>--}}
{{--                                    {{ $document->created_at->toDateString() }}--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="hidden md:flex items-baseline gap-2.5 text-secondary">--}}
{{--                            <i class="fa-solid fa-thumbs-up"></i>--}}

{{--                            <span class="">100%</span>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </a>--}}
                @include('frontend_v4.components.document-list-item')
            @endforeach

        </div>
        <div x-data="{ current_page: 1, total_page: 9 }"
             class=" max-4xl xl:max-w-5xl mx-auto paginator  mt-8  mb-10 flex md:gap-4 items-center justify-center">
            <button :class="current_page !== 1 && 'text-primary'" :disabled="current_page === 1"
                    class="inline-flex items-center gap-4 p-2">
                <i class="fa-solid fa-chevron-left"></i>
                <span class="hidden md:inline-block ">Previous</span>
            </button>
            <a href=""
               class="paginator_item-2 inline-flex text-white bg-primary  items-center rounded-full text-base w-8 h-8 ">
                <span class="grow text-center">1</span>
            </a>
            <a href=""
               class="paginator_item-2 inline-flex text-primary hover:bg-primary hover:text-white  items-center rounded-full text-base w-8 h-8 ">
                <span class="grow text-center">2</span>
            </a> <a href=""
                    class="paginator_item-2 inline-flex text-primary hover:bg-primary hover:text-white  items-center rounded-full text-base w-8 h-8 ">
                <span class="grow text-center">3</span>
            </a> <a href=""
                    class="paginator_item-2 inline-flex text-primary hover:bg-primary hover:text-white  items-center rounded-full text-base w-8 h-8 ">
                <span class="grow text-center">4</span>
            </a> <a href=""
                    class="paginator_item-2 inline-flex text-primary hover:bg-primary hover:text-white  items-center rounded-full text-base w-8 h-8 ">
                <span class="grow text-center">5</span>
            </a> <a href=""
                    class="paginator_item-2 inline-flex text-primary hover:bg-primary hover:text-white  items-center rounded-full text-base w-8 h-8 ">
                <span class="grow text-center">6</span>
            </a> <a href=""
                    class="paginator_item-2 inline-flex text-primary hover:bg-primary hover:text-white  items-center rounded-full text-base w-8 h-8 ">
                <span class="grow text-center">7</span>
            </a>
            <a href=""
               class="paginator_item-2 inline-flex text-primary hover:bg-primary hover:text-white  items-center rounded-full text-base w-8 h-8 ">
                <span class="grow text-center">8</span>
            </a>
            <a href=""
               class="paginator_item-2 inline-flex text-primary hover:bg-primary hover:text-white  items-center rounded-full text-base w-8 h-8 ">
                <span class="grow text-center">9</span>
            </a>

            <button :disabled="current_page !== total_page" :class="current_page !== total_page && 'text-primary'"
                    class="inline-flex items-center gap-4 p-2">
                <span class="hidden md:inline-block ">Next</span>
                <i class="fa-solid fa-chevron-right"></i>
            </button>
        </div>
        <div class=" py-8 md:py-16 bg-[#FFEABF]"
             style="background-image: url('{{ asset('assets_v4/images/thumnail-bg-text.png') }}')">
            <h2 class="text-base md:text-3.25xl font-medium w-3/4 mx-auto text-center">
                Upload more documents and download any material studies right away!
            </h2>
        </div>
    </div>
@endsection
