<?php

namespace App\Http\Controllers\Api\Admin;

use App\Models\Dosen;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\DosenResource;

class DosenController extends Controller
{
    public function index()
    {
        //get praja
        $prajas = Dosen::select(
            'nama',
            'nip',
            Dosen::raw("CONCAT(tempat_lahir, ', ', DATE_FORMAT(tanggal_lahir, '%d %b %Y')) as tempat_tgl_lahir"),
            'jenis_kelamin',
            Dosen::raw("DATE_FORMAT(FROM_DAYS(DATEDIFF(CURRENT_DATE, tanggal_lahir)),'%y tahun') AS usia "),
            'agama',
            // 'pendidikan_terakhir',
            // 'fakultas',
            'program_studi',
            'kampus',
            // 'jenjang_pendidikan',
        )
            ->orderBy('nama', 'asc')
            ->get();


        //return with Api Resource
        return new DosenResource(true, 'List Data Dosen', $prajas);
    }
}
