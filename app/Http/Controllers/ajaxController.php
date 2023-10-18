<?php

namespace App\Http\Controllers;

use App\Models\FileList;
use Illuminate\Http\Request;

class ajaxController extends Controller
{
    //createPage
    public function folderCreatePage(Request $request){
        logger($request);

        $data = [
            'name'=>$request->folderName,
            'user_id' => $request->userId,
            'category_id' => $request->categoryId
        ];

        FileList::create($data);
    }

    //subFolderCreatePage
    public function subFolderCreatePage(Request $request){
        logger($request);

        $data = [
            'name' => $request->folderName,
            'user_id' => $request->userId,
            'category_id' => $request->categoryId
        ];

        FileList::create($data);
    }

}
