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

            <p class="font-semibold text-2xl py-6">Profile</p>
            <form method="POST" action="{{ route('frontend_v4.users.postProfile', $user->id) }}" enctype="multipart/form-data" class="flex flex-col mb-8 gap-6 border-t border-main-background">
                {{ csrf_field() }}
                <p class="font-semibold text-xl py-6 text-default">Account</p>
                <div class="flex flex-col md:flex-row w-full gap-4 md:gap-12">
                    <div class="flex flex-col w-full">
                        <p class="font-medium text-base text-default mb-2 ml-2">Name</p>
                        <input type="text" name="user_name" value="{{ $user->name }}" class="border border-default-lighter rounded-1.5lg px-4 py-2 hover:border-primary outline-primary">
                    </div>

                    <div class="flex flex-col w-full">
                        <p class="font-medium text-base text-default mb-2 ml-2">Avatar</p>
                        <input type="file" name="user_avatar">
                    </div>
                </div>

                <div class="flex flex-col md:flex-row w-full gap-4 md:gap-12">
                    <div class="flex flex-col w-full md:w-1/2">
                        <p class="font-medium text-base text-default mb-2 ml-2">Language</p>
                        <select name="language" class="border border-default-lighter rounded-1.5lg px-4 py-2 bg-white hover:border-primary outline-primary">
                            <option selected value="en">{{ \App\Libs\CountriesHelper\Languages::getFullName('en') }}</option>
                            @foreach(\App\Libs\CountriesHelper\Languages::getOptions() as $key => $language)
                                <option value="{{ $key }}">{{ $language }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="flex flex-col w-full md:w-1/2">
                        <p class="font-medium text-base text-default mb-2 ml-2">Region</p>
                        <select name="country" class="border border-default-lighter rounded-1.5lg px-4 py-2 bg-white hover:border-primary outline-primary">
                            <option selected value="GB">{{ \App\Libs\CountriesHelper\Countries::getFullName('GB') }}</option>
                            @foreach(\App\Libs\CountriesHelper\Countries::getOptions() as $key => $country)
                                <option value="{{ $key }}">{{ $country }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="flex flex-col md:flex-row w-full gap-4 md:gap-12">
                    <div class="flex flex-col w-full md:w-1/2">
                        <p class="font-medium text-base text-default mb-2 ml-2">Email address</p>
                        <input type="email"  name="user_email" disabled value="{{ $user->email }}" class="bg-gray-200 border border-default-lighter rounded-1.5lg px-4 py-2">
                    </div>
                    <div class="flex flex-col w-full md:w-1/2">
                        <p class="font-medium text-base text-default mb-2 ml-2">Phone number</p>
                        <input type="tel" name="user_phone" placeholder="Phone number" value="{{ $user->phone }}" class="border border-default-lighter rounded-1.5lg px-4 py-2 hover:border-primary outline-primary">
                    </div>
                </div>

                <button type="submit" class="bg-primary rounded-4.5xl hover:bg-primary-darker px-4 py-2 text-white w-3/12 md:w-2/12 lg:w-1/12">Save</button>
            </form>

            <form method="POST" action="#" class="flex flex-col mb-8 gap-6 border-t border-main-background">
                {{ csrf_field() }}

                <p class="font-semibold text-xl py-6 text-default">Change password</p>
                <div class="flex flex-col">
                    <div class="flex flex-col md:flex-row w-full gap-4 md:gap-12">
                        <div class="flex flex-col w-full md:w-1/2">
                            <p class="font-medium text-base text-default mb-2 ml-2">Current password</p>
                            <input type="password" placeholder="Old password" class="border border-default-lighter rounded-1.5lg px-4 py-2 hover:border-primary outline-primary">
                        </div>
                        <div class="flex flex-col w-full md:w-1/2">
                            <p class="font-medium text-base text-default mb-2 ml-2">New password</p>
                            <input type="password" placeholder="New password" class="border border-default-lighter rounded-1.5lg px-4 py-2 hover:border-primary outline-primary">
                        </div>
                        <div class="flex flex-col w-full md:w-1/2">
                            <p class="font-medium text-base text-default mb-2 ml-2">Confirm new password</p>
                            <input type="password" placeholder="Password confirm" class="border border-default-lighter rounded-1.5lg px-4 py-2 hover:border-primary outline-primary">
                        </div>
                    </div>
                </div>

                <button type="submit" class="bg-primary rounded-4.5xl hover:bg-primary-darker px-4 py-2 text-white w-3/12 md:w-2/12 lg:w-1/12">Save</button>
            </form>

            <div class="flex flex-col mb-8 gap-6 border-t border-main-background">
                <p class="font-semibold text-xl py-6 text-default">Email settings</p>
                <div class="flex gap-4">
                    <input type="checkbox" name="" id="email_setting">
                    <label class="text-default font-light text-base" for="email_setting">I'm ok with receiving email about my uploads, recommendations, updates, promotions and more</label>
                </div>

                <button type="submit" class="bg-primary rounded-4.5xl hover:bg-primary-darker px-4 py-2 text-white w-3/12 md:w-2/12 lg:w-1/12">Save</button>
            </div>

            <div class="flex flex-col mb-8 gap-6 border-t border-main-background">
                <p class="font-semibold text-xl py-6 text-default">Social</p>
                <div class="flex gap-4">
                    <input type="checkbox" name="" id="social_setting" checked>
                    <label class="text-default font-light text-base" for="social_setting">Use social profile picture</label>
                </div>

                <button type="submit" class="bg-primary rounded-4.5xl hover:bg-primary-darker px-4 py-2 text-white w-3/12 md:w-2/12 lg:w-1/12">Save</button>
            </div>

            <div class="flex flex-row py-6 items-center border-t border-main-background">
                <button type="submit" class="px-4 py-2 text-base font-light border border-default-lighter rounded-4.5xl hover:bg-main-background">
                    <i class="fa-solid fa-trash-can mr-2"></i>
                    Delete account
                </button>
            </div>


        </div>
    </div>
@endsection
