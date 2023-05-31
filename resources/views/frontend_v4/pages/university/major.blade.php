@extends('frontend_v4.layouts.master')

@push('before_styles')
@endpush

@push('after_styles')
@endpush

@push('before_scripts')
@endpush

@section('content')
    <div class="bg-white py-8 px-4 border-b border-gray-300">
        <div class="container mx-auto">
            <h1 class="mx-auto text-xl sm:text-2xl font-medium pb-2">Human Resources Management</h1>
            <div class="flex gap-4 font-light text-sm sm:text-lg">
                <a href="" class="text-primary-lighter">Da Nang University</a>
                <span class="text-default-lighter">
                    <i class="fa-solid fa-chevron-right text-sm"></i>
                </span>
                <a href="" class="text-primary-lighter">Subjects</a>
                <span class="text-default-lighter">
                    <i class="fa-solid fa-chevron-right text-sm"></i>
                </span>
                <a class="text-default-lighter">Marketing</a>
            </div>
        </div>
    </div>
    <div class="bg-white ">
        <div class="container mx-auto pt-5 pb-11">
            <div class="flex items-center sm:justify-end font-medium p-2">
                <span class="flex items-center text-primary ">Sort By <i class="fa-solid fa-caret-down px-2"></i></span>
                <span>Most Popular Documents</span>
            </div>
            <div class="mb-6 p-2 font-medium ">Showing 1 to 30 of 152</div>
            <div class="w-full flex md:flex-col flex-wrap md:gap-4 justify-around mb-11">
                @for ($i = 0; $i < 10; $i++)
                    <a href=""
                        class="flex  mb-2 border border-solid border-slate-300 hover:border-transparent hover:shadow-hover  md:mb-0 flex-col md:gap-8 md:flex-row  md:px-5 md:py-4   rounded md:rounded-3xl basis-[49%] md:basis-full ">
                        <div class="inline-block aspect-[3/4] md:aspect-auto">
                            <img class="h-full  w-full md:h-36 object-cover md:border md:border-slate-300 md:border-solid rounded-tl rounded-tr md:rounded-2xl"
                                src="https://placehold.co/600x400" alt="">
                        </div>
                        <div
                            class="bg-slate-200 md:bg-transparent py-6 md:py-0 px-2 grow flex justify-between rounded-bl rounded-br">
                            <div class="flex flex-col gap-2 justify-between basis-full md:basis-1/2 grow">
                                <div class="mb-3 md:mb-0 ">
                                    <span class="font-medium text-primary text-base py-2 ">
                                        Slide
                                        giáo trình - Triết học Mác Lê-nin
                                    </span>
                                    <div class="hidden md:block lg:flex  gap-8 flex-col lg:flex-row   mt-4 mb-8">
                                        <span class="inline-flex  gap-2 items-center   ">
                                            <i class="fa-solid fa-user text-default-lighter"></i>
                                            <span class="text-default-lighter">Kai Phan</span>
                                        </span>
                                        <p class="flex gap-2 items-center">
                                            <i class="fa-solid fa-book text-default-lighter"></i>
                                            <span class="text-default-lighter">Triết học Mac-Lenin</span>
                                        </p>
                                        <span href="" class="flex gap-2 items-center">
                                            <i class="fa-solid fa-book-open text-default-lighter"></i>
                                            <span class="text-default-lighter">Đại học Quốc gia Hà Nội</span>
                                        </span>
                                    </div>
                                </div>
                                <div class="flex text-default-lighter gap-16 ">
                                    <div class="flex items-center gap-6">
                                        <span class="inline-flex gap-2.5 items-center">
                                            <i class="fa-solid fa-file"></i>
                                            <span>8</span>
                                        </span>
                                        <span class="inline-flex gap-2.5 items-center ">
                                            <i class="fa-solid fa-cloud-arrow-down"></i>
                                            <span>10</span>
                                        </span>
                                        <span class="inline-flex gap-2.5 items-center">
                                            <i class="fa-solid fa-eye"></i>
                                            <span>5</span>
                                        </span>
                                    </div>
                                    <div class="hidden md:inline-flex gap-2.5 items-center">
                                        <i class="fa-regular fa-calendar"></i>
                                        2020/2021
                                    </div>
                                </div>
                            </div>
                            <div class="hidden md:flex items-baseline gap-2.5">
                                <i class="fa-solid fa-thumbs-up text-secondary"></i>
                                <span class="text-secondary">100%</span>
                            </div>
                        </div>
                    </a>
                @endfor
            </div>
            <div class=" max-4xl xl:max-w-5xl mx-auto paginator  mt-8  flex md:gap-4 items-center justify-center">
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
                    <svg width="9" height="14" viewBox="0 0 9 14" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path d="M1 1L7 7L1 13" stroke="#00A888" stroke-width="2" />
                    </svg>
                </a>
            </div>
        </div>
    </div>
@endsection
