<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Peserta;
use App\Provinsi;
use App\Kabupaten;
use App\Kecamatan;
use App\Kelurahan;
use Mail;

class JamselinasController extends Controller
{
    public function index()
    {
        /* $provinsi = Provinsi::all();
        return view('jamselinas.pages.front.front')->withProvinsi($provinsi); */
        return view('jamselinas.pages.front.index');
    }
    
    public function daftar()
    {
        $provinsi = Provinsi::all();
        return view('jamselinas.pages.front.front')->withProvinsi($provinsi);
    }

    public function daftar_v1()
    {
        $provinsi = Provinsi::all();
        return view('jamselinas.pages.front.form_registrasi_v1')->withProvinsi($provinsi);
    }

    /*
        var :
            - nama,email,tempatlahir,tanggallahir,jenkel,alamat,nohp,komunitas,ukuranbaju,penyakit,nohpkeluarga,hubkeluarga
    */
    public function registrasi_v1(Request $request)
    {
        $this->validate($request,[
            'nama'          => 'required|max:255',
            'email'         => 'required|unique:peserta|email',
            'tempatlahir'   => 'required',
            'tanggallahir'  => 'required',
            'jenkel'        => 'required',
            'alamat'        => 'required',
            'nohp'          => 'required',
            'ukuranbaju'    => 'required',
        ]);

        $peserta = new Peserta;

        $peserta->name = $request->get('nama');
        $peserta->email = $request->get('email');
        $peserta->tempatLahir = $request->get('tempatlahir');
        $peserta->tanggalLahir = $request->get('tanggallahir');
        $peserta->noHp = $request->get('nohp');
        $peserta->jk = $request->get('jenkel');
        $peserta->alamat = $request->get('alamat');
        $peserta->provinsi = $request->get('provinsi');
        $peserta->kabupaten = $request->get('kabupaten');
        $peserta->komunitas = $request->get('komunitas');
        $peserta->jersey = $request->get('ukuranbaju');
        $peserta->tglDatang = $request->get('tgldatang');
        $peserta->emNama = $request->get('emergency_name');
        $peserta->emKontak = $request->get('emergency_phone');
        $peserta->golDar = $request->get('goldar');

        //generate nomor peserta -> JAMSELINAS8-0001
        $lastRegisteredPeserta = Peserta::orderBy('nomorPeserta','desc')->first();
        if(!$lastRegisteredPeserta){
            //tidak ada peserta terdaftar, start dari 0001
            $peserta->nomorPeserta = 'JAMSELINAS8-'.'0001';
        }else{
            //potong nomor peserta
            $getkode = substr($lastRegisteredPeserta->nomorPeserta, (strlen($lastRegisteredPeserta->nomorPeserta) - 4),
                (strlen($lastRegisteredPeserta->nomorPeserta)));
            $getkodesum = '000' . ((int)$getkode + 1);
            $kode =  'JAMSELINAS8-' . substr($getkodesum, (strlen($getkodesum) - 4), strlen($getkodesum));
            $peserta->nomorPeserta = $kode;
        }

        //status peserta dan status bayar
        /* 
            status peserta 
                - waiting
                - aktive
                - deactive
            status bayar
                - waiting / unpaid
                - paid
        */
        $peserta->statusPeserta = 'waiting';
        $peserta->statusBayar = 'unpaid';

        dd($peserta);
        if($peserta->save()){
            
            //send email to peserta
            //menggunakan queue laravel
            $data = ['email' => $peserta->email, 'nama' => $peserta->nama_peserta ];
            
            // "emails.hello" adalah nama view.
            Mail::send('jamselinas.pages.front.email', $data, function ($mail) use ($peserta)
            {
                // Email dikirimkan ke address "momo@deviluke.com" 
                // dengan nama penerima "Momo Velia Deviluke"
                $mail->to($peserta->email, $peserta->nama_peserta);
    
                $mail->subject('Terima Kasih Telah Mendaftar Jamselinas 8 Makassar 2018');
            });
            return view('jamselinas.pages.front.success');
        }
        //gagal simpan. redirect ke form pendaftaran dengan error
        dd($peserta, $lastRegisteredPeserta->nomor_peserta, $getkode, $getkodesum, $kode);

    }

    public function registrasi(Request $request)
    {
        dd($request);
        $validasi = $request->validate([
            'nama'          => 'required|max:255',
            'email'         => 'required|unique:peserta|email',
            'tempatlahir'   => 'required',
            'tanggallahir'  => 'required',
            'jenkel'        => 'required',
            'alamat'        => 'required',
            'nohp'          => 'required',
            'ukuranbaju'    => 'required',
            'emergency_name'=> 'required',
            'emergency_phone' => 'required',
            'goldar'        => 'required'
        ]);

        $peserta = new Peserta;

        $peserta->nama_peserta = $request->get('nama');
        $peserta->email = $request->get('email');
        $peserta->tempat_lahir = $request->get('tempatlahir');
        $peserta->tanggal_lahir = $request->get('tanggallahir'); //format = yyyy-mm-dd
        $peserta->jenis_kelamin = $request->get('jenkel'); // laki-laki=1;perempuan=2;
        $peserta->alamat =  $request->get('alamat');
        $peserta->nohp = $request->get('nohp');
        $peserta->komunitas = $request->get('komunitas');
        $peserta->baju = $request->get('ukuranbaju');
        $peserta->penyakit = $request->get('penyakit');
        $peserta->nohp_keluarga = $request->get('nohpkeluarga');
        $peserta->hub_dg_keluarga = $request->get('hubkeluarga');
        $peserta->gol_darah = $request->get('goldarah');
        $peserta->sosmed_fb = $request->get('fb');
        $peserta->sosmed_twitter = $request->get('twitter');
        $peserta->sosmed_ig = $request->get('ig');
        $peserta->ikutserta = $request->get('ikutserta');
        $peserta->ikutmks = $request->get('ikutmks');
        $peserta->merk_hp = $request->get('merk_hp');
        $peserta->tipe_hp = $request->get('tipe_hp');
        //generate nomor peserta -> JAMSELINAS8-0001

        $lastRegisteredPeserta = Peserta::orderBy('nomor_peserta','desc')->first();
        if(!$lastRegisteredPeserta){
            //tidak ada peserta terdaftar, start dari 0001
            $peserta->nomor_peserta = 'JAMSELINAS8-'.'0001';
        }else{
            //potong nomor peserta
            $getkode = substr($lastRegisteredPeserta->nomor_peserta, (strlen($lastRegisteredPeserta->nomor_peserta) - 4),
                (strlen($lastRegisteredPeserta->nomor_peserta)));
            $getkodesum = '000' . ((int)$getkode + 1);
            $kode =  'JAMSELINAS8-' . substr($getkodesum, (strlen($getkodesum) - 4), strlen($getkodesum));
            $peserta->nomor_peserta = $kode;
        }

        if($peserta->save()){
            //dd("berhasil simpan");
            //send email to peserta
            //dd($peserta->email);
            $data = ['email' => $peserta->email, 'nama' => $peserta->nama_peserta ];
            
            // "emails.hello" adalah nama view.
            Mail::send('jamselinas.pages.front.email', $data, function ($mail) use ($peserta)
            {
                // Email dikirimkan ke address "momo@deviluke.com" 
                // dengan nama penerima "Momo Velia Deviluke"
                $mail->to($peserta->email, $peserta->nama_peserta);
    
                $mail->subject('Terima Kasih Telah Mendaftar Jamselinas 8 Makassar 2018');
            });
            return view('jamselinas.pages.front.success');
        }
        //gagal simpan. redirect ke form pendaftaran dengan error
        dd($peserta, $lastRegisteredPeserta->nomor_peserta, $getkode, $getkodesum, $kode);

    }

    public function allProvinces($id)
    {
        $kabupaten = Kabupaten::where('province_id', $id)->get();
        return \json_encode($kabupaten);
    }
}
