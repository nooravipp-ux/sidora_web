<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function getDataSummaryPengajuan(){
        $data = DB::select("
            select mdk.desa_kelurahan, count(ts.jenis_sarana) as jumlah_fasilitas, sp.tahun from t_sarana_prasarana sp
            inner join m_desa_kelurahan mdk on mdk.id = sp.desa_kelurahan_id 
            inner join t_sarana ts on ts.sarana_prasarana_id = sp.id
            group by sp.desa_kelurahan_id order by mdk.desa_kelurahan asc
        ");

        $dataCollect = collect($data);
        dd($dataCollect);
    }

    public function getDataJumlahSaranaGroupByWilayah(){

    }

    public function getDataJumlahKelompokOlahragaGroupByWilayah(){

    }

    public function getDataJumlahPotensiAtletGroupByWilayah(){

    }

}
