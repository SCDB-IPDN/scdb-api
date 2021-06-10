<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrajaBaruTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('praja_baru', function (Blueprint $table) {
            $table->id();
            $table->string('no_spcp', 50);
            $table->string('nama', 200);
            $table->string('jk', 2);
            $table->string('nisn', 50);
            $table->string('npwp', 50);
            $table->string('npp', 50);
            $table->string('nik_praja', 20);
            $table->string('tmpt_lahir', 50);
            $table->date('tgl_lahir');
            $table->string('agama', 50);
            $table->string('alamat', 100);
            $table->integer('rt');
            $table->integer('rw');
            $table->string('nama_dusun', 50);
            $table->string('kelurahan', 50);
            $table->string('kecamatan', 50);
            $table->string('kode_pos', 6);
            $table->string('kab_kota', 50);
            $table->string('provinsi', 50);
            $table->string('jenis_tinggal', 50);
            $table->string('alat_transport', 50);
            $table->string('tlp_rumah', 50);
            $table->string('tlp_pribadi', 50);
            $table->string('email', 50);
            $table->string('kewarganegaraan', 50);
            $table->string('penerima_pks', 50);
            $table->string('no_pks', 50);
            $table->string('prodi', 500);
            $table->string('jenis_pendaftaran', 50);
            $table->date('tgl_masuk_kuliah');
            $table->string('tahun_masuk_kuliah', 50);
            $table->string('pembiayaan', 50);
            $table->string('jalur_masuk', 50);
            $table->enum('status', ['aktif', 'cuti', 'diberhentikan', 'turuntingkat', 'meninggal']);
            $table->integer('tingkat');
            $table->integer('angkatan');
            $table->string('fakultas', 500);
            $table->string('mulai_semester', 20);
            $table->integer('biaya_masuk');
            $table->string('nik_ayah', 20);
            $table->string('nama_ayah', 50);
            $table->date('tgllahir_ayah');
            $table->string('pendidikan_ayah', 50);
            $table->string('pekerjaan_ayah', 50);
            $table->string('penghasilan_ayah', 50);
            $table->string('tlp_ayah', 50);
            $table->string('nik_ibu', 20);
            $table->string('nama_ibu', 50);
            $table->date('tgllahir_ibu');
            $table->string('pendidikan_ibu', 50);
            $table->string('pekerjaan_ibu', 50);
            $table->string('penghasilan_ibu', 50);
            $table->string('tlp_ibu', 50);
            $table->string('nik_wali', 20);
            $table->string('nama_wali', 100);
            $table->date('tgllahir_wali');
            $table->string('pendidikan_wali', 50);
            $table->string('pekerjaan_wali', 200);
            $table->string('penghasilan_wali', 200);
            $table->string('tlp_wali', 50);
            $table->string('penempatan', 500);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('praja_baru');
    }
}
