<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\contents;
use App\Models\dosens;
use App\Models\owners;
use App\Models\specialities;
use App\Models\tags;
use App\Models\User;
use Dotenv\Util\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;

class adminDashboardController extends Controller
{
    public function showAnalytic(){
        return view('admin.dashboard.analytic');
    }

    public function showPortoList(){
        $arrayTags = [];
        $datas =  DB::table('contents')
        ->join('dosens', 'contents.id_dosen', '=', 'dosens.id')
        ->select('contents.*', 'dosens.name')
        ->paginate(7);

        foreach($datas as $data){
            $tmp = [];
            $tags = tags::where('id_content', $data->id)->get();
            foreach($tags as $tag){
                array_push($tmp, $tag);
            }
            array_push($arrayTags, $tmp);
        }
        return view('admin.dashboard.porto', compact('datas', 'arrayTags'));
    }

    public function showMemberList(){

        $datas =   DB::table('contents')
        ->join('dosens', 'contents.id_dosen', '=', 'dosens.id')
        ->select('contents.*', 'dosens.*')
        ->distinct()
        ->paginate(7);

        $dosens = dosens::paginate(7);

        $arraySpecialities = [];
        $projectCount = [];

        foreach($dosens as $data){
            $tmp = [];
                $specialities = specialities::where('id_dosen', $data->id)->get();
                foreach($specialities as $speciality){
                    array_push($tmp, $speciality->speciality);
                }
                array_push($arraySpecialities, $tmp);
        }

        // dd($arraySpecialities);

        foreach ($dosens as $data){
            $tmpcount = contents::where('id_dosen', $data->id)->count();
            array_push($projectCount, $tmpcount);
        }

        $datauser = session('datauser');
        return view('admin.dashboard.memberlist', compact('datas', 'arraySpecialities', 'projectCount', 'dosens','datauser'));
    }



    public function showMemberListDetail(String $id){

        $datas =   DB::table('contents')
        ->join('dosens', 'contents.id_dosen', '=', 'dosens.id')
        ->select('contents.*', 'dosens.*')
        ->where('dosens.id', '=', $id)
        ->distinct()
        ->get();

        $contents = contents::where('id_dosen', $id)->paginate(7);
        $dosens = dosens::where('dosens.id', '=', $id)->first();
        $emails = DB::table('users')
        ->select('users.email')
        ->where('users.id', '=', $dosens->id_user)
        ->first();


        // $arraySpecialities = [];
        $arrayCategories = [];
        $arrayStudents = [];

        foreach($contents as $content){
            $tmp = [];
                $owners = owners::where('id_content', $content->id)->get();
                foreach($owners as $owner){
                    array_push($tmp, $owner->owner_name);
                }
                array_push($arrayStudents, $tmp);
        }

        foreach($contents as $content){
            $tmp = [];
                $tags = tags::where('id_content', $content->id)->get();
                foreach($tags as $tag){
                    array_push($tmp, $tag->tag);
                }
                array_push($arrayCategories, $tmp);
        }

        // foreach($dosens as $data){
        //     $tmp = [];
        //         $specialities = specialities::where('id_dosen', $data->id)->get();
        //         foreach($specialities as $speciality){
        //             array_push($tmp, $speciality->speciality);
        //         }
        //         array_push($arraySpecialities, $tmp);
        // }

        $specialities = specialities::where('id_dosen', $dosens->id)->get();

        $projectCount = $datas->count();

        return view('admin.dashboard.memberlist_detail', compact('datas', 'specialities', 'arrayCategories', 'arrayStudents', 'projectCount', 'dosens', 'contents', 'emails'));

    }

    public function editMemberProfiles(String $id){

        if(Auth::user()->role == "Admin"){
            $dosens = dosens::find($id);
            return view('admin.dashboard.edit_profile', compact('dosens'));
        }else{
            $dosens = dosens::where('id_user', Auth::user()->id)->first();
            return view('admin.dashboard.edit_profile', compact('dosens'));
        }
    }

    public function saveEditMemberProfiles(Request $request, String $id){

        $dosens = dosens::find($id);

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'major' => 'required',
            'contact' => 'required',
            'image_profile' => 'nullable|image|mimes:jpeg,jpg,png|max:2048'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }

        if($request->hasFile('image_profile')){
            $image = $request->file('image_profile');

            $folderPathCard = public_path('storage/photos/card');
            $folderPathIcon = public_path('storage/photos/icon');
            $folderPathProfileView = public_path('storage/photos/profile_view');

            if (!File::isDirectory($folderPathCard)) {
                File::makeDirectory($folderPathCard, 0777, true, true);
            }
            if (!File::isDirectory($folderPathIcon)) {
                File::makeDirectory($folderPathIcon, 0777, true, true);
            }
            if (!File::isDirectory($folderPathProfileView)) {
                File::makeDirectory($folderPathProfileView, 0777, true, true);
            }

            $filenameWithExt = $request->file('image_profile')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('image_profile')->getClientOriginalExtension();
            $filenameSimpan = $filename . '_' . time() . '.' . $extension;


            $originalPath = public_path('storage/photos/original/' . $dosens->image_profile);
            // Simpan gambar asli
            if (File::exists($originalPath)) {
                File::delete($originalPath);
            }
            $path = $request->file('image_profile')->storeAs('storage/photos/original', $filenameSimpan);


            // Buat thumbnail dengan lebar dan tinggi yang diinginkan
            $viewPath = public_path('storage/photos/card/' . $filenameSimpan);
            if (File::exists($viewPath)) {
                File::delete($viewPath);
            }
            Image::make($image)
                ->fit(400, 450)
                ->save($viewPath);


            // Buat versi persegi dengan lebar dan tinggi yang sama
            $thumbnailPath = public_path('storage/photos/profile_view/' . $filenameSimpan);
            if (File::exists($thumbnailPath)) {
                File::delete($thumbnailPath);
            }
            Image::make($image)
                ->fit(300, 400)
                ->save($thumbnailPath);


             // Buat versi persegi dengan lebar dan tinggi yang sama
             $squarePath = public_path('storage/photos/icon/' . $filenameSimpan);
             if (File::exists($squarePath)) {
                File::delete($squarePath);
            }

             Image::make($image)
                 ->fit(100, 100)
                 ->save($squarePath);


        $dosens->update([
            'name'     => $request->name,
            'major'   => $request->major,
            'contact'   => $request->contact,
            'image_profile' => $filenameSimpan
        ]);
        }
        else {
            $dosens->update([
                'name'     => $request->name,
                'major'   => $request->major,
                'contact'   => $request->contact
            ]);
        }

        $specialities = specialities::where('id_dosen', $id)->get();
        // dd($specialities->id, $id);

        foreach ($specialities as $speciality){
            // dd($speciality);
            $speciality->delete();
        }

        foreach($request->specialities as $data){
            specialities::create([
                'id_dosen' => $request->id,
                'speciality' => $data
            ]);
        }

        return redirect()->route('admin.dashboard.member.detail', $id)->withSuccess('Account succesfully updated.');

    }
}