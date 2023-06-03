<header id="header" class="w-full px-4 bg-white border-b border-gray-200">
    <div class="container mx-auto flex items-center justify-between">
        <div class="py-4 flex flex-1 gap-4 items-center justify-start md:justify-start">
            <i class="fa-solid fa-xl fa-bars cursor-pointer" @click="open_sidebar = true"></i>
            <a href="{{ route('document.home.index') }}" class=" hover:cursor-pointer">
                <img src="{{ asset('assets_v4/images/libshare-png-2.png') }}" alt=""
                    class="max-h-6 w-12 object-cover">
            </a>
            <div x-data="searchs"
                class="hidden h-10 md:flex items-center container_search mx-4 lg:max-w-3xl lg:ml-10 relative border border-slate-300 rounded-4xl hover:border-primary grow group">
                <div class=" grow flex items-center justify-between md:mr-3">
                    <input x-model="search" id="search_global"
                        class="search rounded-4xl  md:pl-6 w-full  px-4 outline-none placeholder:text-base placeholder:font-thin placeholder:text-search  peer "
                        type="text" placeholder="Search for documents, universities and other resources">
                    <ul id="relative_search_result"
                        class="hidden absolute border shadow border-slate-300 rounded bg-white  w-full peer-focus:block top-[calc(100%+10px)]  max-h-[50vh] overflow-y-auto  scrollbar-thin scrollbar-thumb-rounded-lg scrollbar-thumb-gray-500 scrollbar-track-gray-300 z-50">
                        <li class="p-2.5 text-primary" x-show="!noResults"># Relative search result</li>
                        <template x-for="item in filterSearchs">
                            <li class="hover:bg-slate-100 px-2.5">
                                <a href=""
                                    class="text-base text-text-default-darker inline-block p-2 font-medium"
                                    x-text="item.name">
                                </a>
                            </li>
                        </template>
                        <li class="text-red-400 p-2.5" x-show="noResults"> No result!</li>
                    </ul>
                </div>
                <button class="mr-4 text-gray-500 group-hover:text-primary">
                    <i class=" fa-solid fa-magnifying-glass"></i>
                </button>
            </div>
        </div>


        <div class="flex gap-4 items-center">
            <button class="block md:hidden text-gray-500 hover:text-primary "
                @click="open_search_responsive= !open_search_responsive ">
                <i class="text-base md:text-2xl fa-solid fa-magnifying-glass "></i>
            </button>
            <button
                class="shadow-btn font-medium rounded-full px-5 py-2 hidden md:inline-flex items-center justify-center gap-2 hover:bg-primary hover:text-white">
                <i class="fa fa-globe"></i>
                English
            </button>
            <button
                class="bg-primary text-white font-medium rounded-full px-5 py-2 hidden lg:inline-flex items-center justify-center gap-2 hover:bg-primary-darker">
                <i class="fa fa-cloud-arrow-up"></i>
                Upload
            </button>
            <div x-data="{ open: false }" class="relative flex items-center ">
                <button @click="open = ! open"
                    class=" relative text-2xl rounded-full inline-flex items-center justify-center ">
                    <svg :class="open && 'fill-primary stroke-primary'" class="fill-default aspect-square w-4  md:w-6  stroke-default hover:fill-primary hover:stroke-primary" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M4.33515 4.6498C4.52344 2.76689 6.10787 1.33301 8.00016 1.33301V1.33301C9.89246 1.33301 11.4769 2.76689 11.6652 4.6498L11.8563 6.56056C11.9507 7.50553 12.2756 8.41288 12.8024 9.20306L13.3765 10.0642C13.5949 10.3918 13.7041 10.5556 13.7464 10.6817C13.9294 11.2274 13.6152 11.8145 13.0596 11.9649C12.9313 11.9997 12.7344 11.9997 12.3407 11.9997H3.65965C3.26592 11.9997 3.06906 11.9997 2.94072 11.9649C2.38514 11.8145 2.07089 11.2274 2.25393 10.6817C2.29621 10.5556 2.40541 10.3918 2.62381 10.0642L3.1979 9.20306C3.72469 8.41288 4.04958 7.50553 4.14407 6.56056L4.33515 4.6498Z" fill=""/>
                        <path  d="M6.71226 13.7529C6.78823 13.8238 6.95562 13.8864 7.18848 13.9311C7.42134 13.9758 7.70665 14 8.00016 14C8.29367 14 8.57899 13.9758 8.81184 13.9311C9.0447 13.8864 9.2121 13.8238 9.28806 13.7529" stroke="" stroke-width="2" stroke-linecap="round"/>
                    </svg>
{{--                    <span class=" inline-block absolute top-0 translate-x-2/4 md:translate-x-3/4 w-2.5 md:w-3 h-2.5 md:h-3 bg-secondary rounded-full border-[2.5px] border-solid border-white"></span>--}}
                </button>
                <div x-cloak x-show="open" id="notifications" @click.outside="open=false"
                    class="absolute border border-solid border-slate-300 shadow-hover w-[80vw] right-0 translate-x-16 md:translate-x-0  md:w-auto  md:-right-6 md:min-w-[550px] bg-white top-[calc(100%+14px)] md:top-[calc(100%+25px)] rounded peer z-50">
                    <span class="block absolute w-6 h-6  rotate-45 right-0 z-10 bg-white border-t border-l border-solid border-slate-300 -translate-y-[calc(100%-11px)] -translate-x-[calc(200%+12px)] md:-translate-x-[calc(100%-2px)]"></span>
                    <h2
                        class="font-bold text-text-default-darker text-lg  p-4 md:p-6 border-b border-solid border-slate-300">
                        Last Notifications</h2>
                    <ul
                        class="overflow-y-auto  h-[calc(100vh-250px)] md:h-auto md:max-h-[60vh] scrollbar-thin scrollbar-thumb-rounded-lg scrollbar-thumb-gray-500 scrollbar-track-gray-300 ">
                        <li
                            class="flex gap-2.5 items-center text-text-default text-base py-2 px-6 md:py-6 border-b border-slate-300 border-solid hover:bg-green-100 hover:cursor-pointer">
                            <i class="fa-solid fa-circle-check text-secondary text-3xl"></i>
                            <div>
                                <p class="line-clamp-4">
                                    Uploaded document <span class="text-primary font-bold">pros and cons a debater
                                        handbook 19th edition</span>
                                    accepted! You have received unlimited access!
                                </p>
                            </div>
                        </li>
                        <li
                            class="flex gap-2.5 items-center text-text-default text-base px-6 py-2 md:py-6 border-b first-of-type:border-t border-slate-300 border-solid hover:bg-green-100 hover:cursor-pointer">
                            <i class="fa-sharp fa-solid fa-circle-xmark text-3xl" style="color: #E44F47;"></i>
                            <div>
                                <p class="line-clamp-4">
                                    Uploaded document <span class="font-bold text-text-default-darker"> HOW TO WRITE
                                        IELTS REPORTS
                                        Ielts-Writing-task1 </span>
                                    unaccepted, reason: Your document was already on the website.
                                </p>
                            </div>
                        </li>
                        <li
                            class="flex gap-2.5 items-center text-text-default text-base py-2 px-6 md:py-6 border-b first-of-type:border-t border-slate-300 border-solid hover:bg-green-100 hover:cursor-pointer">
                            <i class="fa-solid fa-circle-check text-secondary text-3xl"></i>
                            <div>
                                <p class="line-clamp-4">
                                    Uploaded document <span class="text-primary font-bold">pros and cons a debater
                                        handbook 19th edition</span>
                                    accepted! You have received unlimited access!
                                </p>
                            </div>
                        </li>
                        <li
                            class="flex gap-2.5 items-center text-text-default text-base py-2 px-6 md:py-6 border-b first-of-type:border-t border-slate-300 border-solid hover:bg-green-100 hover:cursor-pointer">
                            <i class="fa-solid fa-circle-check text-secondary text-3xl"></i>
                            <div>
                                <p class="line-clamp-4">
                                    Uploaded document <span class="text-primary font-bold">pros and cons a debater
                                        handbook 19th edition</span>
                                    accepted! You have received unlimited access!
                                </p>
                            </div>
                        </li>
                        <li
                            class="flex gap-2.5 items-center text-text-default text-base px-6 py-2 md:py-6 border-b first-of-type:border-t border-slate-300 border-solid hover:bg-green-100 hover:cursor-pointer">
                            <i class="fa-sharp fa-solid fa-circle-xmark text-3xl" style="color: #E44F47;"></i>
                            <div>
                                <p class="line-clamp-4">
                                    Uploaded document <span class="font-bold text-text-default-darker"> HOW TO WRITE
                                        IELTS REPORTS
                                        Ielts-Writing-task1 </span>
                                    unaccepted, reason: Your document was already on the website.
                                </p>
                            </div>
                        </li>
                        <li
                            class="flex gap-2.5 items-center text-text-default text-base py-2 px-6 md:py-6 border-b first-of-type:border-t border-slate-300 border-solid hover:bg-green-100 hover:cursor-pointer">
                            <i class="fa-solid fa-circle-check text-secondary text-3xl"></i>
                            <div>
                                <p class="line-clamp-4">
                                    Uploaded document <span class="text-primary font-bold">pros and cons a debater
                                        handbook 19th edition</span>
                                    accepted! You have received unlimited access!
                                </p>
                            </div>
                        </li>
                        <li
                            class="flex gap-2.5 items-center text-text-default text-base py-2 px-6 md:py-6 border-b first-of-type:border-t border-slate-300 border-solid hover:bg-green-100 hover:cursor-pointer">
                            <i class="fa-solid fa-circle-check text-secondary text-3xl"></i>
                            <div>
                                <p class="line-clamp-4">
                                    Uploaded document <span class="text-primary font-bold">pros and cons a debater
                                        handbook 19th edition</span>
                                    accepted! You have received unlimited access!
                                </p>
                            </div>
                        </li>
                        <li
                            class="flex gap-2.5 items-center text-text-default text-base px-6 py-2 md:py-6 border-b first-of-type:border-t border-slate-300 border-solid hover:bg-green-100 hover:cursor-pointer">
                            <i class="fa-sharp fa-solid fa-circle-xmark text-3xl" style="color: #E44F47;"></i>
                            <div>
                                <p class="line-clamp-4">
                                    Uploaded document <span class="font-bold text-text-default-darker"> HOW TO WRITE
                                        IELTS REPORTS
                                        Ielts-Writing-task1 </span>
                                    unaccepted, reason: Your document was already on the website.
                                </p>
                            </div>
                        </li>
                        <li
                            class="flex gap-2.5 items-center text-text-default text-base py-2 px-6 md:py-6 border-b first-of-type:border-t border-slate-300 border-solid hover:bg-green-100 hover:cursor-pointer">
                            <i class="fa-solid fa-circle-check text-secondary text-3xl"></i>
                            <div>
                                <p class="line-clamp-4">
                                    Uploaded document <span class="text-primary font-bold">pros and cons a debater
                                        handbook 19th edition</span>
                                    accepted! You have received unlimited access!
                                </p>
                            </div>
                        </li>
                        <a href="notifycation.html"
                            class="block text-base md:text-lg text-primary font-semibold text-center p-6 hover:cursor-pointer hover:underline hover:decoration-2">
                            See more notifications
                        </a>
                    </ul>
                </div>
            </div>
            <div x-data="{ open: false }" class="relative">
                <div @click="open = !open " id="profile_icon" class="flex items-center hover:cursor-pointer">
                    <img class="w-10 rounded-full"
                        src="https://lh3.googleusercontent.com/a/AEdFTp45mrUSLMGlduYjPfK7FMlyXLIvTKw8WS5gri6LyQ=s96-c"
                        alt="Student" loading="lazy" data-initials="GN">
                    <i class="text-sm md:text-base fa-solid fa-chevron-down ml-2"></i>
                </div>
                <div x-cloak x-show="open" @click.outside="open = false" id="profiles"
                    class=" absolute top-[calc(100%+10px)] md:top-[calc(100%+16px)] right-0 w-80 border border-solid border-slate-300 rounded-1.5lg text-text-default  bg-white z-50">
                    <span
                        class=" -translate-x-[200%] md:block absolute w-4 h-4  rotate-45 right-0 z-10 bg-white border-t border-l border-solid border-slate-300 -translate-y-[calc(100%-7px)] )"></span>
                    <div class="  flex flex-col  rounded select-none">
                        <a href=""
                            class="flex justify-between items-center rounded-tr-[10px] rounded-tl-[10px] hover:cursor-pointer group px-6 py-4 hover:bg-green-100 relative z-50">
                            <span class="font-thin  group-hover:text-primary ">Home</span>
                            <i class="fa-solid fa-house text-primary"></i>
                        </a>
                        <a href=""
                            class="flex justify-between items-center hover:cursor-pointer group px-6 py-4 hover:bg-green-100 hover:text-primary ">
                            <span class="font-thin ">Profile</span>
                            <i class="fa-solid fa-user text-primary"></i>
                        </a>
                        <a href=""
                            class="flex justify-between items-center hover:cursor-pointer group px-6 py-4 hover:bg-green-100 hover:text-primary">
                            <span class="font-thin ">Settings</span>
                            <i class="fa-solid fa-gear text-primary"></i>
                        </a>
                        <a href=""
                            class="flex justify-between items-center hover:cursor-pointer group px-6 py-4 hover:bg-green-100 hover:text-primary">
                            <span class="font-thin ">Uploads</span>
                            <i class="fa-solid fa-cloud-arrow-up text-primary"></i>
                        </a>
                        <a href=""
                            class="flex justify-between items-center rounded-br-[10px] rounded-bl-[10px] border-t border-solid border-slate-300 hover:cursor-pointer group px-6 py-4 hover:bg-green-100 hover:text-primary">
                            <span class="font-thin">Sign out</span>
                            <i class="fa-solid fa-right-from-bracket text-primary"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

{{-- search bar responsive --}}
<div x-cloak x-show="open_search_responsive" class=" p-4 md:hidden bg-white md:px-10">
    <div x-data="searchs" @click.outside="open_search_responsive = false"
        class="container mx-auto h-10  flex items-center container_search lg:ml-10 relative border border-slate-300 rounded-4xl hover:border-primary grow group">
        <div class=" grow flex items-center justify-between md:mr-3">
            <input x-model="search" id="search_global"
                class="search rounded-4xl  md:pl-6 w-full  px-4   outline-none placeholder:text-base   md:placeholder:text-lg placeholder:font-thin placeholder:text-search  peer "
                type="text" placeholder="Search for documents, universities and other resources">
            <ul id="relative_search_result"
                class="hidden absolute border shadow border-slate-300 rounded bg-white  w-full peer-focus:block top-[calc(100%+10px)] lg:top-[calc(100%+20px)] max-h-[75vh] overflow-y-auto  scrollbar-thin scrollbar-thumb-rounded-lg scrollbar-thumb-gray-200 hover:scrollbar-thumb-gray-700 z-50">
                <li class="p-2.5 text-primary" x-show="!noResults"># Relative search result</li>
                <template x-for="item in filterSearchs">
                    <li class="hover:bg-slate-100 px-2.5">
                        <a href="" class="text-base text-text-default-darker inline-block p-2 font-medium"
                            x-text="item.name">
                        </a>
                    </li>
                </template>
                <li class="text-red-400 p-2.5" x-show="noResults"> No result!</li>
            </ul>
        </div>
        <button class="mr-4 group-hover:text-primary">
            <i class="fa-solid fa-magnifying-glass"></i>
        </button>
    </div>
</div>
