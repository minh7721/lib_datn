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
        <div class="  container mx-auto mb-4 px-4 md:px-0 flex flex-col gap-3 md:gap-8 md:flex-row justify-between">
            <div class=" w-full md:w-2/5">
                <label for="filter-by-school" class="p-2 flex gap-2 items-center md:mb-4">
                    <i class="text-lg fa-sharp fa-solid fa-book-open"></i>


                    <span class="text-lg md:text-xl ">School filter</span>
                </label>
                <input id="filter-by-school"
                    class="w-full rounded-3xl px-4 h-10 py-1.5 border border-solid border-slate-300 placeholder:text-base placeholder:font-thin   outline-none  focus:border-primary hover:border-primary"
                    type="search" placeholder="Search for your school">


            </div>
            <div class=" w-full md:w-2/5">
                <label for="filter-by-writer" class="p-2 flex gap-2 items-center md:mb-4">
                    <i class="text-lg fa-solid fa-user"></i>
                    <span class="text-lg md:text-xl ">Writer's name</span>
                </label>
                <input id="filter-by-writer"
                    class="w-full rounded-3xl px-4 h-10 py-1.5 border border-solid border-slate-300 placeholder:text-base placeholder:font-thin outline-none  focus:border-primary hover:border-primary"
                    type="search" placeholder="Search for writer's name">
            </div>
        </div>
        <div class="flex cursor-pointer container mx-auto px-4 md:px-0" x-cloak x-data="{
            open: false,
            selections: [
                'Most popular documents',
                'Top downloaded documents',
                'Lasted  documents'
            ],
            current: null,
        }" x-init="current = selections[0]">
            <div class="relative">
                <div @click="open= true" class="inline-flex items-center gap-2  ">
                    <p class="text-lg font-medium text-primary">Sort by</p>
                    <i class="fa-solid fa-caret-down text-primary text-sm"></i>
                    <p x-show="!open" x-text="current"></p>
                </div>
                <ul x-show="open" @click.outside="open = false"
                    class="absolute left-full bg-white  rounded top-1/2   border border-solid border-slate-300 min-w-max ">
                    <template x-for="(selection,index) in selections" :key="index">
                        <li @click="current=selections[index]; open=false"
                            class="min-w-max block py-4 pl-2 pr-4 md:pr-10  hover:bg-slate-200" x-text="selection">
                        </li>
                    </template>


                </ul>
            </div>
        </div>
        <div
            class="container mx-auto mt-10 mb-10 px-2 md:px-0 flex justify-between md:gap-6 flex-row md:flex-col  flex-wrap text-default-lighter ">
            <a href="/document"
                class="flex flex-col items-center mb-2 border border-solid border-slate-300 hover:border-transparent hover:shadow-hover  md:mb-0  md:gap-8 md:flex-row  md:px-5 md:py-4   rounded md:rounded-3xl basis-[49%] md:basis-full ">
                <div class=" aspect-[3/4] md:aspect-auto max-w-xs w-full md:basis-3/12 lg:basis-2/12">
                    <img class="h-full  w-full md:h-36 object-cover md:border md:border-slate-300 md:border-solid rounded-tl rounded-tr md:rounded-2xl"
                        src="https://picsum.photos/200" alt="">
                </div>
                <div
                    class="bg-slate-200 md:bg-transparent py-6 md:py-0 px-2 md:basis-9/12 lg:basis-10/12 flex flex-1 gap-8 rounded-bl rounded-br">
                    <div class="flex flex-col gap-2 justify-between basis-full md:basis-1/2 grow">
                        <div class="mb-3 md:mb-0 ">
                            <span class="font-medium text-primary text-base line-clamp-4 md:line-clamp-2">
                                               Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum
                            </span>
                            <div class="hidden md:block lg:flex gap-8 flex-col lg:flex-row   mt-4 mb-8">
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
                        <div class="flex  gap-16">
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
                    <div class="hidden md:flex items-baseline gap-2.5 text-secondary">
                        <i class="fa-solid fa-thumbs-up"></i>

                        <span class="">100%</span>
                    </div>
                </div>
            </a>
            <a href="/document"
               class="flex flex-col items-center mb-2 border border-solid border-slate-300 hover:border-transparent hover:shadow-hover  md:mb-0  md:gap-8 md:flex-row  md:px-5 md:py-4   rounded md:rounded-3xl basis-[49%] md:basis-full ">
                <div class=" aspect-[3/4] md:aspect-auto max-w-xs w-full md:basis-3/12 lg:basis-2/12">
                    <img class="h-full  w-full md:h-36 object-cover md:border md:border-slate-300 md:border-solid rounded-tl rounded-tr md:rounded-2xl"
                         src="https://picsum.photos/200" alt="">
                </div>
                <div
                    class="bg-slate-200 md:bg-transparent py-6 md:py-0 px-2 md:basis-9/12 lg:basis-10/12 flex flex-1 gap-8 rounded-bl rounded-br">
                    <div class="flex flex-col gap-2 justify-between basis-full md:basis-1/2 grow">
                        <div class="mb-3 md:mb-0 ">
                            <span class="font-medium text-primary text-base line-clamp-4 md:line-clamp-2">
                            Slide: Chủ nghĩa Mac-Lenin</span>
                            <div class="hidden md:block lg:flex gap-8 flex-col lg:flex-row   mt-4 mb-8">
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
                        <div class="flex  gap-16">
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
                    <div class="hidden md:flex items-baseline gap-2.5 text-secondary">
                        <i class="fa-solid fa-thumbs-up"></i>

                        <span class="">100%</span>
                    </div>
                </div>
            </a>
            <a href="/document"
               class="flex flex-col items-center mb-2 border border-solid border-slate-300 hover:border-transparent hover:shadow-hover  md:mb-0  md:gap-8 md:flex-row  md:px-5 md:py-4   rounded md:rounded-3xl basis-[49%] md:basis-full ">
                <div class=" aspect-[3/4] md:aspect-auto max-w-xs w-full md:basis-3/12 lg:basis-2/12">
                    <img class="h-full  w-full md:h-36 object-cover md:border md:border-slate-300 md:border-solid rounded-tl rounded-tr md:rounded-2xl"
                         src="https://picsum.photos/200" alt="">
                </div>
                <div
                    class="bg-slate-200 md:bg-transparent py-6 md:py-0 px-2 md:basis-9/12 lg:basis-10/12 flex flex-1 gap-8 rounded-bl rounded-br">
                    <div class="flex flex-col gap-2 justify-between basis-full md:basis-1/2 grow">
                        <div class="mb-3 md:mb-0 ">
                            <span class="font-medium text-primary text-base line-clamp-4 md:line-clamp-2">
                                               Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum
                            </span>
                            <div class="hidden md:block lg:flex gap-8 flex-col lg:flex-row   mt-4 mb-8">
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
                        <div class="flex  gap-16">
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
                    <div class="hidden md:flex items-baseline gap-2.5 text-secondary">
                        <i class="fa-solid fa-thumbs-up"></i>

                        <span class="">100%</span>
                    </div>
                </div>
            </a>
            <a href="/document"
               class="flex flex-col items-center mb-2 border border-solid border-slate-300 hover:border-transparent hover:shadow-hover  md:mb-0  md:gap-8 md:flex-row  md:px-5 md:py-4   rounded md:rounded-3xl basis-[49%] md:basis-full ">
                <div class=" aspect-[3/4] md:aspect-auto max-w-xs w-full md:basis-3/12 lg:basis-2/12">
                    <img class="h-full  w-full md:h-36 object-cover md:border md:border-slate-300 md:border-solid rounded-tl rounded-tr md:rounded-2xl"
                         src="https://picsum.photos/200" alt="">
                </div>
                <div
                    class="bg-slate-200 md:bg-transparent py-6 md:py-0 px-2 md:basis-9/12 lg:basis-10/12 flex flex-1 gap-8 rounded-bl rounded-br">
                    <div class="flex flex-col gap-2 justify-between basis-full md:basis-1/2 grow">
                        <div class="mb-3 md:mb-0 ">
                            <span class="font-medium text-primary text-base line-clamp-4 md:line-clamp-2">
                                               Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum
                            </span>
                            <div class="hidden md:block lg:flex gap-8 flex-col lg:flex-row   mt-4 mb-8">
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
                        <div class="flex  gap-16">
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
                    <div class="hidden md:flex items-baseline gap-2.5 text-secondary">
                        <i class="fa-solid fa-thumbs-up"></i>

                        <span class="">100%</span>
                    </div>
                </div>
            </a>
            <a href="/document"
               class="flex flex-col items-center mb-2 border border-solid border-slate-300 hover:border-transparent hover:shadow-hover  md:mb-0  md:gap-8 md:flex-row  md:px-5 md:py-4   rounded md:rounded-3xl basis-[49%] md:basis-full ">
                <div class=" aspect-[3/4] md:aspect-auto max-w-xs w-full md:basis-3/12 lg:basis-2/12">
                    <img class="h-full  w-full md:h-36 object-cover md:border md:border-slate-300 md:border-solid rounded-tl rounded-tr md:rounded-2xl"
                         src="https://picsum.photos/200" alt="">
                </div>
                <div
                    class="bg-slate-200 md:bg-transparent py-6 md:py-0 px-2 md:basis-9/12 lg:basis-10/12 flex flex-1 gap-8 rounded-bl rounded-br">
                    <div class="flex flex-col gap-2 justify-between basis-full md:basis-1/2 grow">
                        <div class="mb-3 md:mb-0 ">
                            <span class="font-medium text-primary text-base line-clamp-4 md:line-clamp-2">
                                               Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum
                            </span>
                            <div class="hidden md:block lg:flex gap-8 flex-col lg:flex-row   mt-4 mb-8">
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
                        <div class="flex  gap-16">
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
                    <div class="hidden md:flex items-baseline gap-2.5 text-secondary">
                        <i class="fa-solid fa-thumbs-up"></i>

                        <span class="">100%</span>
                    </div>
                </div>
            </a>
            <a href="/document"
               class="flex flex-col items-center mb-2 border border-solid border-slate-300 hover:border-transparent hover:shadow-hover  md:mb-0  md:gap-8 md:flex-row  md:px-5 md:py-4   rounded md:rounded-3xl basis-[49%] md:basis-full ">
                <div class=" aspect-[3/4] md:aspect-auto max-w-xs w-full md:basis-3/12 lg:basis-2/12">
                    <img class="h-full  w-full md:h-36 object-cover md:border md:border-slate-300 md:border-solid rounded-tl rounded-tr md:rounded-2xl"
                         src="https://picsum.photos/200" alt="">
                </div>
                <div
                    class="bg-slate-200 md:bg-transparent py-6 md:py-0 px-2 md:basis-9/12 lg:basis-10/12 flex flex-1 gap-8 rounded-bl rounded-br">
                    <div class="flex flex-col gap-2 justify-between basis-full md:basis-1/2 grow">
                        <div class="mb-3 md:mb-0 ">
                            <span class="font-medium text-primary text-base line-clamp-4 md:line-clamp-2">
                                               Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum
                            </span>
                            <div class="hidden md:block lg:flex gap-8 flex-col lg:flex-row   mt-4 mb-8">
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
                        <div class="flex  gap-16">
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
                    <div class="hidden md:flex items-baseline gap-2.5 text-secondary">
                        <i class="fa-solid fa-thumbs-up"></i>

                        <span class="">100%</span>
                    </div>
                </div>
            </a>
            <a href="/document"
               class="flex flex-col items-center mb-2 border border-solid border-slate-300 hover:border-transparent hover:shadow-hover  md:mb-0  md:gap-8 md:flex-row  md:px-5 md:py-4   rounded md:rounded-3xl basis-[49%] md:basis-full ">
                <div class=" aspect-[3/4] md:aspect-auto max-w-xs w-full md:basis-3/12 lg:basis-2/12">
                    <img class="h-full  w-full md:h-36 object-cover md:border md:border-slate-300 md:border-solid rounded-tl rounded-tr md:rounded-2xl"
                         src="https://picsum.photos/200" alt="">
                </div>
                <div
                    class="bg-slate-200 md:bg-transparent py-6 md:py-0 px-2 md:basis-9/12 lg:basis-10/12 flex flex-1 gap-8 rounded-bl rounded-br">
                    <div class="flex flex-col gap-2 justify-between basis-full md:basis-1/2 grow">
                        <div class="mb-3 md:mb-0 ">
                            <span class="font-medium text-primary text-base line-clamp-4 md:line-clamp-2">
                                               Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum
                            </span>
                            <div class="hidden md:block lg:flex gap-8 flex-col lg:flex-row   mt-4 mb-8">
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
                        <div class="flex  gap-16">
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
                    <div class="hidden md:flex items-baseline gap-2.5 text-secondary">
                        <i class="fa-solid fa-thumbs-up"></i>

                        <span class="">100%</span>
                    </div>
                </div>
            </a>







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
