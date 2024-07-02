<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Pendidikan;
use App\Models\Pengalaman;
use App\Models\HalamanDepan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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

            if(file_exists("data/".$halamanDepan->foto_home)){
                Storage::delete("data/".$halamanDepan->foto_home);
                dd('berhasil delete');
            }

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

    public function edit_ex(){
        $data_pendidikan = Pendidikan::all();
        $data_pengalaman = Pengalaman::all();
        return view('dashboard.edit-ex', compact('data_pendidikan','data_pengalaman'));
    }

    public function tambah_pendidikan(Request $request){
        $request->validate([
            "tahun" => 'required',
            'jurusan' => 'required|string',
            'nama_sekolah' => 'required|string',
            'deskripsi' => 'required',
        ]);

        $data = Pendidikan::create($request->all());

        $data->save();

        return redirect()->route('edit_ex')->with('success', "Pendidikan berhasil ditambah");
    }

    public function tambah_pengalaman(Request $request){
        $request->validate([
            "tahun" => 'required',
            'pengalaman' => 'required',
            'nama_sekolah' => 'required|string',
            'deskripsi' => 'required',
        ]);

        $data = Pengalaman::create($request->all());

        $data->save();

        return redirect()->route('edit_ex')->with('success', "Pengalaman berhasil ditambah");

    }

    public function show_detail_ex($id, $tipeform){
        $data_pendidikan = Pendidikan::find($id);
        $data_pengalaman = Pengalaman::find($id);

        return view('dashboard.show-detail-ex', compact('data_pendidikan', 'data_pengalaman', 'tipeform'));
    }
    public function edit_pendidikan(Request $request, $id){
        $request->validate([
            "tahun" => 'required',
            'jurusan' => 'required|string',
            'nama_sekolah' => 'required|string',
            'deskripsi' => 'required',
        ]);

        $data = Pendidikan::find($id);

        $data->update($request->all());

        return redirect()->route('edit_ex')->with('success', "Pendidikan berhasil diedit");


    }

    public function edit_pengalaman(Request $request, $id){
        $request->validate([
            "tahun" => 'required',
            'pengalaman' => 'required',
            'nama_sekolah' => 'required|string',
            'deskripsi' => 'required',
        ]);

        $data = Pengalaman::find($id);

        $data->update($request->all());

        return redirect()->route('edit_ex')->with('success', "Pengalaman berhasil diedit");
    }

    public function edit_services(){

        $data = Service::all();
        return view('dashboard.edit-services', compact('data'));
    }

    public function delete_pendidikan($id){
        $data = Pendidikan::find($id);

        $data->delete();

        return redirect()->route('edit_ex')->with('success', "Pendidikan berhasil dihapus");
    }
    public function delete_pengalaman($id){
        $data = Pengalaman::find($id);

        $data->delete();

        return redirect()->route('edit_ex')->with('success', "Pengalaman berhasil dihapus");
    }

    public function tambah_services(Request $request){
        $request->validate([
            'logo' => 'required',
            'judul' => 'required',
            'deskripsi_singkat' => 'required',
        ]);

        $data = Service::create($request->all());

        $data->save();


        return redirect()->route('edit_services')->with('success', "Service Berhasil Ditambah");

    }

    public function show_details_service($id){
        $data = Service::find($id);

        return view('dashboard.show-detail-services', compact('data'));
    }

    public function edit_details_service($id, Request $request){
        $request->validate([
            'logo' => 'required',
            'judul' => 'required',
            'deskripsi_singkat' => 'required',
        ]);

        $data = Service::find($id);

        $data->update($request->all());


        return redirect()->route('edit_services')->with('success', "Service Berhasil Diedit");
    }

    public function delete_details_service($id){
        $data = Service::find($id);

        $data->delete();

        return redirect()->route('edit_services')->with('success', "Service Berhasil Dihapus");

    }

    public function edit_testimoni(){
        
    }
}
