<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClientController extends Controller
{
    public function index()
    {
        $jmlFasilitasOlahraga = DB::table('t_sarana')->count();
        $jmlKelompokOlahraga = DB::table('t_kelompok_olahraga')->count();
        $jmlPotensiAtlet = DB::table('t_prestasi_olahraga')->count();

        $dataKecamatan = DB::table('m_kecamatan')->get();
        $dataDesaKelurahan = DB::table('m_desa_kelurahan')->orderBy('desa_kelurahan', 'asc')->get();

        return view('frontend.branda', compact('jmlFasilitasOlahraga', 'jmlKelompokOlahraga', 'jmlPotensiAtlet'));
    }

    public function detail(Request $request)
    {

        $saranaOlahraga = DB::table('t_sarana_prasarana')
            ->select('id')
            ->where('kecamatan_id', $request->kecamatan_id)
            ->where('desa_kelurahan_id', $request->desa_kelurahan_id)
            ->first();

        $data = DB::table('t_sarana_prasarana')
            ->select('t_sarana_prasarana.id AS id', 'm_kecamatan.kecamatan', 'm_desa_kelurahan.desa_kelurahan', 't_sarana_prasarana.nama_surveyor', 't_sarana_prasarana.jabatan_surveyor', 't_sarana_prasarana.alamat_surveyor', 't_sarana_prasarana.email_desa_kel', 't_sarana_prasarana.website_desa_kel', 't_sarana_prasarana.no_telp_surveyor', 't_sarana_prasarana.jumlah_rt', 't_sarana_prasarana.jumlah_rw', 't_sarana_prasarana.jumlah_penduduk', 't_sarana_prasarana.demografi', 't_sarana_prasarana.dibuat_tanggal')
            ->join('m_kecamatan', 'm_kecamatan.id', '=', 't_sarana_prasarana.kecamatan_id')
            ->join('m_desa_kelurahan', 'm_desa_kelurahan.id', '=', 't_sarana_prasarana.desa_kelurahan_id')
            ->where('t_sarana_prasarana.id', $saranaOlahraga->id)
            ->first();

        $t_sarana = DB::table('t_sarana')
            ->join('m_sarana', 'm_sarana.id', '=', 't_sarana.jenis_sarana')
            ->where('t_sarana.sarana_prasarana_id', $saranaOlahraga->id)
            ->get();

        $t_prasarana = DB::table('t_prasarana')
            ->join('m_prasarana', 'm_prasarana.id', '=', 't_prasarana.jenis_peralatan')
            ->where('t_prasarana.sarana_prasarana_id', $saranaOlahraga->id)
            ->get();

        $t_kel_olahraga = DB::table('t_kelompok_olahraga')
            ->join('m_cabang_olahraga', 'm_cabang_olahraga.id', '=', 't_kelompok_olahraga.jenis_olahraga')
            ->where('t_kelompok_olahraga.sarana_prasarana_id', $saranaOlahraga->id)
            ->get();

        $t_prestasi_olahraga = DB::table('t_prestasi_olahraga')
            ->join('m_cabang_olahraga', 'm_cabang_olahraga.id', '=', 't_prestasi_olahraga.jenis_olahraga')
            ->where('t_prestasi_olahraga.sarana_prasarana_id', $saranaOlahraga->id)
            ->get();

        return view('datakeolahragaan', compact('data', 't_sarana', 't_prasarana', 't_kel_olahraga', 't_prestasi_olahraga'));
    }

    public function fasilitasOlahraga()
    {
        $dataCollectFasilitas = DB::select("
            select mdk.id, mdk.desa_kelurahan, count(ts.jenis_sarana) as jumlah_fasilitas, sp.tahun from t_sarana_prasarana sp
            right join m_desa_kelurahan mdk on mdk.id = sp.desa_kelurahan_id 
            left join t_sarana ts on ts.sarana_prasarana_id = sp.id
            group by mdk.id, mdk.desa_kelurahan,sp.tahun, sp.desa_kelurahan_id order by mdk.desa_kelurahan asc
        ");

        $dataFasilitas = collect($dataCollectFasilitas);

        return view('frontend.fasilitasOlahraga.fasilitasOlahraga', compact('dataFasilitas'));
    }

    public function fasilitasOlahragaDetail($id)
    {
        $desaKelurahan = DB::table('m_desa_kelurahan')->where('id', $id)->first();

        $dataInformasiDesa = DB::table('t_sarana_prasarana')
            ->select('t_sarana_prasarana.*', 'm_desa_kelurahan.desa_kelurahan')
            ->join('m_desa_kelurahan', 'm_desa_kelurahan.id', '=', 't_sarana_prasarana.desa_kelurahan_id')
            ->where('desa_kelurahan_id', $id)->first();


        $sarana = DB::select("
            select ms.nama_sarana, ts.tipe_sarana, ts.status_kepemilikan, ts.luas_lapang, ts.foto_lokasi, ts.kondisi_lapang from t_sarana ts
            left join m_sarana ms on ms.id = ts.jenis_sarana 
            left join t_sarana_prasarana tsp on ts.sarana_prasarana_id = tsp.id
            left join m_desa_kelurahan mdk on mdk.id = tsp.desa_kelurahan_id
            where tsp.desa_kelurahan_id = $id;
        ");

        $dataSarana = collect($sarana);

        $saranaSummary = DB::select("
            select ms.nama_sarana, count(ts.jenis_sarana) jumlah_fasilitas, tsp.tahun from t_sarana ts
            left join m_sarana ms on ms.id = ts.jenis_sarana 
            left join t_sarana_prasarana tsp on ts.sarana_prasarana_id = tsp.id
            left join m_desa_kelurahan mdk on mdk.id = tsp.desa_kelurahan_id
            where tsp.desa_kelurahan_id = $id
            group by ts.jenis_sarana, ms.nama_sarana, tsp.tahun;
        ");

        $dataSaranaSummary = collect($saranaSummary);

        $dataCollectPrasarana = DB::select("
            select mp.nama_prasarana, tp.jumlah, tp.jenis_penerima, tp.penerima_hibah from t_prasarana tp
            left join m_prasarana mp on mp.id = tp.jenis_peralatan
            left join t_sarana_prasarana tsp on tp.sarana_prasarana_id = tsp.id
            left join m_desa_kelurahan mdk on mdk.id = tsp.desa_kelurahan_id
            where tsp.desa_kelurahan_id = $id;
        ");

        $dataPrasarana = collect($dataCollectPrasarana);

        return view('frontend.fasilitasOlahraga.fasilitasOlahragaDetail', compact('desaKelurahan', 'dataSarana', 'dataSaranaSummary', 'dataInformasiDesa', 'dataPrasarana'));
    }

    public function potensiOlahraga()
    {
        $jmlFasilitasOlahraga = DB::table('t_sarana')->count();
        $jmlKelompokOlahraga = DB::table('t_kelompok_olahraga')->count();
        $jmlPotensiAtlet = DB::table('t_prestasi_olahraga')->count();

        $dataCollectFasilitas = DB::select("
            select mdk.desa_kelurahan, count(ts.jenis_sarana) as jumlah_fasilitas, sp.tahun from t_sarana_prasarana sp
            right join m_desa_kelurahan mdk on mdk.id = sp.desa_kelurahan_id 
            left join t_sarana ts on ts.sarana_prasarana_id = sp.id
            group by mdk.desa_kelurahan,sp.tahun, sp.desa_kelurahan_id order by mdk.desa_kelurahan asc
        ");

        $dataFasilitas = collect($dataCollectFasilitas);

        $dataCollectKelompokOlahraga = DB::select("
            select mdk.id,mdk.desa_kelurahan, count(tko.sarana_prasarana_id) as jumlah_klub_olahraga, sp.tahun from t_sarana_prasarana sp
            right join m_desa_kelurahan mdk on mdk.id = sp.desa_kelurahan_id 
            left join t_kelompok_olahraga tko on tko.sarana_prasarana_id = sp.id
            group by mdk.id, mdk.desa_kelurahan,sp.tahun, sp.desa_kelurahan_id order by mdk.desa_kelurahan asc
        ");

        $dataKelompokOlahraga = collect($dataCollectKelompokOlahraga);

        $dataCollectPrestasiAtlet = DB::select("
            select mdk.id, mdk.desa_kelurahan, count(tpo.jenis_potensi) as jumlah_potensi, sp.tahun from t_sarana_prasarana sp
            right join m_desa_kelurahan mdk on mdk.id = sp.desa_kelurahan_id 
            left join t_prestasi_olahraga tpo  on tpo.sarana_prasarana_id = sp.id
            group by mdk.id, mdk.desa_kelurahan,sp.tahun, sp.desa_kelurahan_id order by mdk.desa_kelurahan asc
        ");

        $dataPrestasiAtlet = collect($dataCollectPrestasiAtlet);

        return view('frontend.potensiOlahraga.potensiOlahraga', compact('jmlFasilitasOlahraga', 'jmlKelompokOlahraga', 'jmlPotensiAtlet', 'dataPrestasiAtlet', 'dataKelompokOlahraga', 'dataFasilitas'));
    }

    public function prestasiAtlet($id)
    {
        $desaKelurahan = DB::table('m_desa_kelurahan')->where('id', $id)->first();

        $prestasi = DB::select("
            select tpo.*, mco.nama_cabang_olahraga, tpa.* from t_prestasi_olahraga tpo
            left join t_prestasi_atlet tpa on tpo.id = tpa.prestasi_olahraga_id
            left join t_sarana_prasarana tsp on tpo.sarana_prasarana_id = tsp.id
            right join m_cabang_olahraga mco on mco.id = tpo.jenis_olahraga 
            left join m_desa_kelurahan mdk on mdk.id = tsp.desa_kelurahan_id
            where tsp.desa_kelurahan_id = $id;
        ");

        $dataPrestasi = collect($prestasi);

        return view('frontend.potensiOlahraga.prestasiAtlet', compact('desaKelurahan', 'dataPrestasi'));
    }

    public function kegiatanOlahraga($id)
    {

        $desaKelurahan = DB::table('m_desa_kelurahan')->where('id', $id)->first();

        $kelOlahraga = DB::select("select tko.*, mco.nama_cabang_olahraga from t_kelompok_olahraga tko
                        left join t_sarana_prasarana tsp on tko.sarana_prasarana_id = tsp.id
                        right join m_cabang_olahraga mco on mco.id = tko.jenis_olahraga  
                        left join m_desa_kelurahan mdk on mdk.id = tsp.desa_kelurahan_id
                        where tsp.desa_kelurahan_id = $id");
        $dataKelompokOlahraga = collect($kelOlahraga);

        return view('frontend.potensiOlahraga.kegiatanOlahraga', compact('desaKelurahan', 'dataKelompokOlahraga'));
    }

    public function getDataSumarySarana()
    {
        
        $dataCollectFasilitas = DB::select("
            select mk.kecamatan as name, count(ts.jenis_sarana) as y from t_sarana_prasarana sp
            right join m_kecamatan mk on mk.id = sp.kecamatan_id
            left join t_sarana ts on ts.sarana_prasarana_id = sp.id
            group by mk.kecamatan order by mk.kecamatan asc
        ");

        $dataFasilitas = collect($dataCollectFasilitas)->toJson();

        return response()->json([
            'data' => $dataFasilitas
        ]);
    }

    public function getDataSumaryPrestasiAtlet()
    {
        $dataCollectPrestasiAtlet = DB::select("
            select mk.kecamatan as name, count(tpo.jenis_potensi) as y from t_sarana_prasarana sp
            right join m_kecamatan mk on mk.id = sp.kecamatan_id 
            left join t_prestasi_olahraga tpo  on tpo.sarana_prasarana_id = sp.id
            group by mk.kecamatan order by mk.kecamatan asc
        ");

        $dataPrestasiAtlet = collect($dataCollectPrestasiAtlet)->toJson();

        return response()->json([
            'data' => $dataPrestasiAtlet
        ]);
    }

    public function getDataSumaryKelompokOlahraga()
    {
        $dataCollectKelompokOlahraga = DB::select("
            select mk.kecamatan as name, count(tko.sarana_prasarana_id) as y from t_sarana_prasarana sp
            right join m_kecamatan mk on mk.id = sp.kecamatan_id 
            left join t_kelompok_olahraga tko on tko.sarana_prasarana_id = sp.id
            group by mk.kecamatan order by mk.kecamatan asc
        ");

        $dataKelompokOlahraga = collect($dataCollectKelompokOlahraga)->toJson();

        return response()->json([
            'data' => $dataKelompokOlahraga
        ]);
    }
}
