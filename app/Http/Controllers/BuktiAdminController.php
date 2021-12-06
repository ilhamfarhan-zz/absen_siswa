<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Bukti;

class BuktiAdminController extends Controller
{
    public function index()
    {
        $buktis = Bukti::latest()->paginate(5);
        return view('admin.absen.bukti',compact('buktis'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
	public function create()
    {
        return view('admin.absen.create-bukti');
    }
	public function store(Request $request)
    {
        $request->validate([
            'nis' => 'required',
            'foto' => 'required|image|mimes:jpeg,png,jpg',
			'ket' => 'required'
        ]);
    
        Bukti::create($request->all());
     
        return redirect()->route('bukti.index')
                        ->with('success','Berhasil Menyimpan !');
    }
	public function edit(Bukti $bukti)
    {
        return view('admin.absen.edit-bukti',compact('bukti'));

    }
	public function update(Request $request, Bukti $bukti)
    {
        $request->validate([
            'nis' => 'required',
            'foto' => 'required|image|mimes:jpeg,png,jpg',
			'ket' => 'required'
        ]);
            
        $bukti->update($request->all());
    
        return redirect()->route('buktis.index')
                        ->with('success','Berhasil Update !');
    }
	public function destroy(Bukti $bukti)
    {
        $bukti->delete();
     
        return redirect()->route('buktis.index')
                        ->with('success','Berhasil Hapus !');
    }
}
