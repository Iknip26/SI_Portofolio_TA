<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\contents;
use App\Models\dosens;
use App\Models\Product;
use App\Models\User;
use App\Models\user_accounts as tabel_user_accounts;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;

// use GuzzleHttp\Psr7\Request;

class adminAccountController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() : View
    {
        $accounts = User::latest()->paginate(3);
        return view('admin.kelola_akun.edit_akun.index', compact('accounts'));
        // return view('index', [
        //     'products' => Product::latest()->paginate(3)
        // ]);
    }

    /**
     * Show the form for creating a new resource.
     */

    public function create() : View
    {
        return view('admin.kelola_akun.edit_akun.create');
    }


public function store(Request $request)
{
    // Validasi input
    $request->validate([
        'role' => 'required',
        'username' => 'required',
        'password' => 'required',
        'image_profile' => 'required|image|mimes:jpeg,jpg,png|max:2048',
        'contact' => 'required',
        'name'=>'required',
        'email' => 'required|email',
        'specialization' => 'required',
    ]);

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

        // Simpan gambar asli
        $path = $request->file('image_profile')->storeAs('photos/original', $filenameSimpan);

        // Buat thumbnail dengan lebar dan tinggi yang diinginkan
        $thumbnailPath = public_path('storage/photos/card/' . $filenameSimpan);
        Image::make($image)
            ->fit(270, 300)
            ->save($thumbnailPath);

        // Buat versi persegi dengan lebar dan tinggi yang sama
        $squarePath = public_path('storage/photos/profile_view/' . $filenameSimpan);
        Image::make($image)
            ->fit(300, 400)
            ->save($squarePath);

         // Buat versi persegi dengan lebar dan tinggi yang sama
         $squarePath = public_path('storage/photos/icon/' . $filenameSimpan);
         Image::make($image)
             ->fit(20, 20)
             ->save($squarePath);

        $path = $filenameSimpan;
    }
    else {
        $path = null;
    }

    // Simpan data akun pengguna
    $userAccount = User::create([
        'role' => $request->role,
        'username' => $request->username,
        'password' => $request->password,
        'email' => $request->email
    ]);

    // Simpan data profil dosen
    dosens::create([
        'image_profile' => $filenameSimpan,
        'id_user' => $userAccount->id, // Menggunakan ID akun yang baru saja dibuat
        'contact' => $request->contact,
        'name'=> $request->name,
        'specialization' => $request->specialization,
    ]);

    return redirect()->route('account.index')->withSuccess('Berhasil menambahkan akun.');
}

    /**
     * Display the specified resource.
     */
    public function show(String $id) : View
    {
        // $accounts = user_accounts::find($id_user);
        $accounts = User::find($id);

        $dosens = dosens::where('id_user', $id)->first();

        return view('admin.kelola_akun.edit_akun.show', compact('accounts', 'dosens'));
    }

    public function edit_akun(String $id_user) : View
    {
        $accounts = User::find($id_user);
        return view('admin.kelola_akun.edit_akun.edit', compact('accounts'));
    }

    public function edit_profil(String $id_user) : View
    {
        $dosens = dosens::where('id_user', $id_user)->first();
        return view('admin.kelola_akun.edit_profil.edit', compact('dosens'));
    }

    public function update_akun(Request $request, String $id_user) : RedirectResponse
    {
        $accounts = User::findOrFail($id_user);
        $accounts->update($request->all());
        return redirect()->route('account.index')
                ->withSuccess('Akun berhasil terupdate.');
    }

    public function update_profil(Request $request, String $id) : RedirectResponse
    {

        $dosens = dosens::findOrFail($id);

        if ($request->hasFile('image_profile')) {

            $filenameWithExt = $request->file('image_profile')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('image_profile')->getClientOriginalExtension();
            $filenameSimpan = $filename . '_' . time() . '.' . $extension;

            $photo = $dosens->image_profile;

            // Hapus gambar asli
            $originalPath = public_path('storage/photos/original/' . $photo);
            if (File::exists($originalPath)) {
                File::delete($originalPath);
            }

            //simpan gambar asli
            $path = $request->file('image_profile')->storeAs('photos/original', $filenameSimpan);

            // Hapus gambar thumbnail
            $cardPath = public_path('storage/photos/card/' . $photo);
            if (File::exists($cardPath)) {
                File::delete($cardPath);
            }

            // Buat thumbnail dengan lebar dan tinggi yang diinginkan
            $cardPath = public_path('storage/photos/card/' . $filenameSimpan);
            Image::make($request->image_profile)
                ->fit(270, 300)
                ->save($cardPath);


            // Hapus gambar square
            $iconPath = public_path('storage/photos/icon/' . $photo);
            if (File::exists($iconPath)) {
                File::delete($iconPath);
            }

            // Buat versi square dengan lebar dan tinggi yang sama
            $iconPath = public_path('storage/photos/icon/' . $filenameSimpan);
            Image::make($request->image_profile)
                ->fit(100, 100)
                ->save($iconPath);


            // Hapus gambar square
            $profileViewPath = public_path('storage/photos/profile_view/' . $photo);
            if (File::exists($profileViewPath)) {
                File::delete($profileViewPath);
            }

            // Buat versi square dengan lebar dan tinggi yang sama
            $profileViewPath = public_path('storage/photos/profile_view/' . $filenameSimpan);
            Image::make($request->image_profile)
                ->fit(20, 20)
                ->save($profileViewPath);

            $dosens->update([
                'image_profile'     => $filenameSimpan,
                'contact'   => $request->contact,
                'name'   => $request->name,
                'specialization'   => $request->specialization
            ]);

            return redirect()->route('account.index')
                ->withSuccess('Profil berhasil terupdate.');
        } else {
            $dosens->update([
                'image_profile' => "default_img.png",
                'contact'   => $request->contact,
                'name'   => $request->name,
                'specialization'   => $request->specialization
            ]);

            return redirect()->route('account.index')
                    ->withSuccess('Akun berhasil terupdate.');
            }
    }

    public function destroy(String $id) : RedirectResponse
    {
        $accounts = User::find($id);
        $dosens =DB::table('dosens')
        ->select('*')
        ->where('id_user', '=', $id);

        $dosens->delete();
        $accounts->delete();
        return redirect()->route('account.index')
                ->withSuccess('Akun berhasil di hapus.');
    }

    public function kelolaProyek(String $id){

        // $projects = contents::findOrFail($id);
         $projects = DB::table('contents')
        ->where('contents.id_dosen', '=', $id)->get();


        $dosen_pembimbing = DB::table('contents')
        ->join('dosen', 'contents.id_dosen', '=', 'dosen.id')
        ->select('dosen.name')
        ->where('contents.id', '=', $id)->get();

        return view('kelola_proyek', compact('projects', 'dosen_pembimbing'));
    }
}