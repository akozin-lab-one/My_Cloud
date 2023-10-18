<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>

<body>

    <nav class="bg-white border-gray-200 dark:bg-gray-900 border border-b-1 fixed top-0 z-[100]" style="width:100%;">
        <div class="max-w-screen-2xl flex flex-wrap items-center justify-between mx-auto p-4">
            <a href="https://flowbite.com/" class="flex items-center ">
                {{-- <img src="https://flowbite.com/docs/images/logo.svg" class="h-8 mr-3" alt="Flowbite Logo" /> --}}
                <span
                    class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white uppercase">My_Cloud</span>
            </a>
            <div class="flex items-center md:order-2 ">
                <button type="button"
                    class="flex text-sm bg-gray-800 rounded-full md:mr-0 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600"
                    id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown"
                    data-dropdown-placement="bottom">
                    <span class="sr-only">Open user menu</span>
                    <img class="w-8 h-8 rounded-full" src="/docs/images/people/profile-picture-3.jpg" alt="user photo">
                </button>
                <!-- Dropdown menu -->
                <div class="z-50 hidden my-4 bg-gray-300 text-base list-none w-80 h-96 divide-y divide-gray-100 rounded-lg shadow dark:bg-gray-700 px-18 dark:divide-gray-600"
                    id="user-dropdown">
                    <div class="px-4 py-3">
                        <span class="block text-sm text-gray-900 dark:text-white">Bonnie Green</span>
                        <span class="block text-sm  text-gray-500 truncate dark:text-gray-400">name@flowbite.com</span>
                    </div>
                    <ul class="py-2" aria-labelledby="user-menu-button">
                        <li>
                            <a href="#"
                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Dashboard</a>
                        </li>
                        <li>
                            <a href="#"
                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Settings</a>
                        </li>
                        <li>
                            <a href="#"
                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Earnings</a>
                        </li>
                        <li>
                            <form action="{{ route('logout') }}" method="post">
                                @csrf
                                <button type="submit"
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Sign
                                    out</button>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>


    <section class="flex ">
        <div class=" flex-1 w-52 bg-gray-300 fixed bottom-0 z-[100]" style="height: 89.8%">
            <button id="dropdownAvatarNameButton" data-dropdown-toggle="dropdownAvatarName"
                class="bg-white w-24 h-12 rounded-md shadow-md hover:bg-gray-100 hover:shadow-md mt-12 ml-5"><i
                    class="fa fa-plus mr-2"></i>Create</button>

            <!-- Dropdown menu -->
            <div id="dropdownAvatarName"
                class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
                <ul class="py-2 text-sm text-gray-700 dark:text-gray-200"
                    aria-labelledby="dropdownInformdropdownAvatarNameButtonationButton">
                    <li>

                        <button data-modal-target="popup-modal" data-modal-toggle="popup-modal"
                            class="w-44 px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white"
                            type="button">
                            <i class="fa fa-folder-plus"></i>New Folder
                        </button>

                    </li>
                    <li>
                        <button data-modal-target="popup-modal-one" data-modal-toggle="popup-modal-one" id="fileUpload"
                            class="w-44 px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white"
                            type="button">
                            <i class="fa fa-folder-plus"></i>File Upload
                        </button>
                    </li>
                    <li>
                        <button data-modal-target="popup-modal-two" data-modal-toggle="popup-modal-two"
                            class="w-44 px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white"
                            type="button">
                            <i class="fa fa-folder-plus"></i>Folder Upload
                        </button>
                    </li>
                </ul>
            </div>

        </div>
        <section class="flex-1 absolute left-56 top-12" style="width: 83%">
            @yield('mainContent')
            <div id="popup-modal" tabindex="-1"
                class="fixed top-0 left-0 right-0 z-50 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                <div class="relative w-full max-w-md max-h-full">
                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                        <div class="p-6">
                            <form action="">
                                <h1 class="text-2xl font-bold">New Folder</h1>
                                <input class="border rounded-md w-96 mt-6" type="hidden" name="userId" id="userId"
                                    id="" value="{{ Auth::user()->id }}">
                                <input class="border rounded-md w-96 mt-6" type="hidden" name="categoryId"
                                    id="categoryId" id="" value="{{ $category->id }}">
                                <input class="border rounded-md w-96 mt-6" type="text" name="folder" id="folder"
                                    id="">
                                <div class="btn-container ml-32 mt-10">
                                    <button data-modal-hide="popup-modal" type="button"
                                        class="text-gray-800 ml-2  bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">No,
                                        cancel</button>
                                    <button data-modal-hide="popup-modal" type="button" id="btn"
                                        class="text-gray-800 ml-5 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium border border-gray-200 rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                                        Yes, I'm sure
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div id="popup-modal-one" tabindex="-1"
                class="fixed top-0 left-0 right-0 z-50 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                <div class="relative w-full max-w-md max-h-full">
                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                        <div class="p-6">
                            <form action="{{route('user#fileupload')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <h1 class="text-2xl font-bold">File Upload</h1>
                                <input class="border rounded-md w-96 mt-6" type="hidden" name="userId"
                                    id="fileuserId" id="" value="{{ Auth::user()->id }}">
                                <input class="border rounded-md w-96 mt-6" type="hidden" name="categoryId"
                                    id="filecategoryId" id="" value="{{ $category_two->id }}">
                                    <input type="hidden" name="currentURL" value="{{ request()->url() }}" id="">
                                    @php
                                        $fileName = substr(request()->url(), 27,strlen(request()->url()))
                                    @endphp
                                    <input type="hidden" name="fileName" value="{{$fileName}}">
                                <input class="border rounded-md w-96 mt-6" type="File" name="fileUpload"
                                    id="folder" id="">
                                <div class="btn-container ml-32 mt-10">
                                    <button data-modal-hide="popup-modal" type="button"
                                        class="text-gray-800 ml-2  bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">No,
                                        cancel</button>
                                    <button data-modal-hide="popup-modal" type="submit" id="filebtn"
                                        class="text-gray-800 ml-5 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium border border-gray-200 rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                                        Yes, I'm sure
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div id="popup-modal-two" tabindex="-1"
                class="fixed top-0 left-0 right-0 z-50 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                <div class="relative w-full max-w-md max-h-full">
                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                        <div class="p-6">
                            <form action="{{route('user#folderupload')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <h1 class="text-2xl font-bold">New Folder</h1>
                                <input class="border rounded-md w-96 mt-6" type="hidden" name="userId"
                                    id="userId" id="" value="{{ Auth::user()->id }}">
                                <input class="border rounded-md w-96 mt-6" type="hidden" name="categoryId"
                                    id="categoryId" id="" value="{{ $category->id }}">
                                <input class="border rounded-md w-96 mt-6" type="File" webkitdirectory multiple
                                    name="folder" id="folder" id="">
                                <div class="btn-container ml-32 mt-10">
                                    <button data-modal-hide="popup-modal" type="button"
                                        class="text-gray-800 ml-2  bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">No,
                                        cancel</button>
                                    <button data-modal-hide="popup-modal" type="submit" id="btn"
                                        class="text-gray-800 ml-5 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium border border-gray-200 rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                                        Yes, I'm sure
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </section>

</body>
@yield('myscript')
<script>
    $(document).ready(function() {
        $("#btn").click(function() {
            // get value for create Or upload  folder and file
            $userId = $('#userId').val();
            $folderId = $('#categoryId').val();
            $folderName = $("#folder").val();

            // url checking
            if ($(location).attr('href') === 'http://127.0.0.1:8000/user/main/list') {
                $url = 'http://127.0.0.1:8000/user/ajax/create/folder';
                console.log($url);
                $data = {
                    'userId': $userId,
                    'categoryId': $folderId,
                    'folderName': $folderName,
                }

                console.log($data);
            } else {
                $url = 'http://127.0.0.1:8000/user/ajax/create/folder';
                console.log($url);
                $data = {
                    'userId': $userId,
                    'categoryId': '3',
                    'folderName': $folderName,
                }

                console.log($data);
            }

            //ajax get or post data
            $.ajax({
                type: 'get',
                url: $url,
                data: $data,
                dataType: 'json',
            })

            location.reload();
        });
        $("#fileUpload").click(()=> {
            $("#filebtn").click(function() {
                $userId = $('#fileuserId').val();
                $fileId = $('#filecategoryId').val();
                let fileName = $("#fileUploadValue").val();
                console.log(fileName)
                // let fileParts = fileName.split("\\"); // Use "\\" for Windows paths
                // $selectedFileName = $fileParts[$fileParts.length - 1];

                $data = {
                    'userId': $userId,
                    'categoryId': $fileId,
                    'fileName': $selectedFileName,
                }

                console.log($data);

                //ajax get or post data
                // $.ajax({
                //     type: 'post',
                //     url: 'http://127.0.0.1:8000/user/ajax/upload/file',
                //     data: $data,
                //     dataType: 'json',
                // })

                // location.reload();
            })
        })
    });
</script>

</html>
