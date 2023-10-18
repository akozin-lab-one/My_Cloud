@extends('user.layouts.master')

@section('title', 'listPage')

@section('mainContent')
    <div class="mt-12">
        <h2 class="text-3xl font-bold">My File</h2>
        @if ($data_folder && $data_file !== '[]')
            <div class="mt-10 mb-5">
                <h4 class="text-xl ">Folder</h4>
            </div>
            <div class="grid grid-col-4 lg:grid-cols-4 md:grid-cols-3 gap-4 ">
                @foreach ($data_folder as $da)
                    <div
                        class="bg-gray-200 hover:bg-gray-300 drop-shadow-sm w-64 h-16 cursor-pointer rounded-lg">
                        <div class="flex shadow-sm justify-between">
                            <div class="flex ml-5 py-3">
                                <i class="fa fa-folder text-3xl"></i>

                                <a href="{{ route('user#folderPage', $da->name) }}">
                                    <h4 class="ml-7 mt-1 font-bold text-md">{{ $da->name }}</h4>
                                </a>

                            </div>

                            <button id="dropdownMenuIconButton" data-dropdown-toggle="dropdownDotsOne"
                                class="inline-flex items-center p-2 text-sm font-medium text-center text-gray-900 bg-gray-200 rounded-lg focus:ring-4 focus:outline-none dark:text-white focus:ring-gray-50 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                                type="button">
                                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="currentColor" viewBox="0 0 4 15">
                                    <path
                                        d="M3.5 1.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Zm0 6.041a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Zm0 5.959a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Z" />
                                </svg>
                            </button>

                            <!-- Dropdown menu -->
                            <div id="dropdownDotsOne"
                                class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
                                <ul class="py-2 text-sm text-gray-700 dark:text-gray-200"
                                    aria-labelledby="dropdownMenuIconButton">
                                    <li>
                                        <a href="#"
                                            class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Rename</a>
                                    </li>
                                    <li>
                                        <a href="#"
                                            class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">People</a>
                                    </li>
                                </ul>
                                <div class="py-2">
                                    <form action="{{route('userfolder#delete', $da->id)}}" method="post">
                                        @csrf
                                        <button class="ml-5 " type="submit">Delete</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="mt-10 mb-5">
                <h4 class="text-xl ">File</h4>
            </div>

            <div class="grid grid-col-1 lg:grid-cols-3 md:grid-cols-3 gap-y-3">
                @foreach ($data_file as $da)
                    <div class="bg-gray-200 hover:bg-gray-300 w-64 h-16 cursor-pointer rounded-lg">
                        <div class="flex ml-2 py-3">
                            <i class="fa fa-folder text-3xl"></i>
                            <h4 class="ml-5 mt-1 font-bold text-xs mr-7">{{ $da->name }}</h4>
                            <button id="dropdownMenuIconButton" data-dropdown-toggle="dropdownDots"
                                class="inline-flex ml-7 items-center p-2 text-sm font-medium text-center text-gray-900 bg-gray-200 rounded-lg focus:ring-4 focus:outline-none dark:text-white focus:ring-gray-50 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                                type="button">
                                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="currentColor" viewBox="0 0 4 15">
                                    <path
                                        d="M3.5 1.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Zm0 6.041a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Zm0 5.959a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Z" />
                                </svg>
                            </button>

                            <!-- Dropdown menu -->
                            <div id="dropdownDots"
                                class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
                                <ul class="py-2 text-sm text-gray-700 dark:text-gray-200"
                                    aria-labelledby="dropdownMenuIconButton">
                                    <li>
                                        <a href="#"
                                            class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Rename</a>
                                    </li>
                                    <li>
                                        <a href="#"
                                            class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">People</a>
                                    </li>
                                </ul>
                                <div class="py-2">
                                    <form action="{{route('userfile#delete', $da->id)}}" method="post">
                                        @csrf
                                        <button class="ml-5 " type="submit">Delete</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <img class="w-80 mx-auto mb-3" src="{{ asset('storage/clouds.jpg') }}" alt="">
                    </div>
                @endforeach
            </div>
        @else
            <div class="flex mt-8">
                There is no file or Folder in your cloud!!
            </div>
        @endif
    </div>
@endsection
@section('myscript')
    {{-- <script>
        $(document).ready(function() {
            $("#btn").click(function() {
                $userId = $('#userId').val();
                $folderId = $('#categoryId').val();
                $folderName = $("#folder").val();
                // alert($folderName);

                $data = {
                'userId':$userId,
                'categoryId': $folderId,
                'folderName' : $folderName,
            }

            console.log($data);

            $.ajax({
                    type : 'get',
                    url : 'http://127.0.0.1:8000/user/ajax/create/folder',
                    data : $data,
                    dataType : 'json',
            })

            location.reload();
            });
        });
    </script> --}}
@endsection
