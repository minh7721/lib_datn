@extends('frontend_v4.layouts.master')
@push('before_styles')
@endpush

@push('after_styles')
@endpush

@push('before_scripts')
@endpush

@section('content')
    <div class="bg-white px-4 md:px-8 lg:px-10">
        <div class="container mx-auto">

            @include('frontend_v4.alert.alert')

            <p class="font-semibold text-2xl py-6">Upload</p>
            <form method="POST" action="{{ route('frontend_v4.users.postUpload') }}" enctype="multipart/form-data" class="flex flex-col mb-8 gap-x-6 gap-y-4 border-t border-main-background">
                {{ csrf_field() }}
                <div class="flex flex-col md:flex-row w-full gap-4 md:gap-12">
                    <div class="flex flex-col w-full">
                            <div class="@error('source_url') border-red-300 @enderror bg-primary-100 flex rounded border border-dashed border-[#00A888] mb-14">
                                <div class="max-w-max mx-auto mt-20 mb-10 flex flex-col">

                                    <label for="source_url" class="flex flex-col items-center cursor-pointer">
                                        <i class="fa-solid fa-cloud-arrow-up text-primary text-3.25xl mb-5"></i>
                                        <span class="font-medium ">DRAG HERE OR SELECT FILE</span>
                                    </label>
                                    <input id="source_url" name="source_url" type="file" class="hidden" >

                                    <p class="font-light mb-5 text-center">Formats accepted: doc, docx, odt, pdf, ppt, pptx, txt</p>
                                    @error('source_url')
                                    <span class="text-red-500 font-semibold mt-3 text-lg text-center">{{ $message }}</span>
                                    @enderror
                                </div>

                            </div>
                    </div>
                </div>

                <div class="flex flex-col md:flex-row w-full gap-4 md:gap-12">
                    <div class="flex flex-col w-full">
                        <p class="font-medium text-base text-default mb-2 ml-2">Title</p>
                        <input type="text" name="title" value="" class="@error('title')border-red-300 @enderror border border-default-lighter rounded-1.5lg px-4 py-2 hover:border-primary outline-primary">
                        @error('title')
                        <span class="text-red-500 mt-3 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                </div>

                <div class="flex flex-col md:flex-row w-full gap-4 md:gap-12">
                    <div class="flex flex-col w-full md:w-1/2">
                        <p class="font-medium text-base text-default mb-2 ml-2">Category</p>
                        <div class="relative">
                            <select name="category" class="appearance-none w-full border border-default-lighter rounded-1.5lg px-4 py-2 bg-white hover:border-primary outline-primary">
                                @foreach(\App\Models\Category::get() as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path d="M10 12l-6-6h12l-6 6z" />
                                </svg>
                            </div>
                        </div>
                    </div>
                    <div class="flex flex-col w-full md:w-1/2">
                        <p class="font-medium text-base text-default mb-2 ml-2">Page number</p>
                        <input type="number" name="page_number" placeholder="Page number" value="1" class="@error('page_number') border-red-300 @enderror border border-default-lighter rounded-1.5lg px-4 py-2 hover:border-primary outline-primary">
                        @error('page_number')
                        <span class="text-red-500 mt-3 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="flex flex-col md:flex-row w-full gap-4 md:gap-12">
                    <div class="flex flex-col w-full md:w-1/2">
                        <p class="font-medium text-base text-default mb-2 ml-2">Price</p>
                        <input type="number" name="price" placeholder="Price" value="1" class="border border-default-lighter rounded-1.5lg px-4 py-2 hover:border-primary outline-primary">
                    </div>
                    <div class="flex flex-col w-full md:w-1/2">
                        <p class="font-medium text-base text-default mb-2 ml-2">Type document</p>
                        <div class="relative">
                            <select name="type_document" class="appearance-none w-full border border-default-lighter rounded-1.5lg px-4 py-2 bg-white hover:border-primary outline-primary">
                                @foreach(\App\Models\Enums\TypeDocument::toArray() as $key => $type)
                                    <option value="{{ $type }}">{{ $key }}</option>
                                @endforeach
                            </select>
                            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path d="M10 12l-6-6h12l-6 6z" />
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex flex-col md:flex-row w-full gap-4 md:gap-12">
                    <div class="flex flex-col w-full md:w-1/2">
                        <p class="font-medium text-base text-default mb-2 ml-2">Language</p>
                        <div class="relative">
                            <select name="language" class="appearance-none w-full border border-default-lighter rounded-1.5lg px-4 py-2 bg-white hover:border-primary outline-primary">
                                <option selected value="en">{{ \App\Libs\CountriesHelper\Languages::getFullName('en') }}</option>
                                @foreach(\App\Libs\CountriesHelper\Languages::getOptions() as $key => $language)
                                    <option value="{{ $key }}">{{ $language }}</option>
                                @endforeach
                            </select>
                            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path d="M10 12l-6-6h12l-6 6z" />
                                </svg>
                            </div>
                        </div>
                    </div>
                    <div class="flex flex-col w-full md:w-1/2">
                        <p class="font-medium text-base text-default mb-2 ml-2">Region</p>
                        <div class="relative">
                            <select name="country" class="appearance-none w-full border border-default-lighter rounded-1.5lg px-4 py-2 bg-white hover:border-primary outline-primary">
                                <option selected value="GB">{{ \App\Libs\CountriesHelper\Countries::getFullName('GB') }}</option>
                                @foreach(\App\Libs\CountriesHelper\Countries::getOptions() as $key => $country)
                                    <option value="{{ $key }}">{{ $country }}</option>
                                @endforeach
                            </select>
                            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path d="M10 12l-6-6h12l-6 6z" />
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="flex justify-center">
                    <button type="submit" class="bg-primary rounded-4.5xl hover:bg-primary-darker px-8 py-4 text-white w-1/2 mx-auto my-4">UPLOAD FILES</button>
                </div>
            </form>

        </div>
    </div>
@endsection
