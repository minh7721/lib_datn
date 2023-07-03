@extends('frontend_v4.layouts.master')
@push('before_styles')
@endpush

@push('after_styles')
@endpush

@push('before_scripts')
@endpush

@section('content')
    <div class="bg-white px-4 ">
        <div class="container border-b border-gray-300 mx-auto py-2 md:py-8">
            <h1 class="mx-auto text-sm sm:text-2xl md:text-3xl font-medium mb-4 md:mb-6">{{ $tag->name }}</h1>
            <div class="flex gap-4 font-light text-sm sm:text-lg">
                <a href="{{ route('document.home.index') }}" class="text-primary">Home</a>
                <span class="text-default-lighter">
                    <i class="fa-solid fa-angle-right text-sm"></i>
                </span>
                <a class="text-default-lighter">{{ $tag->name }}</a>
            </div>
        </div>
    </div>
    <div class="bg-white px-4">
        <div class="container mx-auto pt-2 md:pt-5 pb-5 md:pb-11">
            <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-2 sm:mb-6"
                 x-data="filterData">
                <div class=" p-2 font-medium text-xs sm:text-base">Showing {{ count($documents) }} documents</div>
            </div>
            <div class="w-full flex md:flex-col flex-wrap gap-4 justify-around mb-11">
                @foreach($documents as $document)
                    @include('frontend_v4.components.document-list-item')
                @endforeach
            </div>
            <div
                class=" max-4xl xl:max-w-5xl mx-auto paginator  my-1 md:my-4 lg:mt-8 flex md:gap-4 items-center justify-center">
                <a href="" class="inline-flex items-center gap-3 p-2 text-slate-300 text-sm md:text-base">
                    <i class="fa-solid fa-chevron-left"></i>
                    <span class="leading-8">Previous</span>
                </a>
                <div class="hidden md:flex gap-2">
                    <a href=""
                       class="paginator_item-2 inline-flex text-white bg-primary  items-center rounded-full text-base w-8 h-8 ">
                        <span class="grow text-center">1</span>
                    </a>
                    <a href=""
                       class="paginator_item-2 inline-flex text-primary hover:bg-[#E6F7F4]  items-center rounded-full text-base w-8 h-8 ">
                        <span class="grow text-center">2</span>
                    </a> <a href=""
                            class="paginator_item-2 inline-flex text-primary hover:bg-[#E6F7F4]  items-center rounded-full text-base w-8 h-8 ">
                        <span class="grow text-center">3</span>
                    </a> <a href=""
                            class="paginator_item-2 inline-flex text-primary hover:bg-[#E6F7F4]  items-center rounded-full text-base w-8 h-8 ">
                        <span class="grow text-center">4</span>
                    </a> <a href=""
                            class="paginator_item-2 inline-flex text-primary hover:bg-[#E6F7F4]  items-center rounded-full text-base w-8 h-8 ">
                        <span class="grow text-center">5</span>
                    </a> <a href=""
                            class="paginator_item-2 inline-flex text-primary hover:bg-[#E6F7F4]  items-center rounded-full text-base w-8 h-8 ">
                        <span class="grow text-center">6</span>
                    </a> <a href=""
                            class="paginator_item-2 inline-flex text-primary hover:bg-[#E6F7F4]  items-center rounded-full text-base w-8 h-8 ">
                        <span class="grow text-center">7</span>
                    </a>
                    <a href=""
                       class="paginator_item-2 inline-flex text-primary hover:bg-[#E6F7F4]  items-center rounded-full text-base w-8 h-8 ">
                        <span class="grow text-center">8</span>
                    </a>
                    <a href=""
                       class="paginator_item-2 inline-flex text-primary hover:bg-[#E6F7F4]  items-center rounded-full text-base w-8 h-8 ">
                        <span class="grow text-center">9</span>
                    </a>

                </div>

                <a href=""
                   class="inline-flex items-center gap-3  hover:bg-[#E6F7F4] rounded-4xl px-4 py-1 text-primary text-sm md:text-base">
                    <span class="leading-8">Next</span>
                    <i class="fa-solid fa-chevron-right"></i>
                </a>
            </div>
        </div>
    </div>
@endsection
