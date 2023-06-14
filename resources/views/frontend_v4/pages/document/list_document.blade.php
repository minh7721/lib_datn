@extends('frontend_v4.layouts.master')
@push('before_styles')
@endpush

@push('after_styles')
@endpush

@push('before_scripts')
@endpush

@section('content')
    <div class="px-4 md:px-8 lg:px-10">
        <div class="bg-white container mx-auto relative">
            <div x-data="searchs" class="mt-4">
                <div x-data="{numberShow:10}" class="mb-4 lg:mb-8">
                    <h2 class="font-semibold text-default-darker text-sm md:text-base lg:text-2xl mb-4 md:mb-6">
                        List document of: {{ $category->name }}
                    </h2>
                    <div
                        class="mb-4 lg:mb-8 flex justify-between gap-5 md:gap-4 lg:gap-6 flex-col text-default-lighter ">
{{--                        <template x-for="i in numberShow">--}}
                            @foreach($documents as $document)
                                @include('frontend_v4.components.document-list-item')
                            @endforeach
{{--                        </template>--}}

                    </div>
                    <button @click="numberShow+=5"
                            x-cloak x-show="numberShow<20" class="hidden md:block py-3 w-full mt-4 text-base font-medium text-primary rounded-full border-2 border-primary hover:bg-primary hover:text-white">
                        <span>Show more</span>
                        <i class="fa-solid fa-angle-down ml-3"></i>
                    </button>
                    <div class="flex justify-center md:hidden ">
                        <button
                            class="text-sm md:text-base inline-flex items-center  gap-2.5 p-2 text-slate-300 ">
                            <i class="fa-solid fa-chevron-left"></i>
                            <span class="font-medium ">Previous</span>
                        </button>
                        <button
                            class="text-sm md:text-base inline-flex items-center gap-2.5 p-2 text-primary ">
                            <span class="font-medium">Next</span>
                            <i class="fa-solid fa-chevron-right"></i>
                        </button>
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection
