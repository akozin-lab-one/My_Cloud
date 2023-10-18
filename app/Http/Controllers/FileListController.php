<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\FileList;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class FileListController extends Controller
{
    //mainPage
    public function userMainPage(){
        // $foldername = "main";
        $category = Category::select('id')->where('name', 'Folder')->first();
        $category_two = Category::select('id')->where('name', 'File')->first();
        // dd($category->toArray());
        // dd($category_two->toArray());
        $data_folder = FileList::where('category_id', $category->id)->get();
        $data_file = FileList::where('category_id', $category_two->id)->get();
        // dd($data_file->toArray());
        return view('user.filelist.list', compact('data_folder', 'data_file' , 'category', 'category_two'));
    }

    //folderPage
    public function FolderPage($foldername){
        // dd($foldername);
        $data = FileList::where('category_id' ,'>', 2)->get();
        $data3 = FileList::where('category_id' , 3)->first();
        // dd($data3->toArray());
        $category = Category::select('id')->where('name', 'Folder')->first();
        $category_two = Category::select('id')->where('name', 'File')->first();
        $fileExtensions = array(
            "pdf",
            "doc",
            "docx",
            "txt",
            "jpg",
            "png",
            "gif",
            "mp3",
            "mp4",
        );
        // dd($fileExtensions);
        return view('user.filelist.files', compact('category', 'data','data3','category_two', 'foldername', 'fileExtensions'));
    }

    //DoubleSubFolderPage
    public function DoubleSubFolderPage($foldername, $subfoldername){
        // dd($foldername, $subfoldername);
        $data = FileList::where('category_id' ,'>', 2)->get();
        $data2 = FileList::where('file_name' , $foldername)->first();
        $data3 = FileList::where('category_id' , 3)->first();
        // dd($data2->toArray());
        $category = Category::select('id')->where('name', 'Folder')->first();
        $category_two = Category::select('id')->where('name', 'File')->first();
        $fileExtensions = array(
            "pdf",
            "doc",
            "docx",
            "txt",
            "jpg",
            "png",
            "gif",
            "mp3",
            "mp4",
        );
        return view('user.filelist.subFolder',compact('category', 'data','data2','data3','category_two', 'foldername','subfoldername', 'fileExtensions'));
    }

    //fileupload
    public function fileUploadPage(Request $request){
        $this->requestValidate($request);
        $data = $this->requestProductData($request);
        $originalFileName = $request->file('fileUpload')->getClientOriginalName();
        $fileName = pathinfo($originalFileName, PATHINFO_FILENAME);
        if(strlen($fileName) >= 8){
           $newName =  substr($fileName, 0, 3);
        }
        $fileExtension = pathinfo($originalFileName, PATHINFO_EXTENSION);
        $fileName = Str::random(10) . $newName .".". $fileExtension;
        // dd($fileName);
        $request->file('fileUpload')->storeAs('public', $fileName);
        $data['name'] = $fileName;
        if($request->currentURL != route('user#mainPage')){
            $data['category_id'] = 4;
            $data['file_name'] = $request->fileName;
            // dd($data);
        };

        FileList::create($data);

        return back()->with(['fileupload success' =>'Your file is successfully uploded']);
    }


    //folderupload
    public function folderUploadPage(Request $request){
        // dd($request->toArray());
        $this->requestfolderValidation($request);
        $data = $this->requestProductData($request);

        //folderupload process
        $uploadedFile = $request->file('folder');
        // dd($uploadedFile);
        $originalName = $uploadedFile->getClientOriginalName();
        $folderName = Str::random(10); // Generate a random folder name
        $path = 'uploads/' . $folderName;
        $data['name'] = $folderName;
        // dd($path);

        // Store the uploaded ZIP folder
        Storage::putFileAs($path, $uploadedFile, $originalName);
        FileList::create($data);

        return back()->with('success', 'Folder uploaded successfully.');
    }

    //FolderDeletePage
    public function FolderDeletePage($id){
        FileList::where('id',$id)->delete();

        return back()->with('successDelete', 'File Delete Successful');
    }

    //fileDelete
    public function FileDeletePage($id){
        FileList::where('id',$id)->delete();

        return back()->with('successDelete', 'File Delete Successful');
    }

    //folderva;idation
    private function requestfolderValidation(Request $request){
        Validator::make($request->all(),[
            'folder' => 'required|file|mimes:zip',
        ]);
    }

    //filevalidation
    private function requestValidate(Request $request){
        Validator::make($request->all(),[
            'fileUpload'=> [
                'required|mimes:png,jpg,jpeg',
                File::types(['pdf','mp3','mp3'])
            ]
        ]);
    }

    // request product data
    private function requestProductData($request){
        return[
            'user_id' =>$request->userId,
            'category_id' => $request->categoryId,
        ];
    }

}
