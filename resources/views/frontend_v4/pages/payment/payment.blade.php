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

            <p class="font-semibold text-2xl py-6">Payment</p>
{{--            <form method="POST" action="{{ route('frontend_v4.users.postProfile', $user->id) }}" enctype="multipart/form-data" class="flex flex-col mb-8 gap-6 border-t border-main-background">--}}
{{--                {{ csrf_field() }}--}}
{{--                <p class="font-semibold text-xl py-6 text-default">Account</p>--}}
{{--                <div class="flex flex-col md:flex-row w-full gap-4 md:gap-12">--}}
{{--                    <div class="flex flex-col w-full">--}}
{{--                        <p class="font-medium text-base text-default mb-2 ml-2">Name</p>--}}
{{--                        <input type="text" name="user_name" value="{{ $user->name }}" class="border border-default-lighter rounded-1.5lg px-4 py-2 hover:border-primary outline-primary">--}}
{{--                    </div>--}}

{{--                    <div class="flex flex-col w-full">--}}
{{--                        <p class="font-medium text-base text-default mb-2 ml-2">Avatar</p>--}}
{{--                        <input type="file" name="user_avatar">--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--                <div class="flex flex-col md:flex-row w-full gap-4 md:gap-12">--}}
{{--                    <div class="flex flex-col w-full md:w-1/2">--}}
{{--                        <p class="font-medium text-base text-default mb-2 ml-2">Language</p>--}}
{{--                        <div class="relative">--}}
{{--                            <select name="language" class="appearance-none w-full border border-default-lighter rounded-1.5lg px-4 py-2 bg-white hover:border-primary outline-primary">--}}
{{--                                <option selected value="en">{{ \App\Libs\CountriesHelper\Languages::getFullName('en') }}</option>--}}
{{--                                @foreach(\App\Libs\CountriesHelper\Languages::getOptions() as $key => $language)--}}
{{--                                    <option value="{{ $key }}">{{ $language }}</option>--}}
{{--                                @endforeach--}}
{{--                            </select>--}}
{{--                            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">--}}
{{--                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">--}}
{{--                                    <path d="M10 12l-6-6h12l-6 6z" />--}}
{{--                                </svg>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="flex flex-col w-full md:w-1/2">--}}
{{--                        <p class="font-medium text-base text-default mb-2 ml-2">Region</p>--}}
{{--                        <div class="relative">--}}
{{--                            <select name="country" class="appearance-none w-full border border-default-lighter rounded-1.5lg px-4 py-2 bg-white hover:border-primary outline-primary">--}}
{{--                                <option selected value="GB">{{ \App\Libs\CountriesHelper\Countries::getFullName('GB') }}</option>--}}
{{--                                @foreach(\App\Libs\CountriesHelper\Countries::getOptions() as $key => $country)--}}
{{--                                    <option value="{{ $key }}">{{ $country }}</option>--}}
{{--                                @endforeach--}}
{{--                            </select>--}}
{{--                            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">--}}
{{--                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">--}}
{{--                                    <path d="M10 12l-6-6h12l-6 6z" />--}}
{{--                                </svg>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--                <div class="flex flex-col md:flex-row w-full gap-4 md:gap-12">--}}
{{--                    <div class="flex flex-col w-full md:w-1/2">--}}
{{--                        <p class="font-medium text-base text-default mb-2 ml-2">Email address</p>--}}
{{--                        <input type="email"  name="user_email" disabled value="{{ $user->email }}" class="bg-gray-200 border border-default-lighter rounded-1.5lg px-4 py-2">--}}
{{--                    </div>--}}
{{--                    <div class="flex flex-col w-full md:w-1/2">--}}
{{--                        <p class="font-medium text-base text-default mb-2 ml-2">Phone number</p>--}}
{{--                        <input type="tel" name="user_phone" placeholder="Phone number" value="{{ $user->phone }}" class="border border-default-lighter rounded-1.5lg px-4 py-2 hover:border-primary outline-primary">--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--                <button type="submit" class="bg-primary rounded-4.5xl hover:bg-primary-darker px-4 py-2 text-white w-3/12 md:w-2/12 lg:w-1/12">Save</button>--}}
{{--            </form>--}}

        </div>
    </div>
@endsection
