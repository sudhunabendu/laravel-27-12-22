<?php

namespace App\Http\Controllers\Administrator;

use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Image;
use App\Models\Galary;

class ImageUploadProgressController extends Controller
{
    public function index()
    {
        return view('Frontend.imageUpload');
    }

    public function imageStore(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'image' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->route('image')
                ->withErrors($validator)
                ->withInput();
        }
        $data = new Image();
        // $data->name = 'ss';
        $data->name = $request->name;

        if ($request->hasFile('image')) {
            $user_img_name = $request->file('image');
            $user_name = time() . '.' . $user_img_name->getClientOriginalExtension();
            $destinationPath = public_path('/images');
            $user_img_name->move($destinationPath, $user_name);

            $data->image = $user_name;
        }
        $data->save();

        // $name = 'ss';
        // $filename = time().'.'.request()->image->getClientOriginalExtension();
        // $request->image->move(public_path('images'),$filename);

        // $data = new Image();
        // $data->name = $name;
        // $data->image = $filename;
        // if($data->save()){
        //     echo 'ok';
        // }else{
        //     echo 'not ok';
        // }
        return response()->json(['success' => 'file uploaded success']);
    }

    public function multiUpload(){
        return view('Frontend.multiple_image_upload');
    }

    public function storeMultiUpload(Request $request){

        $input=$request->all();
        $images=array();
        if($files=$request->file('photos')){
            foreach($files as $file){
                $name=$file->getClientOriginalName();
                $file->move('image',$name);
                $images[]=$name;
            }
        }
        /*Insert your data*/

        Galary::insert( [
            'photos'=>  implode("|",$images),
            // 'description' =>$input['description'],
            //you can put other insertion here
        ]);


        // foreach($request->file('photos') as $image)
        //  {
        //       $new_name = rand() . '.' . $image->getClientOriginalExtension();
        //       $image->move(public_path('images'), $new_name);
        //       Galary::insert(['photos' => $new_name]);
        //  }

        //  $res = array(
        //   'success'  => 'Multiple Image File Has Been uploaded Successfully'
        //  );

        return response()->json(['success'=>'Multiple Image File Has Been uploaded Successfully']);
    }
}
