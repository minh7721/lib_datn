@extends('frontend_v4.layouts.master')

@push('before_styles')
@endpush

@push('after_styles')
@endpush

@push('before_scripts')
@endpush

@section('content')
    <div class="bg-green-100 py-8 px-4 ">
        <div class="container mx-auto mt-8">
            <h1 class="mb-4 text-3xl font-medium text-center">Find Study Resources by School</h1>
            <p class="mb-12 text-center w-4/5 mx-auto">Find the study resources you need for all your classes. Course Hero
                has millions of study documents, questions and answers and tutor questions to help you study and learn.</p>
            <div
                class="w-full max-w-6xl mx-auto mb-16 flex border border-gray-500 focus-within:border-primary bg-white rounded-4.5xl overflow-hidden items-center ">
                <input name="" id="" class="flex-1 border-none p-4 outline-none"
                    placeholder="Type to start searching">
                <button class="w-6 h-6 mr-9">
                    <i class="fa-solid fa-magnifying-glass text-default-lighter"></i>
                </button>
            </div>
            <div class="flex flex-col md:flex-row gap-5 justify-center mx-auto max-w-6xl">
                <div class="flex-1 bg-white shadow rounded">
                    <div class="w-full border-b border-gray-200 p-4 text-lg font-medium">
                        Suggested Schools Near You
                    </div>
                    <div class="w-full pl-7 pt-2 pr-6 pb-4">
                        @for ($i = 0; $i < 10; $i++)
                            <a href="/institution/university_detail"
                                class="group flex items-center p-2 min-w-full text-center lg:text-left lg:min-w-[28rem]">
                                <i class="fa-solid fa-book-open text-secondary pr-3"></i>
                                <span class="group-hover:underline text-default text-left">Trường Đại học Kinh tế – Luật,
                                    Đại học Quốc gia Thành
                                    phố
                                    Hồ Chí Minh</span>
                            </a>
                        @endfor
                    </div>
                </div>
                <div class="flex-1 bg-white shadow rounded">
                    <div class="w-full border-b border-gray-200 p-4 text-lg font-medium">
                        Most popular universities and schools
                    </div>
                    <div class="w-full pl-7 pt-2 pr-6 pb-4">
                        @for ($i = 0; $i < 10; $i++)
                            <a href="/institution/university_detail"
                                class="group flex items-center p-2 min-w-full text-center lg:text-left lg:min-w-[28rem]">
                                <i class="fa-solid fa-book-open text-secondary pr-3"></i>
                                <span class="group-hover:underline text-default text-left">Trường Đại học Luật Thành phố Hồ
                                    Chí Minh</span>
                            </a>
                        @endfor
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="bg-white">
        <h2 class="py-3 px-4 text-center text-2xl font-semibold text-default ">All universities and schools</h2>
        <div class="container mx-auto grid grid-cols-1 md:grid-cols-2 gap-x-5 max-w-6xl pb-16">
            @for ($i = 0; $i < 40; $i++)
                <a href="/institution/university_detail"
                    class="group flex items-center justify-center md:justify-start p-2 min-w-full text-center lg:text-left lg:min-w-[28rem]">
                    <i class="fa-solid fa-book-open text-secondary pr-3"></i>
                    <span class="group-hover:underline text-default">Trường Đại học Luật Thành phố Hồ Chí Minh</span>
                </a>
            @endfor
        </div>
    </div>
@endsection
