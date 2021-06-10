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
            'prodi',

        )
            ->when(request()->q, function ($prajas) {
                $prajas = $prajas->where('nama', 'like', '%' . request()->q . '%');
            })
            ->latest('id')
            ->paginate(10);

        //return with Api Resource
        return new PrajaResource(true, 'List Data Praja', $prajas);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama'     => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        //create praja
        $praja = Praja::create([
            'nama' => $request->nama,
        ]);

        if ($praja) {
            //return success with Api Resource
            return new PrajaResource(true, 'Data Praja Berhasil Disimpan!', $praja);
        }

        //return failed with Api Resource
        return new PrajaResource(false, 'Data Praja Gagal Disimpan!', null);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $praja = Praja::whereId($id)->first();

        if ($praja) {
            //return success with Api Resource
            return new PrajaResource(true, 'Detail Data Praja!', $praja);
        }

        //return failed with Api Resource
        return new PrajaResource(false, 'Detail Data Praja Tidak Ditemukan!', null);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Praja $praja)
    {
        $validator = Validator::make($request->all(), [
            'nama'     => 'required|unique:praja,nama,' . $praja->id,
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        //update praja
        $praja->update([
            'nama' => $request->name,
        ]);

        if ($praja) {
            //return success with Api Resource
            return new PrajaResource(true, 'Data Praja Berhasil Diupdate!', $praja);
        }

        //return failed with Api Resource
        return new PrajaResource(false, 'Data Praja Gagal Diupdate!', null);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Praja $praja)
    {
        if ($praja->delete()) {
            //return success with Api Resource
            return new PrajaResource(true, 'Data Praja Berhasil Dihapus!', null);
        }

        //return failed with Api Resource
        return new PrajaResource(false, 'Data Praja Gagal Dihapus!', null);
    }
}
