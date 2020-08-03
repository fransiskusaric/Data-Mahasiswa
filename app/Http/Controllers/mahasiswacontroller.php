<?php

namespace App\Http\Controllers;

use App\mahasiswamodel;
use App\jurusanmodel;
use Illuminate\Http\Request;
use App\Imports\mahasiswaimport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class mahasiswacontroller extends Controller
{
    public function index()
    {
        $listMhs = mahasiswamodel::with(['jurusan'])->get();
        $filter = request()->input('TglFilter') ?? '';
        $from = request()->input('TglMasuk') ?? '';
        $to = request()->input('TglKeluar') ?? '';
        if($from != '' && $to != ''){
            if($filter == 'from') {
                $listMhs = $listMhs->whereBetween('TglMasuk', [$from, $to]);
            } else {
                $listMhs = $listMhs->whereBetween('TglKeluar', [$from, $to]);
            }
        } else if($from != '' && $to == ''){
            $now = strtotime("now");
            $to = date("Y-m-d", $now);
            if($filter == 'from') {
                $listMhs = $listMhs->whereBetween('TglMasuk', [$from, $to]);
            } else {
                $listMhs = $listMhs->whereBetween('TglKeluar', [$from, $to]);
            }
        } else if($from == '' && $to != ''){
            $now = strtotime("-10 Years");
            $from = date("Y-m-d", $now);
            if($filter == 'from') {
                $listMhs = $listMhs->whereBetween('TglMasuk', [$from, $to]);
            } else {
                $listMhs = $listMhs->whereBetween('TglKeluar', [$from, $to]);
            }
        }
        return view('mahasiswaview', ['listMahasiswa' => $listMhs]);
    }

    public function mahasiswarequest(Request $request)
    {
        $request->validate([
            'file_mahasiswa' => 'required'
        ]);

        // // Get current data from mahasiswa table
        // $titles = mahasiswamodel::pluck('nim')->toArray();

        // if($request->hasFile('file_mahasiswa')){
        //     $path = $request->file('file_mahasiswa')->getRealPath();
        //     $data = Excel::import($path, function($reader) {})->get();

        //     if(!empty($data)){
        //         $insert = array();

        //         foreach ($data as $key => $mhs) {
        //             // Skip nim previously added using in_array
        //             if (in_array($mhs->nim, $titles)){
        //                 continue;
        //             }

        //             $insert[] = [
        //                 'nama' => $mhs->nama,
        //                 'nim' => $mhs->nim,
        //                 'idJurusan' => $mhs->idJurusan,
        //                 'TglMasuk' => $mhs->TglMasuk,
        //                 'TglKeluar' => $mhs->TglKeluar
        //             ];

        //             // Add new nim to array
        //             $titles[] = $mhs->nim;
        //         }

        //         if(!empty($insert)){
        //             DB::table('mahasiswa')->insert($insert);
        //         }
        //     }
        // }
        Excel::import(new mahasiswaimport, request()->file('file_mahasiswa'));

        return redirect()->back()->with('success', 'Import and Upload File Successfully!');
    } 

    public function editMhs($id)
    {
        $mahasiswa = mahasiswamodel::where('id', $id)->first();
        $jurusan = jurusanmodel::all()->sortBy('jurusan');
        return view('edit', ['mahasiswa' => $mahasiswa], ['listJurusan' => $jurusan]);
    }

    public function updateMhs(Request $request)
    {
        $mahasiswa = DB::table('mahasiswa')->where('id', $request->id)->update([
            'nama' => $request->nama,
            'nim' => $request->nim,
            'idJurusan' => $request->idJurusan,
            'TglMasuk' => $request->TglMasuk,
            'TglKeluar' => $request->TglKeluar
        ]);
        return redirect('search')->with('success', 'Update Data Successfully!');
    }

    public function createMhs()
    {
        $jurusan = jurusanmodel::all()->sortBy('jurusan');
        return view('create', ['listJurusan' => $jurusan]);
    }

    public function storeData()
    {
        $mahasiswa = new mahasiswamodel();
        $mahasiswa->nama = request('nama');
        $mahasiswa->nim = request('nim');
        $mahasiswa->idJurusan = request('idJurusan');
        $mahasiswa->TglMasuk = request('TglMasuk');
        $mahasiswa->TglKeluar = request('TglKeluar');
        
        $mahasiswa->save();
        return redirect('search')->with('success', 'Update Table Successfully!');
    }

    public function deleteMhs($id=0) 
    {
        if($id != 0){
            // Delete
            DB::table('mahasiswa')->where('id', '=', $id)->delete();
        }
        
        return redirect('search')->with('success', 'Delete Successfully!');
    }
}