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
            <div x-data="{open_payment_content:false}">
                <button @click="open_payment_content=!open_payment_content"
                    class="shadow-btn font-medium rounded-full px-5 py-2 hidden md:inline-flex items-center justify-center gap-2 hover:bg-primary hover:text-white">
                    <i class="fa fa-globe"></i>
                    Payment
                </button>
                <div x-data="{open_payment_body:true,open_payment_vnpay:false,open_payment_paypal:false}" x-cloak x-show="open_payment_content" tabindex="-1" aria-hidden="true"
                     class="fixed top-0 left-0 right-0 h-screen bg-gray-400 bg-opacity-50  z-50 p-4 overflow-x-hidden overflow-y-auto md:inset-0"
                     aria-modal="true" role="dialog">
                    <div @click.outside="open_payment_content = false; open_payment_body=false; open_payment_vnpay = false; open_payment_paypal = false;"
                         class="relative max-w-2xl max-h-full mx-auto mt-48">
                        <!-- Modal content -->
                        <div class="relative bg-white rounded-lg shadow">
                            <!-- Modal header -->
                            <div class="flex items-start justify-between p-4 rounded-t">
                                <h3 class="font-bold text-text-default-darker text-xl mx-auto my-2">
                                    Please choose payment method
                                </h3>
                            </div>
                            <!-- Modal body -->
                            <div x-show="open_payment_body" class="space-y-6 px-6 py-2">
                                <div
                                    @click="open_payment_vnpay=true;open_payment_body=false;"
                                    class="flex flex-row gap-2 justify-center items-center rounded-4.5xl border border-[#AFAFAF] px-4 py-4 hover:bg-main-background cursor-pointer">
                                    <img src="{{ asset('assets_v4/images/logo/vnpay-logo-inkythuatso-01.png') }}"
                                         class="h-8 object-fill">
                                    <p class="text-default font-normal text-lg">Continue with VNPay</p>
                                </div>

                                <div
                                    @click="open_payment_paypal=true;open_payment_body=false;"
                                    class="flex flex-row gap-2 justify-center items-center rounded-4.5xl border border-[#AFAFAF] px-4 py-4 hover:bg-main-background cursor-pointer">
                                    <img src="{{ asset('assets_v4/images/logo/paypal_icon.png') }}"
                                         class="h-8 object-fill">
                                    <p class="text-default font-normal text-lg">Continue with Paypal</p>
                                </div>

                            </div>
                            <div x-cloak x-show="open_payment_vnpay"  class="space-y-6 px-6 py-2">
                                <form method="post" action="#"
                                      class="space-y-6">
                                    {{ csrf_field()}}
                                    @if ($errors->any())
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>
                                                    <p class="rounded-1.5lg bg-red-200 px-4 py-2 text-center w-full text-base text-red-700">
                                                        {{ $error }}
                                                    </p>
                                                </li>
                                            @endforeach
                                        </ul>
                                    @endif
                                    <div class="show_error"></div>

                                    <div @click="open_payment_vnpay=false;open_payment_body=true"
                                         class="flex flex-row items-center text-primary gap-3 cursor-pointer">
                                        <i class="fa-solid fa-arrow-left"></i>
                                        <p class="text-lg font-normal">Other payment option</p>
                                    </div>
                                    <div class="w-full">
                                        <p class="text-default text-base font-medium mb-3">Select the amount you want to deposit</p>
                                        <input type="number" name="price" id="price" placeholder="Select the amount you want to deposit"
                                               class="text-base font-medium rounded-1.5lg px-3 py-4 border border-main-background w-full hover:border-primary outline-primary">
                                    </div>

                                    <button type="submit" id="sign_in"
                                            class="w-full text-white font-normal text-lg mb-6 flex flex-row gap-2 justify-center items-center rounded-4.5xl px-4 py-2 bg-primary hover:bg-primary-darker">
                                        Continue
                                    </button>
                                </form>

                            </div>
                            <div x-cloak x-show="open_payment_paypal"  class="space-y-6 px-6 py-2">
                                <form method="post" action="#"
                                      class="space-y-6">
                                    {{ csrf_field()}}
                                    @if ($errors->any())
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>
                                                    <p class="rounded-1.5lg bg-red-200 px-4 py-2 text-center w-full text-base text-red-700">
                                                        {{ $error }}
                                                    </p>
                                                </li>
                                            @endforeach
                                        </ul>
                                    @endif
                                    <div class="show_error"></div>

                                    <div @click="open_payment_paypal=false;open_payment_body=true"
                                         class="flex flex-row items-center text-primary gap-3 cursor-pointer">
                                        <i class="fa-solid fa-arrow-left"></i>
                                        <p class="text-lg font-normal">Other payment option</p>
                                    </div>
                                    <div class="w-full">
                                        <p class="text-default text-base font-medium mb-3">Select the amount you want to deposit</p>
                                        <input type="number" name="price" id="price" placeholder="Select the amount you want to deposit"
                                               class="text-base font-medium rounded-1.5lg px-3 py-4 border border-main-background w-full hover:border-primary outline-primary">
                                    </div>

                                    <button type="submit" id="sign_in"
                                            class="w-full text-white font-normal text-lg mb-6 flex flex-row gap-2 justify-center items-center rounded-4.5xl px-4 py-2 bg-primary hover:bg-primary-darker">
                                        Continue
                                    </button>
                                </form>

                            </div>
                            <!-- Modal footer -->
                            <div class="flex justify-end items-center p-6 space-x-2">
                                <button @click="open_payment_content=false" data-modal-hide="modal_content" type="button"
                                        class="text-primary bg-gray-100 hover:bg-gray-300 font-medium rounded-full text-base px-5 py-2.5 text-center">
                                    Cancel
                                </button>
                                <button @click="open_report_content=false" data-modal-hide="modal_report" type="button"
                                        class="w-24 text-white bg-primary hover:bg-primary-darker disabled:opacity-40 hover:bg-opacity-70 rounded-full border border-gray-200 text-base font-medium px-5 py-2.5 focus:z-10">
                                    Send
                                </button>
                            </div>
                        </div>
{{--                        <div x-cloak x-show="!open_report_content"--}}
{{--                             class="relative bg-white rounded-lg shadow p-4 max-w-lg mx-auto">--}}
{{--                            <div class="text-right mb-2 pr-1">--}}
{{--                                <i @click="open_report=false; open_report_content=true"--}}
{{--                                   class="fa-solid fa-xmark text-lg cursor-pointer"></i>--}}
{{--                            </div>--}}
{{--                            <div class=" text-center mb-4 flex items-center justify-center">--}}
{{--                                <svg width="34" height="34" viewBox="0 0 34 34" fill="none"--}}
{{--                                     xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">--}}
{{--                                    <rect width="34" height="34" fill="url(#pattern0)"/>--}}
{{--                                    <defs>--}}
{{--                                        <pattern id="pattern0" patternContentUnits="objectBoundingBox" width="1"--}}
{{--                                                 height="1">--}}
{{--                                            <use xlink:href="#image0_1040_266" transform="scale(0.0078125)"/>--}}
{{--                                        </pattern>--}}
{{--                                        <image id="image0_1040_266" width="128" height="128"--}}
{{--                                               xlink:href="data:image/png;base64,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"/>--}}
{{--                                    </defs>--}}
{{--                                </svg>--}}

{{--                                <span class="font-medium">Thanks for reporting</span>--}}
{{--                            </div>--}}
{{--                            <p class="text-center">We will try to solve this as quickly as possible.</p>--}}
{{--                        </div>--}}
                    </div>
                </div>
            </div>


            @if(Auth::check() === true)
                <a href="{{ route('frontend_v4.users.getUpload') }}"
                   class="w-32 bg-primary text-white font-medium rounded-full px-5 py-2 hidden lg:inline-flex items-center justify-center gap-2 hover:bg-primary-darker">
                    <i class="fa fa-cloud-arrow-up"></i>
                    Upload
                </a>
            @else
                <a href="{{ route('frontend.auth.getLogin') }}"
                   class="w-32 bg-primary text-white font-medium rounded-full px-5 py-2 hidden lg:inline-flex items-center justify-center gap-2 hover:bg-primary-darker">
                    Login
                </a>
            @endif
            <div x-data="{ open: false }" class="relative">
                <div @click="open = !open " id="profile_icon" class="flex items-center hover:cursor-pointer">
                    <img class="w-10 h-10 rounded-full"
                         src="https://lh3.googleusercontent.com/a/AEdFTp45mrUSLMGlduYjPfK7FMlyXLIvTKw8WS5gri6LyQ=s96-c"
                         alt="Student" loading="lazy" data-initials="GN">
                    <i class="text-sm md:text-base fa-solid fa-chevron-down ml-2"></i>
                </div>
                <div x-cloak x-show="open" @click.outside="open = false" id="profiles"
                     class=" absolute top-[calc(100%+10px)] md:top-[calc(100%+16px)] right-0 w-80 border border-solid border-slate-300 rounded-1.5lg text-text-default  bg-white z-50">
                    <span
                        class=" -translate-x-[200%] md:block absolute w-4 h-4  rotate-45 right-0 z-10 bg-white border-t border-l border-solid border-slate-300 -translate-y-[calc(100%-7px)] )"></span>
                    <div class="  flex flex-col  rounded select-none">
                        @if(Auth::check())
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
                            <a href="{{ route('frontend_v4.users.profile', Auth::id()) }}"
                               class="flex justify-between items-center hover:cursor-pointer group px-6 py-4 hover:bg-green-100 hover:text-primary">
                                <span class="font-thin ">Settings</span>
                                <i class="fa-solid fa-gear text-primary"></i>
                            </a>
                            <a href="#"
                               class="flex justify-between items-center hover:cursor-pointer group px-6 py-4 hover:bg-green-100 hover:text-primary">
                                <span class="font-thin ">Uploads</span>
                                <i class="fa-solid fa-cloud-arrow-up text-primary"></i>
                            </a>
                            <a href="{{ route('frontend.auth.logout') }}"
                               class="flex justify-between items-center rounded-br-[10px] rounded-bl-[10px] border-t border-solid border-slate-300 hover:cursor-pointer group px-6 py-4 hover:bg-green-100 hover:text-primary">
                                <span class="font-thin">Sign out</span>
                                <i class="fa-solid fa-right-from-bracket text-primary"></i>
                            </a>
                        @else
                            <a href="{{ route('document.home.index') }}"
                               class="flex justify-between items-center rounded-tr-[10px] rounded-tl-[10px] hover:cursor-pointer group px-6 py-4 hover:bg-green-100 relative z-50">
                                <span class="font-thin  group-hover:text-primary ">Home</span>
                                <i class="fa-solid fa-house text-primary"></i>
                            </a>
                            <a href="{{ route('frontend.auth.getLogin') }}"
                               class="flex justify-between items-center rounded-br-[10px] rounded-bl-[10px] border-t border-solid border-slate-300 hover:cursor-pointer group px-6 py-4 hover:bg-green-100 hover:text-primary">
                                <span class="font-thin">Login</span>
                                <i class="fa-solid fa-right-to-bracket text-primary"></i>
                            </a>
                        @endif

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
