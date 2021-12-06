<?php

namespace App\Http\Controllers;

use App\Models\Bukti;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BuktiController extends Controller
{	
	public function index()
    {
        $bukti = Bukti::get();
    
        return view('presensi.tampil',compact('bukti'));
    }
    public function bukti(){
		$bukti = Bukti::get();
		return view('presensi.bukti',['bukti' => $bukti]);
	}
 
	public function proses_upload(Request $request){
		$request->validate([
			'nis' => auth()->user()->nis,
			'ket' => 'required',
			'foto' => 'required|image|mimes:jpeg,png,jpg',
		]);
 
		// menyimpan data file yang diupload ke variabel $file
		$file = $request->file('foto');
 
		$nama_file = time()."_".$file->getClientOriginalName();
 
      	        // isi dengan nama folder tempat kemana file diupload
		$tujuan_upload = 'img';
		$file->move($tujuan_upload,$nama_file);
 
		bukti::create([
			'foto' => $nama_file,
			'nis' => auth()->user()->nis,
			'ket' => $request->ket,
		]);
 
		return redirect()->route('tampil-data');
		
	}	
}
