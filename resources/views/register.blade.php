@extends('layouts.master')

@section('title', 'RegisterPage')

@section('mainContent')
    <section class="container  bottom-10 left-32 flex  top-12 absolute" style="width: 80%">
        <div class=" h-96 my-auto flex justify-center" style="width: 50%">
            <div class="bg-blue-400 h-80 mt-3 pt-24 ">
                <h3 class="text-xl text-center font-extrabold text-white mb-5" style="letter-spacing: 3px;">Welcome to <br> our clouds application</h3>
                <p class="text-sm mx-6 text-white">Please create an account and join for our services on clouds application!</p>
            </div>
        </div>
        <div class=" w-96 h-96 flex justify-center  my-auto" style="width: 50%">
            <div class="h-48 mt-5">
                <h2 class="mb-5 text-lg font-bold ps-2">Sign up</h2>
                <div>
                    <form action="{{route('register')}}" method="post">
                        @csrf
                        <div class="mb-4">
                            <input class="h-7 ps-2 border-b-2 border-dark text-sm bg-white w-60" type="text" name="name" placeholder="Name">
                            @error('name')
                                <div class="text-red-500 text-sm">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <input class="h-7 ps-2 border-b-2 border-dark text-sm bg-white w-60" type="text" name="email" placeholder="Email">
                            @error('email')
                            <div class="text-red-500 text-sm">
                                {{$message}}
                            </div>
                        @enderror
                        </div>
                        <div class="mb-4">
                            <input class="h-7 ps-2 border-b-2 border-dark text-sm bg-white w-60" type="password" name="password" placeholder="password">
                            @error('password')
                            <div class="text-red-500 text-sm">
                                {{$message}}
                            </div>
                        @enderror
                        </div>
                        <div class="mb-4">
                            <input class="h-7 ps-2 border-b-2 border-dark text-sm bg-white w-60" type="password" name="password_confirmation" placeholder="confirm password">
                            @error('password_confirmation')
                            <div class="text-red-500 text-sm">
                                {{$message}}
                            </div>
                        @enderror
                        </div>
                        <div class="mb-4">
                            <button type="submit" class="bg-blue-400 hover:bg-blue-500 text-sm w-28 h-8 rounded-lg text-white">Register</button>
                        </div>
                    </form>
                </div>
                <div class="mb-4">
                    <span class="text-sm">Do you have already? <a class="text-sm text-blue-500" href="{{route('Auth#loginPage')}}">Sign in</a></span>
                </div>
            </div>
        </div>
    </section>
@endsection
