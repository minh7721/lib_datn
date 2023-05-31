@extends('frontend_v4.pages.university.university_master')

@section('university_content')
    <div class="container mx-auto mb-12">
        <div class="w-11/12 md:w-4/5 mx-auto rounded-4.5xl border border-gray-400 px-6 md:px-14 py-6 ">
            <div class="w-4/5 mx-auto flex items-center justify-center mb-4 gap-2">
                <span class="text-sm md:text-base">What do you need to know? Ask study questions</span>
                <svg width="17" height="16" viewBox="0 0 17 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M14.5 7.99998V8V8.00002C14.5 9.86377 14.5 10.7957 14.1955 11.5307C13.7895 12.5108 13.0108 13.2895 12.0307 13.6955C11.2957 14 10.3638 14 8.50002 14H8.5H6.5H6.49999C4.61438 14 3.67157 14 3.08579 13.4142C2.5 12.8284 2.5 11.8856 2.5 10V8C2.5 6.13623 2.5 5.20435 2.80448 4.46927C3.21046 3.48915 3.98915 2.71046 4.96927 2.30448C5.70435 2 6.63623 2 8.5 2C10.3638 2 11.2956 2 12.0307 2.30448C13.0108 2.71046 13.7895 3.48915 14.1955 4.46927C14.5 5.20435 14.5 6.13623 14.5 7.99998ZM8.5 5.0001C9.05229 5.0001 9.5 5.44781 9.5 6.0001V6.99977H10.5C11.0523 6.99977 11.5 7.44749 11.5 7.99977C11.5 8.55206 11.0523 8.99977 10.5 8.99977H9.5V10.0001C9.5 10.5524 9.05228 11.0001 8.5 11.0001C7.94771 11.0001 7.5 10.5524 7.5 10.0001V8.99977H6.5C5.94772 8.99977 5.5 8.55206 5.5 7.99977C5.5 7.44749 5.94772 6.99977 6.5 6.99977H7.5V6.0001C7.5 5.44781 7.94772 5.0001 8.5 5.0001Z"
                        fill="#00A888" />
                </svg>
            </div>
            <button class="w-4/5 block mx-auto bg-green-100 rounded-lg py-4 text-primary text-center ">
                <h2 class="text-2xl md:text-3xl font-semibold py-1">Ask the comunity</h2>
                <span class="text-sm md:text-base">Get help from your peers</span>
            </button>
        </div>
    </div>
    <div class="container mx-auto mb-12">
        <div class="w-full flex mb-10 flex-col lg:flex-row">
            <h4 class="lg:flex flex-1 lg:flex-max font-medium text-black items-center text-center lg:text-left pb-2">Filter
                your
                search selecting a subject
            </h4>
            <div class="flex-1 flex bg-white border border-gray-300 rounded-4.5xl overflow-hidden items-center ">
                <input name="" id="" class="flex-1 border-none p-4 outline-none"
                    placeholder="Add the name of a subject">
                <button class="w-6 h-6 mr-9">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </button>
            </div>
        </div>
        <div class="w-full">
            <div class="flex w-full py-2 border-b border-gray-100" x-data="{ subjectFilterRef: null, scrollPosition: 0 }">
                <button class="bg-white py-2 px-6 text-default rounded-4.5xl outline-none" x-show="scrollPosition != 0"
                    @click="$refs.subjectFilterRef.scrollTo({left: 0, behavior: 'smooth'})"><i
                        class="fa-solid fa-chevron-left"></i></button>
                <div class="w-full flex overflow-auto scrollbar-none md:gap-10" x-ref="subjectFilterRef"
                    @scroll="scrollPosition = $refs.subjectFilterRef.scrollLeft">
                    <a href=""
                        class="aspect-square h-10 w-auto flex justify-center items-center text-primary rounded-full">A</a>
                    <a href=""
                        class="aspect-square h-10 w-auto flex justify-center items-center text-primary rounded-full">B</a>
                    <a href=""
                        class="aspect-square h-10 w-auto flex justify-center items-center text-primary rounded-full">C</a>
                    <a href=""
                        class="aspect-square h-10 w-auto flex justify-center items-center text-primary rounded-full">D</a>
                    <a href=""
                        class="aspect-square h-10 w-auto flex justify-center items-center text-primary rounded-full">E</a>
                    <a href=""
                        class="aspect-square h-10 w-auto flex justify-center items-center text-primary rounded-full">F</a>
                    <a href=""
                        class="aspect-square h-10 w-auto flex justify-center items-center text-primary rounded-full">G</a>
                    <a href=""
                        class="aspect-square h-10 w-auto flex justify-center items-center text-primary rounded-full bg-green-100">H</a>
                    <a href=""
                        class="aspect-square h-10 w-auto flex justify-center items-center text-primary rounded-full">I</a>
                    <a href=""
                        class="aspect-square h-10 w-auto flex justify-center items-center text-primary rounded-full">J</a>
                    <a href=""
                        class="aspect-square h-10 w-auto flex justify-center items-center text-primary rounded-full">K</a>
                    <a href=""
                        class="aspect-square h-10 w-auto flex justify-center items-center text-primary rounded-full">L</a>
                    <a href=""
                        class="aspect-square h-10 w-auto flex justify-center items-center text-primary rounded-full">M</a>
                    <a href=""
                        class="aspect-square h-10 w-auto flex justify-center items-center text-primary rounded-full">N</a>
                    <a href=""
                        class="aspect-square h-10 w-auto flex justify-center items-center text-primary rounded-full">O</a>
                    <a href=""
                        class="aspect-square h-10 w-auto flex justify-center items-center text-primary rounded-full">P</a>
                    <a href=""
                        class="aspect-square h-10 w-auto flex justify-center items-center text-primary rounded-full">Q</a>
                    <a href=""
                        class="aspect-square h-10 w-auto flex justify-center items-center text-primary rounded-full">R</a>
                    <a href=""
                        class="aspect-square h-10 w-auto flex justify-center items-center text-primary rounded-full">S</a>
                    <a href=""
                        class="aspect-square h-10 w-auto flex justify-center items-center text-primary rounded-full">T</a>
                    <a href=""
                        class="aspect-square h-10 w-auto flex justify-center items-center text-primary rounded-full">U</a>
                    <a href=""
                        class="aspect-square h-10 w-auto flex justify-center items-center text-primary rounded-full">V</a>
                    <a href=""
                        class="aspect-square h-10 w-auto flex justify-center items-center text-primary rounded-full">W</a>
                    <a href=""
                        class="aspect-square h-10 w-auto flex justify-center items-center text-primary rounded-full">X</a>
                    <a href=""
                        class="aspect-square h-10 w-auto flex justify-center items-center text-primary rounded-full">Y</a>
                    <a href=""
                        class="aspect-square h-10 w-auto flex justify-center items-center text-primary rounded-full">Z</a>
                </div>

                <button class="bg-white py-2 px-6 text-default rounded-4.5xl outline-none"
                    x-show="!(scrollPosition + $refs.subjectFilterRef.clientWidth + 10 >= $refs.subjectFilterRef.scrollWidth)"
                    @click="$refs.subjectFilterRef.scrollTo({left: $refs.subjectFilterRef.scrollWidth, behavior: 'smooth'})"><i
                        class="fa-solid fa-chevron-right"></i></button>
            </div>
            <div class="w-full py-6">Human resources management (7)</div>
        </div>
    </div>
    <div class="container mx-auto">
        <h2 class="text-2xl font-medium mb-5 text-center md:text-left flex items-center gap-2 pl-2 md:pl-0">
            <i class="fa-solid fa-circle-question text-sm text-primary"></i>
            All questions
        </h2>
        <div class="w-full flex flex-col gap-4">
            @for ($i = 0; $i < 5; $i++)
                <a href=""
                    class="w-full border border-gray-400 rounded-4.5xl py-4 px-8 hover:bg-green-200 hover:shadow-xl">
                    <div class="flex font-light text-default-lighter">
                        <span class="flex-1 overflow-hidden whitespace-nowrap text-ellipsis">Questions in Human resources
                            management</span>
                        <span class="pl-2">2 days ago</span>
                    </div>
                    <p class=" font-light my-2">
                        Sustainable Fourier Company is a publicly traded waste disposal company, is a highly leveraged
                        company with 70% debt, 0% preferred equity, and 30% common equity financing. Currently the risk-free
                        rate is <span class="text-primary">(more)</span>
                    </p>
                    <div class="flex gap-4">
                        <div class="flex items-center gap-1">
                            <i class="fa-solid fa-message text-gray-600"></i>'
                            <span class="text-default-lighter">0</span>
                        </div>
                        <div class="flex items-center gap-1">
                            <i class="fa-solid fa-thumbs-up text-gray-600"></i>
                            <span class="text-default-lighter">0</span>
                        </div>
                    </div>
                </a>
            @endfor
            <div class=" max-4xl xl:max-w-5xl mx-auto paginator  mt-8  mb-10 flex md:gap-4 items-center justify-center">
                <a href="" class="inline-flex items-center gap-4 p-2 ">
                    <svg width="9" height="14" viewBox="0 0 9 14" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
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
    {{-- <div class="fixed top-0 left-0 w-screen h-screen z-50">
        <div class="absolute w-full h-full bg-gray-400 bg-opacity-30 backdrop-blur-sm z-10"></div>
        <div class="absolute left-1/2 top-1/3 z-20 w-full max-w-sm">123</div>
    </div> --}}
@endsection
