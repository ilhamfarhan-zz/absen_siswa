<?php

namespace App\Http\Controllers;

use DateTime;
use DateTimeZone;
use App\Models\Presensi;
use Illuminate\Http\Request;

class PresensiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Presensi.index');
    }
    public function masuk()
    {
        return view('Presensi.Masuk');
    }
    public function keluar()
    {
        return view('Presensi.Keluar');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $timezone = 'Asia/Jakarta'; 
        $date = new DateTime('now', new DateTimeZone($timezone)); 
        $tanggal = $date->format('Y-m-d');
        $localtime = $date->format('H:i:s');

        $presensi = Presensi::where([
            ['id','=',auth()->user()->id],
            ['nis',auth()->user()->nis],
            ['tgl','=',$tanggal],
            ])->first();
            if ($presensi){
                return redirect('presensi-keluar');
            }else{
                Presensi::create([
                    'id' => auth()->user()->id,
                    'nis' => auth()->user()->nis,
                    'tgl' => $tanggal,
                    'jammasuk' => $localtime,
                ]);
            }
    

        return redirect('presensi-keluar');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $nis
     * @return \Illuminate\Http\Response
     */
    public function tersimpan()
    {
        return view('Presensi.tampil-absen');
    }

   
    public function tampildatakeseluruhan()
    {
        $presensi = Presensi::find(2);
        return view('Presensi.tampil-absen',compact('presensi'));
    }

   
    public function presensipulang(){
        $timezone = 'Asia/Jakarta'; 
        $date = new DateTime('now', new DateTimeZone($timezone)); 
        $tanggal = $date->format('Y-m-d');
        $localtime = $date->format('H:i:s');

        $presensi = Presensi::where([
            ['id','=',auth()->user()->id],
            ['nis',auth()->user()->nis],
            ['tgl','=',$tanggal],
        ])->first();
        
        $dt=[
            'jamkeluar' => $localtime,
            'jamkerja' => date('H:i:s', strtotime($localtime) - strtotime($presensi->jammasuk))
        ];

        if ($presensi->jamkeluar == ""){
            $presensi->update($dt);
            return redirect()->route('tampil-data');
        }else{
            return redirect()->route('tampil-data');
        }
    }

    public function update(Request $request, $nis)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $nis
     * @return \Illuminate\Http\Response
     */
    public function destroy($nis)
    {
        //
    }
}
