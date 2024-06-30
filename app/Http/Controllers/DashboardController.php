<?php

namespace App\Http\Controllers;

use App\Models\HalamanDepan;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        return view ('dashboard.main');
    }

    public function edit_hal_depan(){
        $data = HalamanDepan::first();
        return view ('dashboard.edit-hal-depan', compact('data'));
    }

    public function update_halaman_depan(Request $request){
        $request->validate([
            'greetings' => 'required',
            'nama_depan' => 'required|string',
            'nama_belakang' => 'required|string',
            'keahlian' => 'required|string',
            'deskripsi_keahlian' => 'required',
            'asal' => 'required|string',
            'tinggal' => 'required|string',
            'umur' => 'required|integer',
            'foto_home' => 'nullable|image|max:5048', // Nullable jika tidak wajib, image dan batasan ukuran
            'foto_profile' => 'nullable|image|max:5048', // Nullable jika tidak wajib, image dan batasan ukuran
            'cv' => 'nullable|file|mimes:docx,pdf,doc|max:5048', // Nullable jika tidak wajib, tipe file dan batasan ukuran
        ]);


        // Update fields that are always required
        $halamanDepan = HalamanDepan::find(1); // Assuming you have an ID in the request to find the record
        $halamanDepan->greetings = $request->greetings;
        $halamanDepan->nama_depan = $request->nama_depan;
        $halamanDepan->nama_belakang = $request->nama_belakang;
        $halamanDepan->keahlian = $request->keahlian;
        $halamanDepan->deskripsi_keahlian = $request->deskripsi_keahlian;
        $halamanDepan->asal = $request->asal;
        $halamanDepan->tinggal = $request->tinggal;
        $halamanDepan->umur = $request->umur;

        // Check and update foto_home if it exists in the request
        if ($request->hasFile('foto_home')) {
            $file_foto_home = $request->file('foto_home'); // Save the file and get the path
            $unique_name = time(). '-'. uniqid() .'-'. $file_foto_home->getClientOriginalName(); // Update the database field with the new file path
            $file_foto_home->move('data/',$unique_name );
            $halamanDepan->foto_home = $unique_name;
        }

        // Check and update foto_profile if it exists in the request
        if ($request->hasFile('foto_profile')) {
            $file_foto_home = $request->file('foto_profile'); // Save the file and get the path
            $unique_name = time(). '-'. uniqid() .'-'. $file_foto_home->getClientOriginalName(); // Update the database field with the new file path
            $file_foto_home->move('data/',$unique_name );
            $halamanDepan->foto_profile = $unique_name;
        }

        // Check and update cv if it exists in the request
        if ($request->hasFile('cv')) {
            $file_foto_home = $request->file('cv'); // Save the file and get the path
            $unique_name = time(). '-'. uniqid() .'-'. $file_foto_home->getClientOriginalName(); // Update the database field with the new file path
            $file_foto_home->move('data/',$unique_name );
            $halamanDepan->cv = $unique_name;
        }

        // Save the updated model
        $halamanDepan->save();

        return redirect()->route('edit_hal_depan')->with('success', "Halaman Depan Website Berhasil Diperbarui");

    }
}
