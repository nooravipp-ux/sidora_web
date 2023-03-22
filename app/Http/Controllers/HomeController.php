<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $kecamatan = DB::table('m_kecamatan')->get();

        $dataCollectFasilitas = DB::select("
            select mdk.desa_kelurahan, count(ts.jenis_sarana) as jumlah_fasilitas, sp.tahun from t_sarana_prasarana sp
            right join m_desa_kelurahan mdk on mdk.id = sp.desa_kelurahan_id 
            left join t_sarana ts on ts.sarana_prasarana_id = sp.id
            group by mdk.desa_kelurahan,sp.tahun, sp.desa_kelurahan_id order by mdk.desa_kelurahan asc
        ");

        $dataFasilitas = collect($dataCollectFasilitas);

        $dataCollectKelompokOlahraga = DB::select("
            select mdk.desa_kelurahan, count(tko.sarana_prasarana_id) as jumlah_klub_olahraga, sp.tahun from t_sarana_prasarana sp
            right join m_desa_kelurahan mdk on mdk.id = sp.desa_kelurahan_id 
            left join t_kelompok_olahraga tko on tko.sarana_prasarana_id = sp.id
            group by mdk.desa_kelurahan,sp.tahun, sp.desa_kelurahan_id order by mdk.desa_kelurahan asc
        ");

        $dataKelompokOlahraga = collect($dataCollectKelompokOlahraga);

        $dataCollectPrestasiAtlet = DB::select("
            select mdk.desa_kelurahan, count(tpo.jenis_potensi) as jumlah_potensi, sp.tahun from t_sarana_prasarana sp
            right join m_desa_kelurahan mdk on mdk.id = sp.desa_kelurahan_id 
            left join t_prestasi_olahraga tpo  on tpo.sarana_prasarana_id = sp.id
            group by mdk.desa_kelurahan,sp.tahun, sp.desa_kelurahan_id order by mdk.desa_kelurahan asc
        ");

        $dataPrestasiAtlet = collect($dataCollectPrestasiAtlet);

        $jmlFasilitasOlahraga = DB::table('t_sarana')->count();
        $jmlKelompokOlahraga = DB::table('t_kelompok_olahraga')->count();
        $jmlPotensiAtlet = DB::table('t_prestasi_olahraga')->count();

        return view('home', compact('kecamatan', 'dataFasilitas', 'dataKelompokOlahraga','dataPrestasiAtlet','jmlFasilitasOlahraga','jmlPotensiAtlet','jmlKelompokOlahraga'));
    }
}
