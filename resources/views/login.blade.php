@extends('layouts.master')
@section('title', 'LoginPage')
@section('mainContent')
    <section class="container  bottom-10 left-32 flex  top-12 absolute" style="width: 80%">
        <div class=" h-96 my-auto" style="width: 50%">
            <img class="rounded-sm bg-cover shadow-md" src="{{asset('storage/clouds.jpg')}}" alt="" style="width: 100%; height:100%; border:none; ">
        </div>
        <div class=" w-96 h-96 flex justify-center  my-auto" style="width: 50%">
            <div class="h-48 mt-12">
                <h2 class="mb-5 text-lg font-bold p-2">Sign in</h2>
                <div>
                    <form action="{{route('login')}}" method="post">
                        @csrf
                        <div class="mb-4">
                            <input class="p-2 h-7 border-b-2 border-dark text-sm bg-white w-60" type="text" name="email" placeholder="Email">
                        </div>
                        <div class="mb-4">
                            <input class="p-2 h-7 border-b-2 border-dark text-sm bg-white w-60" type="password" name="password" placeholder="password">
                        </div>
                        <div class="mb-4">
                            <button type="submit" class="bg-blue-400 hover:bg-blue-500 text-sm w-28 h-8 rounded-lg text-white">Login</button>
                        </div>
                    </form>
                </div>
                <div class="mb-4">
                    <span class="text-sm">Are you have't account? <a class="text-sm text-blue-500" href="{{route('Auth#registerPage')}}">Sign up</a></span>
                </div>
                <div class="mt-4 mb-4 capitalize">
                    <span class="text-sm font-bold tracking-wide" class="text-sm" style="text-shadow:1px 1px 4px #43c8e9; color:rgb(190, 50, 218);">You can store everyting and <br>can manage for work with as supervisor and team! </span>
                </div>
            </div>
        </div>
    </section>
@endsection
