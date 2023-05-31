@extends('frontend_v4.layouts.master')

@push('before_styles')
@endpush

@push('after_styles')
@endpush

@push('before_scripts')
@endpush

@section('content')
    <div class="bg-white py-8 px-4 ">
        <div class="container mx-auto flex gap-4 font-light text-lg">
            <a href="" class="text-primary-lighter">Schools</a>
            <span class="text-default-lighter">
                <i class="fa-solid fa-chevron-right text-sm"></i>
            </span>
            <a href="" class="text-black">Da Nang University</a>
        </div>
    </div>
    <div class="bg-green-100  pt-4">
        <div class="container mx-auto flex flex-col md:flex-row items-center gap-10">
            <div class="aspect-square h-36 w-auto">
                <img src="https://picsum.photos/200" alt="" class="w-full h-full object-cover">
            </div>
            <div class="flex-1 flex flex-col justify-between">
                <h1 class="text-3xl sm:text-4xl">Da Nang University</h1>
                <div class="">
                    <div class="px-2 py-2">
                        <i class="fa-solid fa-location-dot pr-5"></i>
                        <span>Hai Chau, Da Nang</span>
                    </div>
                    <div class="px-2 py-2">
                        <i class="fa-solid fa-arrow-up-right-from-square pr-5"></i>
                        <a>https://www.udn.vn/</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="container mx-auto mt-9 mb-12">
            <div class="w-4/5 mx-auto flex bg-white rounded-4.5xl overflow-hidden items-center ">
                <input name="" id="" class="flex-1 border-none p-4 outline-none"
                    placeholder="Search for document in this school">
                <button class="w-6 h-6 mr-9">
                    <i class="fa-solid fa-magnifying-glass text-default-lighter"></i>
                </button>
            </div>
        </div>
        <div class="container mx-auto flex md:gap-14 justify-between md:justify-normal overflow-scroll scrollbar-none">
            <a href="/institution/university_detail" class="text-primary p-2 border-b-4 border-primary">Documents(152)</a>
            <a href="/institution/university_detail/questions"
                class="font-thin text-black p-2 border-b-4 border-transparent">Questions(152)</a>
            <a href="/institution/university_detail/students"
                class="font-thin text-black p-2 border-b-4 border-transparent">Students(152)</a>
        </div>
    </div>
    <div class="bg-white pt-8 pb-12">
        @yield('university_content')
    </div>
@endsection
