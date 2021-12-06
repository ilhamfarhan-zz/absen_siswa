<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Presensi;

class AbsenAdminController extends Controller
{
    public function index()
    {
        $presensis = Presensi::latest()->paginate(5);
        return view('admin.absen.absen',compact('presensis'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
	public function create()
    {
        return view('admin.absen.create-absen');
    }
	public function store(Request $request)
    {
        $request->validate([
            'nis' => 'required',
            'tgl' => 'required',
			'jammasuk' => 'required',
            'jamkeluar' => 'required',
			'jamkerja' => 'required',
        ]);
    
        Presensi::create($request->all());
     
        return redirect()->route('presensis.index')
                        ->with('success','Berhasil Menyimpan !');
    }
	public function edit(Presensi $presensi)
    {
        return view('admin.absen.edit-absen',compact('presensi'));

    }
	public function update(Request $request, Presensi $presensi)
    {
        $request->validate([
            'nis' => 'required',
            'tgl' => 'required',
			'jammasuk' => 'required',
            'jamkeluar' => 'required',
			'jamkerja' => 'required',
        ]);
            
        $presensi->update($request->all());
    
        return redirect()->route('presensis.index')
                        ->with('success','Berhasil Update !');
    }
	public function destroy(Presensi $presensi)
    {
        $presensi->delete();
     
        return redirect()->route('presensis.index')
                        ->with('success','Berhasil Hapus !');
    }
}
