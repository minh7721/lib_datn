@extends('frontend_v4.layouts.master')

@push('before_styles')
@endpush

@push('after_styles')
@endpush

@push('before_scripts')
@endpush

@section('content')
    <div class="bg-white py-8 px-4 ">
        <div class="container mx-auto flex gap-4 font-light text-lg mb-12">
            <a href="" class="text-primary-lighter">Home</a>
            <span class="text-default-lighter">
                <i class="fa-solid fa-chevron-right text-sm"></i>
            </span>
            <a href="" class="text-primary-lighter">Subjects</a>
        </div>
        <div
            class="w-full max-w-6xl mx-auto mb-4 flex border border-gray-300 focus-within:border-primary bg-white rounded-4.5xl overflow-hidden items-center ">
            <input name="" id="" class="flex-1 border-none p-4 outline-none"
                placeholder="Type to start searching">
            <button class="w-6 h-6 mr-9">
                <i class="fa-solid fa-magnifying-glass text-default-lighter"></i>
            </button>
        </div>
        <div class="w-full max-w-6xl mx-auto border border-gray-300 rounded-lg py-4 px-5 mb-12">
            <div class="w-full flex mb-9 gap-2 flex-wrap pb-1 justify-center border-b border-gray-300">
                <a href="" class="flex font-medium text-primary items-center rounded-full text-base w-8 h-8 ">
                    <span class="grow text-center">A</span>
                </a>
                <a href=""
                    class="flex font-medium text-white bg-primary items-center rounded-full text-base w-8 h-8 ">
                    <span class="grow text-center">B</span>
                </a>
                <a href="" class="flex font-medium text-primary items-center rounded-full text-base w-8 h-8 ">
                    <span class="grow text-center">C</span>
                </a>
                <a href="" class="flex font-medium text-primary items-center rounded-full text-base w-8 h-8 ">
                    <span class="grow text-center">D</span>
                </a>
                <a href="" class="flex font-medium text-primary items-center rounded-full text-base w-8 h-8 ">
                    <span class="grow text-center">E</span>
                </a>
                <a href="" class="flex font-medium text-primary items-center rounded-full text-base w-8 h-8 ">
                    <span class="grow text-center">F</span>
                </a>
                <a href="" class="flex font-medium text-primary items-center rounded-full text-base w-8 h-8 ">
                    <span class="grow text-center">G</span>
                </a>
                <a href="" class="flex font-medium text-primary items-center rounded-full text-base w-8 h-8 ">
                    <span class="grow text-center">H</span>
                </a>
                <a href="" class="flex font-medium text-primary items-center rounded-full text-base w-8 h-8 ">
                    <span class="grow text-center">I</span>
                </a>
                <a href="" class="flex font-medium text-primary items-center rounded-full text-base w-8 h-8 ">
                    <span class="grow text-center">J</span>
                </a>
                <a href="" class="flex font-medium text-primary items-center rounded-full text-base w-8 h-8 ">
                    <span class="grow text-center">K</span>
                </a>
                <a href="" class="flex font-medium text-primary items-center rounded-full text-base w-8 h-8 ">
                    <span class="grow text-center">L</span>
                </a>
                <a href="" class="flex font-medium text-primary items-center rounded-full text-base w-8 h-8 ">
                    <span class="grow text-center">M</span>
                </a>
                <a href="" class="flex font-medium text-primary items-center rounded-full text-base w-8 h-8 ">
                    <span class="grow text-center">N</span>
                </a>
                <a href="" class="flex font-medium text-primary items-center rounded-full text-base w-8 h-8 ">
                    <span class="grow text-center">O</span>
                </a>
                <a href="" class="flex font-medium text-primary items-center rounded-full text-base w-8 h-8 ">
                    <span class="grow text-center">P</span>
                </a>
                <a href="" class="flex font-medium text-primary items-center rounded-full text-base w-8 h-8 ">
                    <span class="grow text-center">Q</span>
                </a>
                <a href="" class="flex font-medium text-primary items-center rounded-full text-base w-8 h-8 ">
                    <span class="grow text-center">R</span>
                </a>
                <a href="" class="flex font-medium text-primary items-center rounded-full text-base w-8 h-8 ">
                    <span class="grow text-center">S</span>
                </a>
                <a href="" class="flex font-medium text-primary items-center rounded-full text-base w-8 h-8 ">
                    <span class="grow text-center">T</span>
                </a>
                <a href="" class="flex font-medium text-primary items-center rounded-full text-base w-8 h-8 ">
                    <span class="grow text-center">U</span>
                </a>
                <a href="" class="flex font-medium text-primary items-center rounded-full text-base w-8 h-8 ">
                    <span class="grow text-center">V</span>
                </a>
                <a href="" class="flex font-medium text-primary items-center rounded-full text-base w-8 h-8 ">
                    <span class="grow text-center">W</span>
                </a>
                <a href="" class="flex font-medium text-primary items-center rounded-full text-base w-8 h-8 ">
                    <span class="grow text-center">X</span>
                </a>
                <a href="" class="flex font-medium text-primary items-center rounded-full text-base w-8 h-8 ">
                    <span class="grow text-center">Y</span>
                </a>
                <a href="" class="flex font-medium text-primary items-center rounded-full text-base w-8 h-8 ">
                    <span class="grow text-center">Z</span>
                </a>
            </div>
            <div class="w-full grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-y-4 gap-x-2">
                @for ($i = 0; $i < 10; $i++)
                    <a href="" class="p-2  sm:text-base text-sm font-thin text-default">
                        Business Demography and Environmental Studies
                    </a>
                @endfor
                @for ($i = 0; $i < 30; $i++)
                    <a href="" class="p-2  sm:text-base text-sm font-thin text-default">
                        Business and Society
                    </a>
                @endfor
            </div>
        </div>
        <div class="container mx-auto ">
            <h2 class="text-default text-2xl mb-10 font-semibold">Top Subjects</h2>
            <div class="w-full max-w-6xl mx-auto grid grid-cols-2 md:grid-cols-3 gap-x-2 gap-y-6">
                @for ($i = 0; $i < 10; $i++)
                    <a
                        class="w-full py-8 border border-gray-300 hover:border-primary rounded-md sm:text-base text-sm text-center font-light">
                        Computer Network
                    </a>
                @endfor
                @for ($i = 0; $i < 10; $i++)
                    <a
                        class="w-full py-8 border border-gray-300 hover:border-primary rounded-md sm:text-base text-sm text-center font-light">
                        Search Engine Optimization and Advertising
                    </a>
                @endfor
            </div>
        </div>
    </div>
@endsection
