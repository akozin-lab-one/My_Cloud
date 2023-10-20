@extends('user.layouts.master')

@section('title', 'userRename')

@section('mainContent')
    <div class=" mt-10 flex justify-center items-center h-[500px] p-4">
        <div class="bg-gray-300 rounded-sm w-[50%] text-center">
            <div class="flex justify-center my-10">
                <h3 class="font-bold">Rename File</h3>
            <a class="ml-32" href="{{route('user#mainPage')}}">Back</a>
            </div>
            <form action="{{route('userfile#Rename')}}" method="POST">
                @csrf
                <input class="w-[60%] rounded-md border-none" type="text" name="file" value="{{old('fileName', $fileName->name)}}">
                <input type="hidden" name="fileId" value="{{$id}}">
                <div class=" flex justify-end mr-28 my-3">
                    <button class="bg-black text-white block w-32 h-[35px] rounded-md drop-shadow">Change Name</button>
                </div>
            </form>
        </div>
    </div>
@endsection
