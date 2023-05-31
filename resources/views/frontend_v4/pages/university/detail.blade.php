@extends('frontend_v4.pages.university.university_master')

@section('university_content')
    <div class="container mx-auto mb-10" id="popular">
        <h2 class="text-2xl font-medium mb-6 text-center md:text-left">Most popular documents</h2>
        <div class="flex flex-row flex-wrap md:flex-col md:gap-4 mb-4 justify-between">
            @for ($i = 0; $i < 5; $i++)
                <a href=""
                    class="flex mb-2 border border-solid border-slate-300 hover:border-transparent hover:shadow-hover  md:mb-0 flex-col md:gap-8 md:flex-row  md:px-5 md:py-4   rounded md:rounded-3xl basis-[49%] md:basis-full ">
                    <div class="inline-block aspect-[3/4] md:aspect-auto">
                        <img class="h-full  w-full md:h-36 object-cover md:border md:border-slate-300 md:border-solid rounded-tl rounded-tr md:rounded-2xl"
                            src="https://placehold.co/600x400" alt="">
                    </div>
                    <div
                        class="bg-slate-200 md:bg-transparent py-6 md:py-0 px-2 grow flex justify-between rounded-bl rounded-br">
                        <div class="flex flex-col gap-2 justify-between basis-full md:basis-1/2 grow">
                            <div class="mb-3 md:mb-0 ">
                                <span class="font-medium text-primary text-base py-2 ">
                                    Slide giáo trình - Triết học Mác Lê-nin
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
        <button class="block w-11/12 mx-auto py-3 text-primary border-primary rounded-4.5xl border ">
            <span class="text-lg font-medium mr-2">Show more</span>
            <i class="fa-solid fa-chevron-down"></i>
        </button>
    </div>
    <div class="container mx-auto mb-10" id="related">
        <h2 class="text-2xl font-medium mb-6 text-center md:text-left">Recent documents</h2>
        <div class="flex flex-row flex-wrap md:flex-col md:gap-4 mb-4 justify-between">
            @for ($i = 0; $i < 5; $i++)
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
        <button class="block w-11/12 mx-auto py-3 text-primary border-primary rounded-4.5xl border ">
            <span class="text-lg font-medium mr-2">Show more</span>
            <i class="fa-solid fa-chevron-down"></i>
        </button>
    </div>
    <div class="container mx-auto mb-10" id="subjects">
        <h2 class="text-2xl font-medium mb-6 text-center md:text-left">Subjects (239)</h2>
        <div class="flex w-11/12 mx-auto mb-12" x-data="{ subjectFilterRef: null, scrollPosition: 0 }">
            <button class="bg-white py-2 px-6 text-default rounded-4.5xl outline-none" x-show="scrollPosition != 0"
                @click="$refs.subjectFilterRef.scrollTo({left: 0, behavior: 'smooth'})"><i
                    class="fa-solid fa-chevron-left"></i></button>
            <div class="w-full flex overflow-auto scrollbar-none" x-ref="subjectFilterRef"
                @scroll="scrollPosition = $refs.subjectFilterRef.scrollLeft">
                <a href=""
                    class="flex-max py-2 px-6 text-primary rounded-4.5xl bg-gray-300 bg-opacity-60">Popular</a>
                <a href="" class="flex-max py-2 px-6 text-primary rounded-4.5xl bg-opacity-60">[0-9]</a>
                <a href="" class="flex-max py-2 px-6 text-primary rounded-4.5xl bg-opacity-60">A</a>
                <a href="" class="flex-max py-2 px-6 text-primary rounded-4.5xl bg-opacity-60">B</a>
                <a href="" class="flex-max py-2 px-6 text-primary rounded-4.5xl bg-opacity-60">C</a>
                <a href="" class="flex-max py-2 px-6 text-primary rounded-4.5xl bg-opacity-60">D</a>
                <a href="" class="flex-max py-2 px-6 text-primary rounded-4.5xl bg-opacity-60">E</a>
                <a href="" class="flex-max py-2 px-6 text-primary rounded-4.5xl bg-opacity-60">F</a>
                <a href="" class="flex-max py-2 px-6 text-primary rounded-4.5xl bg-opacity-60">G</a>
                <a href="" class="flex-max py-2 px-6 text-primary rounded-4.5xl bg-opacity-60">H</a>
                <a href="" class="flex-max py-2 px-6 text-primary rounded-4.5xl bg-opacity-60">I</a>
                <a href="" class="flex-max py-2 px-6 text-primary rounded-4.5xl bg-opacity-60">J</a>
                <a href="" class="flex-max py-2 px-6 text-primary rounded-4.5xl bg-opacity-60">K</a>
                <a href="" class="flex-max py-2 px-6 text-primary rounded-4.5xl bg-opacity-60">L</a>
                <a href="" class="flex-max py-2 px-6 text-primary rounded-4.5xl bg-opacity-60">M</a>
                <a href="" class="flex-max py-2 px-6 text-primary rounded-4.5xl bg-opacity-60">N</a>
                <a href="" class="flex-max py-2 px-6 text-primary rounded-4.5xl bg-opacity-60">O</a>
                <a href="" class="flex-max py-2 px-6 text-primary rounded-4.5xl bg-opacity-60">P</a>
                <a href="" class="flex-max py-2 px-6 text-primary rounded-4.5xl bg-opacity-60">Q</a>
                <a href="" class="flex-max py-2 px-6 text-primary rounded-4.5xl bg-opacity-60">R</a>
                <a href="" class="flex-max py-2 px-6 text-primary rounded-4.5xl bg-opacity-60">S</a>
                <a href="" class="flex-max py-2 px-6 text-primary rounded-4.5xl bg-opacity-60">T</a>
                <a href="" class="flex-max py-2 px-6 text-primary rounded-4.5xl bg-opacity-60">U</a>
                <a href="" class="flex-max py-2 px-6 text-primary rounded-4.5xl bg-opacity-60">V</a>
                <a href="" class="flex-max py-2 px-6 text-primary rounded-4.5xl bg-opacity-60">W</a>
                <a href="" class="flex-max py-2 px-6 text-primary rounded-4.5xl bg-opacity-60">X</a>
                <a href="" class="flex-max py-2 px-6 text-primary rounded-4.5xl bg-opacity-60">Y</a>
                <a href="" class="flex-max py-2 px-6 text-primary rounded-4.5xl bg-opacity-60">Z</a>
            </div>

            <button class="bg-white py-2 px-6 text-default rounded-4.5xl outline-none"
                x-show="!(scrollPosition + $refs.subjectFilterRef.clientWidth + 10 >= $refs.subjectFilterRef.scrollWidth)"
                @click="$refs.subjectFilterRef.scrollTo({left: $refs.subjectFilterRef.scrollWidth, behavior: 'smooth'})"><i
                    class="fa-solid fa-chevron-right"></i></button>
        </div>
        <div class="w-5/6 mx-auto">
            <div class="grid grid-cols-1 lg:grid-cols-2 w-full justify-items-center">
                @for ($i = 0; $i < 10; $i++)
                    <a href="" class="p-2 border-b border-gray-400 min-w-full lg:min-w-[28rem] hover:bg-green-100">
                        <div class="p-2">
                            <i class="fa-solid fa-book text-primary pr-2"></i>
                            <span class="text-default">Human Resources Management</span>
                        </div>
                        <span class="p-2 text-black">152 Documents</span>
                    </a>
                @endfor
            </div>
        </div>
    </div>
    <div class="container mx-auto mb-10" id="nearby">
        <h2 class="text-2xl font-medium mb-6 text-center md:text-left">Nearby Universities</h2>
        <div class="w-5/6 mx-auto">
            <div class="grid grid-cols-1 lg:grid-cols-2 w-full justify-items-center">
                @for ($i = 0; $i < 20; $i++)
                    <a href=""
                        class="group flex items-center p-2 min-w-full text-center lg:text-left lg:min-w-[28rem]">
                        <i class="fa-solid fa-book-open text-secondary pr-3"></i>
                        <span class="group-hover:underline text-default text-left">Trường Đại học Kinh tế – Luật, Đại học
                            Quốc gia Thành phố Hồ Chí Minh
                        </span>
                    </a>
                @endfor
            </div>
        </div>
    </div>
@endsection
