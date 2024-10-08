<?php

namespace App\Http\Controllers;

use App\Models\File;
use App\Http\Requests\StoreFileRequest;
use App\Http\Requests\UpdateFileRequest;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use Illuminate\Http\Request;
// use Illuminate\Http\Client\Request;
use Illuminate\Support\Facades\Log;

class FileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $files = File::all();
        return view('all', compact('files'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreFileRequest $request)
    {

        Log::info('File upload request received', [
            'file' => $request->file('file'),
            'name' => $request->input('name'),
        ]);
    
        // Validasi input
        $request->validate([
            'file' => 'required|file|mimes:jpeg,png,jpg,pdf,doc,docx|max:2048',
            'name' => 'required|string|max:255',
        ]);

        // Unggah file ke Cloudinary
        $file = $request->file('file');
        try {
            $uploadResult = Cloudinary::upload($file->getRealPath(), [
                'folder' => 'portofolio-design',
                'public_id' => pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME),
                'overwrite' => true,
            ]);

            // Ambil URL file yang diunggah
            $uploadedFileUrl = $uploadResult->getSecurePath();

        } catch (\Exception $e) {
            // Tangani kesalahan jika upload gagal
            return redirect()->back()->withErrors(['file' => 'File upload failed: ' . $e->getMessage()])->withInput();
        }

        // Simpan informasi file ke database
        $fileRecord = new File();
        $fileRecord->name = $request->input('name');
        $fileRecord->path = $uploadedFileUrl;  // Simpan URL file di sini
        $fileRecord->save();

        // Ambil semua file untuk tampilan di halaman admin
        $files = File::all();

        // Redirect dengan pesan sukses
        return redirect()->route('admin')->with('success', 'File uploaded successfully.');
        // return view('admin', compact( 'files'));
    }

    /**
     * Display the specified resource.
     */
    public function show(File $file)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(File $file)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateFileRequest $request, File $file)
    {
        $request->validate([
            'file_id' => 'required|exists:files,id', // Pastikan file id ada di database
            'name' => 'required|string|max:255',
        ]);

        // Temukan file berdasarkan id
        $file = File::findOrFail($request->file_id);

        // Update nama file
        $file->name = $request->input('name');
        $file->save();

        // Redirect dengan pesan sukses
        return redirect()->route('admin')->with('success', 'File updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, File $file)
    {
         $file = File::findOrFail($request->file_id);

 
         try {
             Cloudinary::destroy($file->path);
 
             // Menghapus file dari database
             $file->delete();
 
             return redirect()->route('admin')->with('success', 'File deleted successfully');
         } catch (\Exception $e) {
             return redirect()->route('admin')->with('error', 'Failed to delete the file');
         }
    }
}
