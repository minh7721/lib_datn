@extends('frontend_v4.pages.university.university_master')

@section('university_content')
    <div class="container mx-auto pt-10">
        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-y-12">
            @for ($i = 0; $i < 36; $i++)
                <div class="flex flex-col items-center">
                    <div class="w-16 h-16 rounded-full bg-primary text-lg text-center text-white leading-[64px] font-bold">N
                    </div>
                    <div class="font-light py-2">Hoang Nhat Minh</div>
                </div>
            @endfor
        </div>
    </div>
    <div class=" max-4xl xl:max-w-5xl mx-auto paginator  mt-8  mb-10 flex md:gap-4 items-center justify-center">
        <a href="" class="inline-flex items-center gap-4 p-2 ">
            <svg width="9" height="14" viewBox="0 0 9 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M8 1L2 7L8 13" stroke="#AFAFAF" stroke-width="2" />
            </svg>
            <span class="hidden md:inline-block text-default-lighter">Previous</span>
        </a>
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

        <a href="" class="inline-flex items-center gap-4 p-2 ">
            <span class="hidden md:inline-block text-primary">Next</span>
            <svg width="9" height="14" viewBox="0 0 9 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M1 1L7 7L1 13" stroke="#00A888" stroke-width="2" />
            </svg>
        </a>
    </div>
@endsection
