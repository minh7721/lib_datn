@extends('frontend_v4.layouts.master')
@push('before_styles')
@endpush

@push('after_styles')
@endpush

@push('before_scripts')
@endpush

@section('content')
    <div class="bg-white ">
        <div x-data="searchs" class="container mx-auto px-4">
            <div class="pt-8">
                <h2 class="font-semibold text-default-darker text-2xl mb-4 md:mb-6">
                    Top documents
                </h2>
                <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-5 gap-x-2 lg:gap-x-5">
                    @for ($i = 1; $i <= 10; $i++)
                        <div class="w-full mb-6 md:mb-10 ">
                            <a href="" class="group">
                                <div
                                    class="border border-slate-300 border-solid rounded-1.5lg px-1 lg:px-2 pt-1 pb-2 mb-1 md:mb-2.5 group-hover:shadow-card ">
                                    <img src="https://picsum.photos/200" alt=""
                                        class="max-w-full w-full object-cover max-h-[150px] ">
                                    <div class="px-2 lg:px-3.5 lg:pt-5">
                                        <div class="mb-5">
                                            <h2 class="text-primary font-semibold text-sm md:text-base line-clamp-2">
                                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto
                                                asperiores assumenda consectetur consequatur doloribus eaque
                                                eligendi
                                            </h2>
                                            <p class="text-default-lighter font-thin text-sm py-2 line-clamp-1"> Quan he
                                                kinh te</p>
                                        </div>
                                        <div
                                            class="flex justify-between text-default-lighter font-light text-xs lg:text-base ">
                                            <div class="inline-flex items-center gap-1 md:gap-2">
                                                <i class="fa-solid fa-file"></i>
                                                <span>12</span>
                                            </div>
                                            <div class="inline-flex items-center gap-1 md:gap-2">
                                                <i class="fa-solid fa-cloud-arrow-down"></i>
                                                <span>20</span>
                                            </div>
                                            <div class="inline-flex items-center gap-1 md:gap-2">
                                                <i class="fa-solid fa-eye"></i>
                                                <span>70</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div
                                    class="text-default-lighter flex justify-center gap-1 items-center border border-solid border-slate-300 w-full rounded-4xl py-2 text-xs lg:text-base group-hover:shadow-card">
                                    <i class="fa-solid fa-thumbs-up text-secondary"></i>
                                    <span class="text-text-default font-light lg:font-medium">100%</span>
                                </div>
                            </a>
                        </div>
                    @endfor
                </div>
            </div>
            <div class="my-8">
                <h2 class="font-semibold text-default-darker text-2xl mb-4 md:mb-6">
                    Recently viewed
                </h2>
                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-y-4 lg:gap-y-10 gap-x-12 lg:gap-x-20">
                    @for ($i = 0; $i <= 10; $i++)
                        <a href="" class="w-full">
                            <div
                                class="flex gap-4 border border-slate-300 border-solid rounded-lg px-4 lg:px-8 py-5 hover:shadow-card">
                                <div class="aspect-[3/4] bg-slate-100 max-w-[85px] min-w-[85px]">
                                    <img src="https://picsum.photos/300" alt=""
                                        class="max-w-full w-full h-full object-cover">
                                </div>
                                <div class="flex flex-col justify-around">
                                    <h2 class="text-primary font-semibold line-clamp-2">QUY ĐỊNH TẠM THỜI VỀ TIỂU LUẬN
                                        KẾT THÚC HỌC PHẦN</h2>
                                    <p class="text-text-default font-thin text-sm py-2 line-clamp-1"> Quan he kinh
                                        te</p>
                                    <div class="flex gap-10 text-default-lighter">
                                        <div class="inline-flex items-center gap-2">
                                            <i class="fa-solid fa-file"></i>
                                            <span>12</span>
                                        </div>
                                        <div class="inline-flex items-center gap-2">
                                            <i class="fa-solid fa-cloud-arrow-down"></i>
                                            <span>20</span>
                                        </div>
                                        <div class="inline-flex items-center gap-2">
                                            <i class="fa-solid fa-eye"></i>
                                            <span>70</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    @endfor
                </div>
            </div>
            <div class="py-8 md:py-12 rounded-xl bg-cover"
                style="background-image: url('{{ asset('assets_v4/images/thumnail-bg-text-2.png') }}'); width: 100%;">
                <div class="w-5/6 mx-auto">
                    <h2 class="text-base md:text-3.25xl font-medium mb-6">
                        Upload more documents and download any material studies right away!
                    </h2>
                    <a class="px-8 py-4 rounded-4xl bg-white font-medium ">Upload documents</a>
                </div>
            </div>
            <div class=" mt-8 pb-8">
                <h2 class="font-semibold text-default-darker text-2xl mb-6">
                    Recommended documents
                </h2>
                <div class="flex flex-wrap md:flex-col md:gap-4 pb-8 -mx-2 md:mx-0">
                    @for ($i = 1; $i <= 10; $i++)
                        <div class="px-2 md:px-0 w-1/2 md:w-full">
                            <a href="/document"
                                class="flex flex-col items-center  mb-2 border border-solid border-slate-300 hover:border-transparent hover:shadow-hover  md:mb-0  md:gap-8 md:flex-row  md:px-5 md:py-4   rounded md:rounded-3xl ">
                                <div class=" aspect-[3/4] md:aspect-auto max-w-xs w-full md:w-3/12 lg:w-2/12">
                                    <img class="h-full max-w-full w-full md:h-36 object-cover md:border md:border-slate-300 md:border-solid rounded-tl rounded-tr md:rounded-2xl"
                                        src="https://picsum.photos/200" alt="">
                                </div>
                                <div
                                    class=" py-3 md:py-0 px-2 md:basis-9/12 lg:basis-10/12 flex flex-1 gap-8 rounded-bl rounded-br">
                                    <div class="flex flex-col gap-2 justify-between basis-full md:basis-1/2 grow">
                                        <div class="mb-3 md:mb-0 ">
                                            <span class="font-medium text-primary text-base line-clamp-3 md:line-clamp-2">
                                                Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                                Lorem Ipsum has been the industry's standard dummy text ever since the
                                                1500s, when an unknown printer took a galley of type and scrambled it to
                                                make a type specimen book. It has survived not only five centuries, but also
                                                the leap into electronic typesetting, remaining essentially unchanged. It
                                                was popularised in the 1960s with the release of Letraset sheets containing
                                                Lorem Ipsum passages, and more recently with desktop publishing software
                                                like Aldus PageMaker including versions of Lorem Ipsum
                                            </span>
                                            <div
                                                class="hidden md:block lg:flex gap-8 flex-col lg:flex-row mt-4 mb-8 text-default-lighter">
                                                <span class="inline-flex  gap-2 items-center   ">
                                                    <i class="fa-solid fa-user"></i>
                                                    <span class="">Kai Phan</span>
                                                </span>
                                                <p class="flex gap-2 items-center">
                                                    <i class="fa-solid fa-book"></i>
                                                    <span class="">Triết học Mac-Lenin</span>
                                                </p>
                                                <span href="" class="flex gap-2 items-center">
                                                    <i class="fa-sharp fa-solid fa-book-open"></i>
                                                    <span class="">Đại học Quốc gia Hà Nội</span>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="flex  gap-16 text-default-lighter">
                                            <div class="flex items-center gap-6">
                                                <span class="inline-flex gap-1 md:gap-2.5 items-center">
                                                    <i class="fa-solid fa-file"></i>
                                                    <span>8</span>
                                                </span>
                                                <span class="inline-flex gap-1 md:gap-2.5 items-center ">
                                                    <i class="fa-solid fa-cloud-arrow-down"></i>
                                                    <span>10</span>
                                                </span>
                                                <span class="inline-flex gap-1 md:gap-2.5 items-center">
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
                                    <div class="hidden md:flex items-baseline gap-2.5 text-secondary">
                                        <i class="fa-solid fa-thumbs-up"></i>
                                        <span class="">100%</span>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endfor
                </div>
                <div class="flex py-3 border border-solid border-primary rounded-4xl">
                    <button class="items-center mx-auto gab-2.5 text-primary-darker">
                        <span class="text-lg font-medium mr-2">Show more</span>
                        <i class="fa-solid fa-chevron-down"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection
