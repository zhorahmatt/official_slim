<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Peserta;
use App\Provinsi;
use App\Kabupaten;
use App\Kecamatan;
use App\Kelurahan;
use Mail;
use App\Jobs\SendConfirmationEmail;
use Illuminate\Support\Facades\Input;

class JamselinasController extends Controller
{
    //request validation
    public function rules(){
        return [
            'nama'          => 'required|max:255',
            'email'         => 'required|unique:peserta|email',
            'tempatlahir'   => 'required',
            'tanggallahir'  => 'required',
            'jenkel'        => 'required',
            'alamat'        => 'required',
            'nohp'          => 'required',
            'ukuranbaju'    => 'required',
            'ktp'           => 'required|mimes:jpeg,jpg,png,pdf|max:500',
            'bpjs'          => 'required|mimes:jpeg,jpg,png,pdf|max:500'
        ];
    }

    //check if request is exist
    public function validateRequest($req)
    {
        if(!empty($req)){
            return $req;
        }else{
            return 'nothing';
        }
    }
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

    public function registrasi_v1(Request $request)
    {
        $this->validate($request,$this->rules());
        
        $peserta = new Peserta;
        $peserta->name = $this->validateRequest($request->get('nama'));
        $peserta->email = $this->validateRequest($request->get('email'));
        $peserta->tempatLahir = $this->validateRequest($request->get('tempatlahir'));
        $peserta->tanggalLahir = $this->validateRequest($request->get('tanggallahir'));
        $peserta->noHp = $this->validateRequest($request->get('nohp'));
        $peserta->jk = $this->validateRequest($request->get('jenkel'));
        $peserta->alamat = $this->validateRequest($request->get('alamat'));
        $peserta->provinsi = $this->validateRequest($request->get('provinsi'));
        $peserta->kabupaten = $this->validateRequest($request->get('kabupaten'));
        $peserta->komunitas = $this->validateRequest($request->get('komunitas'));
        $peserta->jersey = $this->validateRequest($request->get('ukuranbaju'));
        $peserta->tglDatang = $this->validateRequest($request->get('tgldatang'));
        $peserta->emNama = $this->validateRequest($request->get('emergency_name'));
        $peserta->emKontak = $this->validateRequest($request->get('emergency_phone'));
        $peserta->golDar = $this->validateRequest($request->get('goldar'));
        $peserta->riwayat = $this->validateRequest($request->get('riwayat'));

        //generate nomor peserta -> JAMSELINAS8-0001
        $lastRegisteredPeserta = Peserta::orderBy('nomorRegistrasi','desc')->first();
        if(!$lastRegisteredPeserta){
            //$peserta->nomorPeserta = 'JAMSELINAS8-'.'0001';
            $peserta->nomorRegistrasi = '0001';
        }else{
            $getkode = substr($lastRegisteredPeserta->nomorPeserta, (strlen($lastRegisteredPeserta->nomorPeserta) - 4),
                (strlen($lastRegisteredPeserta->nomorPeserta)));
            $getkodesum = '000' . ((int)$getkode + 1);
            $kode =  'JAMSELINAS8-' . substr($getkodesum, (strlen($getkodesum) - 4), strlen($getkodesum));
            //$peserta->nomorPeserta = $kode;
            $peserta->nomorRegistrasi = $getkodesum;
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

        if(Input::hasFile('bpjs') || Input::hasFile('ktp')){
            $tempBpjs = Input::file('bpjs');
            $tempKtp = Input::file('ktp');
            $bpjs = 'bpjs'.$peserta->nomorRegistrasi.$peserta->noHp.$tempBpjs->getClientOriginalName();
            $ktp = 'ktp'.$peserta->nomorRegistrasi.$peserta->noHp.$tempKtp->getClientOriginalName();
            $tempBpjs->move('assets/jamselinas/img/bpjs', $bpjs);
            $tempKtp->move('assets/jamselinas/img/ktp', $ktp);
            $peserta->bpjs = $bpjs;
            $peserta->ktp = $ktp;
        }

        if($peserta->save()){
            //send email to peserta
            //menggunakan queue laravel
            $data = [
                'email'         => $peserta->email,
                'nama'          => $peserta->name,
                'nomorPeserta'  => $peserta->nomorPeserta,
                'nomorRegistrasi' => $peserta->nomorRegistrasi
            ];
            
            // send email via mailable
            Mail::send('jamselinas.pages.front.email', $data, function ($mail) use ($peserta)
            {
                $mail->to($peserta->email, $peserta->nama_peserta);
                $mail->subject('Informasi Pembayaran Jamselinas 8 Makassar 2018');
            });
            //send email via queue
            // $this->dispatch(new SendConfirmationEmail($data));
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

    public function listPeserta()
    {
        $allPeserta = Peserta::all();
        return view('jamselinas.pages.front.admin.list')->withPeserta($allPeserta);
    }

    public function ubahStatusPesertaBayar($id)
    {
        $isPeserta = Peserta::find($id);
        if($isPeserta != null){
            if($isPeserta->statusBayar == 'unpaid'){
                $isPeserta->statusBayar = 'paid';
                $isPeserta->statusPeserta = 'ready';
                $lastRegisteredPeserta = Peserta::orderBy('nomorPeserta','desc')->first();
                if(!$lastRegisteredPeserta){
                    $isPeserta->nomorPeserta = 'JAMSELINAS8-'.'0001';
                }else{
                    $getkode = substr($lastRegisteredPeserta->nomorPeserta, (strlen($lastRegisteredPeserta->nomorPeserta) - 4),
                        (strlen($lastRegisteredPeserta->nomorPeserta)));
                    $getkodesum = '000' . ((int)$getkode + 1);
                    $kode =  'JAMSELINAS8-' . substr($getkodesum, (strlen($getkodesum) - 4), strlen($getkodesum));
                    $isPeserta->nomorPeserta = $kode;
                }
                //save to the database
                if($isPeserta->save()){
                    //return success message
                    dd("berhasil");
                }
                //failed to update
                dd("gagal");
            }
            //return error message status is paid
            dd("status paid");
        }
        //return error message id is not found
        dd($isPeserta,'id is not found');
    }

    
    //live on root domain
    public function liveShowForm()
    {
        $provinsi = Provinsi::all();
        return view('jamselinas.pages.front.live.form_registrasi_v1')->withProvinsi($provinsi);
    }

    public function liveSaveForm(Request $request)
    {
        $this->validate($request,$this->rules());
        
        $peserta = new Peserta;
        $peserta->name = $this->validateRequest($request->get('nama'));
        $peserta->email = $this->validateRequest($request->get('email'));
        $peserta->tempatLahir = $this->validateRequest($request->get('tempatlahir'));
        $peserta->tanggalLahir = $this->validateRequest($request->get('tanggallahir'));
        $peserta->noHp = $this->validateRequest($request->get('nohp'));
        $peserta->jk = $this->validateRequest($request->get('jenkel'));
        $peserta->alamat = $this->validateRequest($request->get('alamat'));
        $peserta->provinsi = $this->validateRequest($request->get('provinsi'));
        $peserta->kabupaten = $this->validateRequest($request->get('kabupaten'));
        $peserta->komunitas = $this->validateRequest($request->get('komunitas'));
        $peserta->jersey = $this->validateRequest($request->get('ukuranbaju'));
        $peserta->tglDatang = $this->validateRequest($request->get('tgldatang'));
        $peserta->emNama = $this->validateRequest($request->get('emergency_name'));
        $peserta->emKontak = $this->validateRequest($request->get('emergency_phone'));
        $peserta->golDar = $this->validateRequest($request->get('goldar'));
        $peserta->riwayat = $this->validateRequest($request->get('riwayat'));

        //generate nomor peserta -> JAMSELINAS8-0001
        $lastRegisteredPeserta = Peserta::orderBy('nomorRegistrasi','desc')->first();
        if(!$lastRegisteredPeserta){
            
        }
        if(!$lastRegisteredPeserta){
            //$peserta->nomorPeserta = 'JAMSELINAS8-'.'0001';
            $peserta->nomorRegistrasi = '0001';
        }else{
            //generate last 3 digit nomor registrasi
            $getkode = substr($lastRegisteredPeserta->nomorRegistrasi, (strlen($lastRegisteredPeserta->nomorRegistrasi) - 1),
            (strlen($lastRegisteredPeserta->nomorRegistrasi)));
            $getkodesum = '000' . ((int)$getkode + 1);
            $peserta->nomorRegistrasi = $getkodesum;
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

        if(Input::hasFile('bpjs') || Input::hasFile('ktp')){
            $tempBpjs = Input::file('bpjs');
            $tempKtp = Input::file('ktp');
            $bpjs = 'bpjs'.$peserta->nomorRegistrasi.$peserta->noHp.$tempBpjs->getClientOriginalName();
            $ktp = 'ktp'.$peserta->nomorRegistrasi.$peserta->noHp.$tempKtp->getClientOriginalName();
            $tempBpjs->move('assets/jamselinas/img/bpjs', $bpjs);
            $tempKtp->move('assets/jamselinas/img/ktp', $ktp);
            $peserta->bpjs = $bpjs;
            $peserta->ktp = $ktp;
        }

        if($peserta->save()){
            //send email to peserta
            //menggunakan queue laravel
            $data = [
                'email'         => $peserta->email,
                'nama'          => $peserta->name,
                'nomorPeserta'  => $peserta->nomorPeserta,
                'nomorRegistrasi' => $peserta->nomorRegistrasi
            ];
            
            // send email via mailable
            Mail::send('jamselinas.pages.front.live.email', $data, function ($mail) use ($peserta)
            {
                $mail->to($peserta->email, $peserta->nama_peserta);
                $mail->subject('Informasi Pembayaran Jamselinas 8 Makassar 2018');
            });
            //send email via queue
            // $this->dispatch(new SendConfirmationEmail($data));
            return redirect('jamselinas.pages.front.live.success');
        }
        //gagal simpan. redirect ke form pendaftaran dengan error
        dd($peserta, $lastRegisteredPeserta->nomor_peserta, $getkode, $getkodesum, $kode);
    }

    public function liveListPeserta()
    {
        $allPeserta = Peserta::all();
        return view('jamselinas.pages.front.live.admin.list')->withPeserta($allPeserta);
    }

    public function liveUbahStatusPesertaBayar($id, Request $request)
    {
        $isPeserta = Peserta::find($id);
        if($isPeserta != null){
            if($isPeserta->statusBayar == 'unpaid'){
                $isPeserta->statusBayar = 'paid';
                $isPeserta->statusPeserta = 'ready';
                $lastRegisteredPeserta = Peserta::orderBy('nomorPeserta','desc')->first();
                if(!$lastRegisteredPeserta){
                    $isPeserta->nomorPeserta = 'JAMSELINAS8-'.'0001';
                }else{
                    $getkode = substr($lastRegisteredPeserta->nomorPeserta, (strlen($lastRegisteredPeserta->nomorPeserta) - 4),
                        (strlen($lastRegisteredPeserta->nomorPeserta)));
                    $getkodesum = '000' . ((int)$getkode + 1);
                    $kode =  'JAMSELINAS8-' . substr($getkodesum, (strlen($getkodesum) - 4), strlen($getkodesum));
                    $isPeserta->nomorPeserta = $kode;
                }
                //save to the database
                if($isPeserta->save()){
                    //return success message
                    $request->session()->flash('success','Data berhasil diubah');
                    return redirect('/jejak/list');
                }
                //failed to update
                $request->session()->flash('failed','Data gagal diubah');
                return redirect('/jejak/list');
            }
            //return error message status is paid
            $request->session()->flash('failed','Status sudah terbayar');
            return redirect('/jejak/list');
        }
        //return error message id is not found
        $request->session()->flash('failed','Data tidak ditemukan');
        return redirect('/jejak/list');
    }

    public function liveAllProvinces($id)
    {
        $kabupaten = Kabupaten::where('province_id', $id)->get();
        return \json_encode($kabupaten);
    }
}
