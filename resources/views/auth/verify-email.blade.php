@extends('layouts.master')

@section('title', 'email_verified')

@section('mainContent')
<section class="bg-black relative top-48  h-44 p-4 rounded-md" style="left:450px; width:40%;">
    <div class="mb-4 text-sm text-gray-100">
        {{ __('Before continuing, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
    </div>

    @if (session('status') == 'verification-link-sent')
        <div class="mb-4 font-medium text-sm text-gray-100">
            {{ __('A new verification link has been sent to the email address you provided in your profile settings.') }}
        </div>
    @endif

    <div class="mt-4 flex items-center justify-between">
        <form method="POST" action="{{ route('verification.send') }}">
            @csrf

            <div>
                <button class="text-balck text-sm p-2 rounded-md bg-gray-200" type="submit">
                    {{ __('Resend Verification Email') }}
                </button>
            </div>
        </form>

        <div>
            <a
                href="{{ route('profile.show') }}"
                class="text-sm text-gray-200 hover:text-white rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
            >
                {{ __('Edit Profile') }}</a>

            <form method="POST" action="{{ route('logout') }}" class="inline">
                @csrf

                <button type="submit" class=" text-sm text-gray-200 hover:text-white rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 ml-2">
                    {{ __('Log Out') }}
                </button>
            </form>
        </div>
    </div>
</section>
@endsection
