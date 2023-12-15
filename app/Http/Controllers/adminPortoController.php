<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\content_images;
use App\Models\contents;
use App\Models\dosens;
use App\Models\owners;
use App\Models\tags;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;
use PhpParser\Node\Expr\Cast\String_;

class adminPortoController extends Controller
{
    public function showAccounts(){
        $dosens = dosens::latest()->paginate(3);
        return view('admin.kelola_proyek.pilih_akun', compact('dosens'));
    }

    public function lihatKonten(String $id){
        $contents = DB::table('contents')
            ->join('dosens', 'dosens.id', '=', 'contents.id_dosen')
            ->select('contents.id', 'contents.tipe_konten', 'contents.tittle', 'contents.created_at', 'contents.id_dosen', 'dosens.name')
            ->where('id_dosen', $id)
            ->get(); // Mengeksekusi query dan mengambil satu hasil pertama

        $id_dosen =  $id;

        return view('admin.kelola_proyek.pilih_proyek', compact('contents', 'id_dosen'));
    }


    public function tambahProjek(string $id){
        $id_dosen = $id;
        return view('admin.kelola_proyek.tambah_proyek', compact('id_dosen'));
    }

    public function simpanDataProjek(Request $request, string $id)
    {
        // Validasi data yang dikirim dari formulir
        $request->validate([
            'tittle' => 'required|max:255', // Ubah sesuai kebutuhan validasi Anda
            'tipe_konten' => 'required|max:255',
            'owner_contact' => 'required|max:255',
            'description' => 'required',
            'github_url' => 'nullable|url', // Opsional jika ada
            'content_url' => 'nullable|mimes:pdf,doc', // Opsional jika ada
            // 'video_url' => 'nullable|mimes:mp4, mkv', // Opsional jika ada
            'image_url' => 'nullable|image', // Opsional jika ada
        ]);

        $isi_konten = $request->file('content_url');
        $fileName = $isi_konten->hashName();
        $isi_konten->storeAs('public/content', $fileName);

        $contents = contents::create([
            'id_dosen' => $id,
            'tittle' => $request->tittle,
            'tipe_konten' => $request->tipe_konten,
            'owner_contact' => $request->owner_contact,
            'description' => $request->description,
            'github_url' => $request->github_url,
            'content_url' => $fileName
        ]);

        $tmp_contents = contents::find($contents->id);

        tags::create([
            'id_content' => $tmp_contents->id,
            'tag' => $request->tag
        ]);

        owners::create([
            'id_content' => $tmp_contents->id,
            'owner_name' => $request->owner_name
        ]);


        if ($request->hasFile('video_url')) {
            $isi_video = $request->file('video_url');
            $fileName = $isi_video->hashName();
            $isi_video->storeAs('public/content_video', $fileName);
            $tmp_contents->update([
                'video_url'     => $fileName
            ]);
        }

        if ($request->hasFile('image_url')) {
            $isi_gambar = $request->file('image_url');
            $fileName = $isi_gambar->hashName();
            $isi_gambar->storeAs('public/content_images', $fileName);
            content_images::create([
                'id_content' => $tmp_contents->id,
                'image_url' => $fileName
            ]);
        }

        return redirect()->route('proyek.pilih_akun')->with('success', 'Proyek berhasil ditambahkan.');
    }

    public function editProjek(Request $request, String $id){
        $contents = contents::find($id);
        return view('admin.kelola_proyek.edit_proyek', compact('contents'));
    }

    public function updateProjek(Request $request, string $id){

        $contents = contents::find($id);
        $images =  content_images::where('id_content', $contents->id)->first();

        $tags = tags::find($contents->id);
        $owners = owners::find($contents->id);


        $contents->update([
            'tittle' => $request->tittle,
            'tipe_konten' => $request->tipe_konten,
            'owner_contact' => $request->owner_contact,
            'description' => $request->description,
        ]);


        if ($request->hasFile('content_url')) {

            $content = $request->file('content_url');

            $fileName = $content->hashName();

            $content->storeAs('public/content', $fileName);

            Storage::delete('public/content/'.$contents->content_url);

            $contents->update([
                'content_url' => $fileName
            ]);
    };

        if ($request->hasFile('image_url')) {

            $content = $request->file('image_url');

            $fileName = $content->hashName();

            $content->storeAs('public/content_images', $fileName);

            if($images!=null){

                Storage::delete('public/content_images/'.$images->image_url);

                $images->update([
                    'image_url' => $fileName
                ]);

            }else{
                content_images::create([
                    'id_content' => $contents->id,
                    'image_url' => $fileName
                ]);
            }
    };

        if ($request->hasFile('video_url')) {

            $content = $request->file('video_url');

            $fileName = $content->hashName();

            $content->storeAs('public/content_video',  $fileName);

            Storage::delete('public/content_video/'.$contents->video_url);

            $contents->update([
                'video_url' => $fileName
            ]);

    };

    return redirect()->route('proyek.pilih_akun')->with('success', 'Proyek berhasil di update.');
}

    public function lihatDetail(string $id){
        $contents = DB::table('contents')
            ->join('dosens', 'dosens.id', '=', 'contents.id_dosen')
            ->select('contents.id', 'contents.tipe_konten', 'contents.tittle', 'contents.id_dosen', 'contents.description', 'dosens.name', 'contents.content_url', 'contents.video_url', 'contents.github_url')
            ->where('contents.id', $id)
            ->first();


        $tags = DB::table('tags')
        ->select('tag')
        ->where('id_content', $contents->id)
        ->first();


        $images = DB::table('content_images')
        ->select('image_url')
        ->where('id_content', $contents->id)
        ->first();

        $owners = DB::table('owners')
        ->select('owner_name')
        ->where('id_content', $contents->id)
        ->first();

        return view('admin.kelola_proyek.lihat_detail', compact('contents', 'tags', 'images', 'owners'));
    }

    public function hapusProjek(string $id){
        $contents = contents::find($id);
        $images = DB::table('content_images')
            ->select('*')
            ->where('id_content', '=', $contents->id);


        $contents->delete();
        if($images!=null){
            $images->delete();
        };

        return redirect()->route('admin.porto.showAllPorto')->with('success', 'Proyek berhasil ditambahkan.');
    }


    public function showAllPorto(){

        $userdata = Auth::user();
        
        if($userdata->role == "Admin"){
            $contents =   DB::table('contents')
            ->join('dosens', 'contents.id_dosen', '=', 'dosens.id')
            ->select('contents.*', 'dosens.name')
            ->distinct()->paginate(7);

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

        }else{

            $contents =   DB::table('contents')
            ->join('dosens', 'contents.id_dosen', '=', 'dosens.id')
            ->join('users', 'dosens.id_user', '=', 'users.id')
            ->select('contents.*', 'dosens.name')
            ->where('users.id', '=', $userdata->id)
            ->distinct()->paginate(7);
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
        }

        // dd($arrayCategories);

        return view('admin.portofolio.portofolio', compact('contents', 'arrayCategories', 'arrayStudents'));

    }

    public function searchPorto(Request $request){

        if($request->input('query_type') == "Judul Projek"){
            $contents =   DB::table('contents')
            ->join('dosens', 'contents.id_dosen', '=', 'dosens.id')
            ->select('contents.*', 'dosens.name')
            ->where('tittle', 'like', $request->input('query').'%')
            ->orWhere('tittle', 'like', '%'.$request->input('query'))
            ->distinct()
            ->paginate(8);

        }else if($request->input('query_type') == "Nama Dosen"){
            $contents =   DB::table('contents')
            ->join('dosens', 'contents.id_dosen', '=', 'dosens.id')
            ->select('contents.*', 'dosens.name')
            ->where('name', 'like', $request->input('query').'%')
            ->orWhere('name', 'like', '%'.$request->input('query'))
            ->distinct()
            ->paginate(8);
        }
        if($contents->isEmpty()){
            return redirect()->route('admin.porto.showAllPorto')->withErrors('Tidak ada hasil yang tersedia.');
        }

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

        return view('admin.portofolio.portofolio', compact('contents', 'arrayCategories', 'arrayStudents'));
    }



    public function addPorto(){
        $dropdownDosen = dosens::all();
        return view('admin.portofolio.addnewporto', compact('dropdownDosen'));
    }



    public function storePorto(Request $request){

        $userdata = Auth::user();
         // Validasi data yang dikirim dari formulir
         $validator = Validator::make($request->all(), [
            'thumbnail_image_url' =>'nullable|image',
            'tittle' => 'required|max:255', // Ubah sesuai kebutuhan validasi Anda
            'owner_name' => 'required|max:255', // Ubah sesuai kebutuhan validasi Anda
            'tipe_konten' => 'required|max:255',
            'owner_contact' => 'required|max:255',
            'description' => 'required|max:255',
            'thumbnail_image_url' => 'required|max:5999', // Opsional jika ada
            'github_url' => 'nullable|url', // Opsional jika ada
            'content_url' => 'nullable|mimes:pdf,doc', // Opsional jika ada
            'video_url' => 'nullable|url', // Opsional jika ada
            'video_tittle' => 'nullable|max:255', // Opsional jika ada
            // 'image_url' =>'nullable|image' // Opsional jika ada
        ]);


        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }

        $folderDocument = public_path('content/document');
        $folderthumbnailImage = public_path('content/thumbnail');

        if (!File::isDirectory($folderthumbnailImage)) {
            File::makeDirectory($folderthumbnailImage, 0777, true, true);
        }

        if (!File::isDirectory($folderDocument)) {
            File::makeDirectory($folderDocument, 0777, true, true);
        }


          // SIMPAN FILE DOKUMEN
        if($request->hasFile('content_url')){
        $filenameWithExt = $request->file('content_url')->getClientOriginalName();
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        $extension = $request->file('content_url')->getClientOriginalExtension();
        $basename = uniqid() . time();
        $filenameSimpandoc = "{$filename}.{$basename}.{$extension}";
        $path = $request->file('content_url')->storeAs('content/document', $filenameSimpandoc);
        }else{
            $filenameSimpandoc = null;
        }


        // SIMPAN Gambar Thumbnail
        $filenameWithExt = $request->file('thumbnail_image_url')->getClientOriginalName();
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        $extension = $request->file('thumbnail_image_url')->getClientOriginalExtension();
        $basename = uniqid() . time();
        $filenameSimpanthumb = "{$filename}.{$basename}.{$extension}";
        $thumbnailPath = public_path('content/thumbnail/' . $filenameSimpanthumb);
        $data = $request->thumbnail_image_url;
        Image::make($data)
        ->fit(300, 400)
        ->save($thumbnailPath);


        if($userdata->role == "Admin")
        {
            $dosen =  DB::table('dosens')
            ->select('dosens.*')
            ->where('name', '=', $request->name)
            ->first();


            $contents = contents::create([
                'id_dosen' => $dosen->id,
                'tittle' => $request->tittle,
                'thumbnail_image_url' => $filenameSimpanthumb,
                'tipe_konten' => $request->tipe_konten,
                'owner_contact' => $request->owner_contact,
                'video_url' => $request->video_url,
                'video_tittle' => $request->video_tittle,
                'description' => $request->description,
                'owner' => $request->owner_name,
                'github_url' => $request->github_url,
                'content_url' => $filenameSimpandoc
            ]);

        }else{

            $dosen =  DB::table('dosens')
            ->select('dosens.*')
            ->where('id_user', '=', $userdata->id )
            ->first();

            $contents = contents::create([
                'id_dosen' => $dosen->id,
                'tittle' => $request->tittle,
                'thumbnail_image_url' => $filenameSimpanthumb,
                'tipe_konten' => $request->tipe_konten,
                'owner_contact' => $request->owner_contact,
                'video_url' => $request->video_url,
                'video_tittle' => $request->video_tittle,
                'description' => $request->description,
                'owner' => $request->owner_name,
                'github_url' => $request->github_url,
                'content_url' => $filenameSimpandoc
            ]);
        }

        // UPLOAD SIMPAN GAMBAR
        $folderthumbnail = public_path('content/content_image/thumbnail');
        $folderPathOri = public_path('content/content_image/original');

        if (!File::isDirectory($folderthumbnail)) {
            File::makeDirectory($folderthumbnail, 0777, true, true);
        }

        if (!File::isDirectory($folderPathOri)) {
            File::makeDirectory($folderPathOri, 0777, true, true);
        }

        foreach($request->image_url as $data){

            $filenameWithExt = $data->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $data->getClientOriginalExtension();
            $basename = uniqid() . time();
            $filenameSimpan = "{$filename}.{$basename}.{$extension}";
            $thumbnailPath = public_path('content/content_image/thumbnail/' . $filenameSimpan);
            $path = $data->storeAs('content/content_image/original', $filenameSimpan);

            Image::make($data)
            ->fit(400, 300)
            ->save($thumbnailPath);

            content_images::create([
                'id_content' => $contents->id,
                'image_url' => $filenameSimpan
            ]);

        }

        // SIMPAN TAG
        foreach($request->tag as $data){
            tags::create([
                'id_content' => $contents->id,
                'tag' => $data
            ]);
        }
        return redirect()->route('admin.porto.showAllPorto')->with('success', 'Proyek berhasil ditambahkan.');
    }



    public function updatePorto(String $id){
        $content = contents::where('id', $id)->first();
        $dropdownDosen = dosens::all();

        // dd($content);
        return view('admin.portofolio.editporto', compact('content', 'dropdownDosen'));
    }


    public function saveUpdate(Request $request, String $id){

        $validator = Validator::make($request->all(), [
            'thumbnail_image_url' =>'nullable|image',
            'tittle' => 'required|max:255', // Ubah sesuai kebutuhan validasi Anda
            'owner_name' => 'required|max:255', // Ubah sesuai kebutuhan validasi Anda
            'tipe_konten' => 'required|max:255',
            'owner_contact' => 'required|max:255',
            'description' => 'required|max:255',
            'thumbnail_image_url' => 'nullable|max:5999', // Opsional jika ada
            'github_url' => 'required|url', // Opsional jika ada
            'content_url' => 'nullable|mimes:pdf,doc', // Opsional jika ada
            'video_url' => 'nullable|url', // Opsional jika ada
            'video_tittle' => 'nullable|max:255', // Opsional jika ada
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }


        $contents = contents::find($id);
        $images =  content_images::where('id_content', $contents->id)->get();
        $tags = tags::where('id_content', $contents->id)->get();

        $contents->update([
            'tittle' => $request->tittle,
            'tipe_konten' => $request->tipe_konten,
            'owner_contact' => $request->owner_contact,
            'description' => $request->description,
            'owner' => $request->owner_name,
            'github_url' => $request->github_url,
        ]);


    if($request->hasFile('content_url')){
            // SIMPAN FILE DOKUMEN
            $filenameWithExt = $request->file('content_url')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('content_url')->getClientOriginalExtension();
            $basename = uniqid() . time();
            $filenameSimpandoc = "{$basename}.{$extension}";
            Storage::delete('content/document/'.$contents->content_url);
            $path = $request->file('content_url')->storeAs('content/document', $filenameSimpandoc);
            $contents->update([
                'content_url' => $filenameSimpandoc
            ]);
        }

        if($request->hasFile('thumbnail_image_url')){
            $filenameWithExt = $request->file('thumbnail_image_url')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('thumbnail_image_url')->getClientOriginalExtension();
            $basename = uniqid() . time();
            $filenameSimpanthumb = "{$basename}.{$extension}";
            Storage::delete('content/thumbnail/'.$contents->thumbnail_image_url);
            $thumbnailPath = public_path('content/thumbnail/' . $filenameSimpanthumb);
            $data = $request->thumbnail_image_url;
            Image::make($data)
            ->fit(300, 400)
            ->save($thumbnailPath);
            $contents->update([
                'thumbnail_image_url' => $filenameSimpanthumb
            ]);
        }

        if($request->hasFile('image_url')){

            $content_images = content_images::where('id_content', $contents->id)->get();
            if ($content_images->count() > 0) {
                content_images::where('id_content', $contents->id)->delete();
            }

            foreach($request->image_url as $data){

                    $filenameWithExt = $data->getClientOriginalName();
                    $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                    $extension = $data->getClientOriginalExtension();
                    $basename = uniqid() . time();
                    $filenameSimpan = "{$filename}.{$basename}.{$extension}";
                    Storage::delete('content/content_image/thumbnail/'.$contents->thumbnail_image_url);
                    Storage::delete('content/content_image/original/'.$contents->thumbnail_image_url);
                    $thumbnailPath = public_path('content/content_image/thumbnail/' . $filenameSimpan);
                    $path = $data->storeAs('content/content_image/original', $filenameSimpan);

                    Image::make($data)
                    ->fit(400, 300)
                    ->save($thumbnailPath);

                    content_images::create([
                        'id_content' => $contents->id,
                        'image_url' => $filenameSimpan
                    ]);

                }
        }

        if($request->hasFile('video_url')){
            $contents->update([
                'video_url' => $request->video_url,
                'video_tittle' => $request->video_tittle,
            ]);
        }


        $tags = tags::where('id_content', $contents->id)->get();
        if ($tags->count() > 0) {
            tags::where('id_content', $contents->id)->delete();
        }

        foreach($request->tag as $data){
            tags::create([
                'id_content' => $contents->id,
                'tag' => $data
            ]);
        }

        return redirect()->route('admin.porto.showAllPorto')->with('success', 'Project succesfully edited.');

   }

   public function deletePorto(String $id){
    $contents = contents::find($id);

    $images = DB::table('content_images')
        ->select('*')
        ->where('id_content', '=', $contents->id);

     $tags = DB::table('tags')
        ->select('*')
        ->where('id_content', '=', $contents->id);


    $contents->delete();
    if($images!=null){
        $images->delete();
    };

    if($tags!=null){
        $tags->delete();
    };

    return redirect()->route('admin.porto.showAllPorto')->with('success', 'Project succesfully deleted.');
   }
}
