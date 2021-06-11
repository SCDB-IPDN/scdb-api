<?php

namespace App\Http\Controllers\Api\Admin;



use App\Models\Praja;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Http\Resources\PrajaResource;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class PrajaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //get praja
        $prajas = Praja::select(
            'nama',
            Praja::raw("CONCAT(tmpt_lahir, ', ', DATE_FORMAT(tgl_lahir, '%d %b %Y')) as tempat_tgl_lahir"),
            'npp',
            'jk AS jenis_kelamin',
            'agama',
            'provinsi',
            'angkatan',
            'tahun_masuk_kuliah AS tahun_masuk',
            'tingkat',
            'penempatan',
            'fakultas',
            Praja::raw("substring_index(prodi,' ',1) as jelang_pendidikan"),
            Praja::raw("SUBSTRING(prodi, LOCATE(' ' ,prodi)+1) AS prodi")
        )
            ->orderBy('nama', 'asc')
            ->get();


        //return with Api Resource
        return new PrajaResource(true, 'List Data Praja', $prajas);
    }
}
