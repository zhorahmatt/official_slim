@extends('jamselinas.layouts.main')
@section('meta')
    <meta name="description" content="Form Pendaftaran Jamselinas 8 Makassar 2018">
@endsection
@section('title')
    <title>Jamselinas 8 Makassar - Form Pendaftaran</title>
@endsection
@section('content')
    <section class="text-center">
        <!-- <div class="imageblock__content col-md-5 col-sm-4 pos-right">
            <div class="background-image-holder"> <img alt="image" src="{{ url('assets/jamselinas') }}/img/inner-7.jpg"> </div>
        </div> -->
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <img src="{{ url('assets/jamselinas') }}/img/logo_jamselinas.png" alt="logo_jamselinas" width="90" height="150">
                    <h2>Form Registrasi Peserta Jamselinas 8 Makassar 2018</h2> 
                    {{--  <span>Already have an account? <a href="#">Sign In</a></span>  --}}
                    @foreach ($errors->all() as $message)
                        {{ $message }}<br>
                    @endforeach
                    <form method="post" action="{{ URL('/daftar')}}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-xs-12">
                                <h4 align="left">Personal information</h4>
                                <hr class="long">
                                <label for="nama" class="lbl-input">Nama Lengkap</label>
                                <input type="text" required name="nama" id="nama" placeholder="Nama Lengkap" value="{{ old('nam')}}">
                            </div>
                            <div class="col-xs-12">
                                <label for="email" class="lbl-input">Email</label>
                                <input type="email" name="email" placeholder="Email" value="{{ old('email')}}" required>
                            </div>
                            <div class="col-xs-12">
                                <div class="col-xs-6">
                                    <label for="tempatlahir" class="lbl-input">Tempat Lahir</label>
                                    <input type="text" required name="tempatlahir" placeholder="Tempat Lahir" value="{{ old('tempatlahir') }}">
                                </div>
                                <div class="col-xs-6">
                                    <label for="tanggallahir" class="lbl-input">Tanggal Lahir</label>
                                    <input type="date" name="tanggallahir" placeholder="Tanggal Lahir" value="{{ old('tanggallahir')}}" required>
                                </div>
                            </div>
                            {{--  <div class="col-xs-12">
                                <label for="tanggallahir">Tanggal Lahir</label>
                                <input type="date" name="tanggallahir" id="tanggallahir">
                            </div>  --}}
                            <div class="col-xs-12">
                                <div class="col-xs-6">
                                    <label for="nohp" class="lbl-input">Nomor Handphone</label>
                                    <input type="text" required name="nohp" id="nohp" placeholder="Nomor Handphone" value="{{ old('nohp') }}">
                                </div>
                                <div class="col-xs-6">
                                        <label for="jenkel" class="lbl-input">Jenis Kelamin</label>
                                        <select name="jenkel" id="jenkel" required>
                                            <option value="0">--Pilih Jenis Kelamin--</option>
                                            <option value="1">laki-laki</option>
                                            <option value="2">perempuan</option>
                                        </select>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <br>
                                <h4 align="left">Address Information</h4>
                                <hr class="long">
                                <label for="alamat" class="lbl-input">Alamat</label>
                                <textarea name="alamat" id="alamat" cols="10" rows="10" placeholder="Alamat"></textarea>
                                <!-- <input type="text" required name="alamat" id="alamat" placeholder="Alamat"> -->
                            </div>
                            <div class="col-xs-12">
                                <div class="col-xs-6">
                                    <label for="provinsi" class="lbl-input">Provinsi</label>
                                    <select name="provinsi" id="provinsi">
                                        <option value="0">--Provinsi--</option>
                                        @foreach($provinsi as $thisProvinsi)
                                            <option value="{{ $thisProvinsi->id}}">{{ $thisProvinsi->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-xs-6">
                                    <label for="kabupaten" class="lbl-input">Kabupaten</label>
                                    <select name="kabupaten" id="kabupaten">
                                        <option value="0">--Kabupaten--</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <br>
                                <h4 align="left">Additional Information</h4>
                                <hr class="long">
                                <label for="komunitas" class="lbl-input">Komunitas</label>
                                <input type="text" required name="komunitas" id="komunitas" placeholder="Komunitas Sepeda Lipat" value="{{ old('komunitas')}}">
                            </div>
                            <div class="col-xs-12">
                                <label for="ukuranbaju" class="lbl-input">Ukuran jersey</label>
                                <select name="ukuranbaju" id="ukuranbaju" required>
                                    <option value="0">Ukuran Baju</option>
                                    <option value="s">S (46 cm)</option>
                                    <option value="m">M (48 cm)</option>
                                    <option value="l">L (50 cm)</option>
                                    <option value="xl">XL (52 cm)</option>
                                    <option value="2xl">2XL (54 cm)</option>
                                    <option value="3xl">3XL (56 cm)</option>
                                </select>
                            </div>
                            <div class="col-xs-12">
                                <label for="tgldatang" class="lbl-input">Perkiraan Tanggal Kedatangan</label>
                                <select name="tgldatang" id="tgldatang">
                                    <option value="">Perkiraan Tanggal Kedatangan</option>
                                    <option value="11">11 September 2018</option>
                                    <option value="12">12 September 2018</option>
                                    <option value="13">13 September 2018</option>
                                    <option value="14">14 September 2018</option>
                                </select>
                            </div>
                            <div class="col-xs-12">
                                <br>
                                <h4 align="left">In Case Emergency</h4>
                                <hr class="long">
                                <label for="emergency_name" class="lbl-input">Nama Keluarga</label>
                                <input type="text" name="emergency_name" id="emergency_name" placeholder="Nama Kontak Keluarga" required value="{{ old('emergency_name')}}">
                            </div>
                            <div class="col-xs-12">
                                <label for="emergency_phone" class="lbl-input">Kontak Keluarga</label>
                                <input type="text" name="emergency_phone" id="emergency_phone" placeholder="Kontak Keluarga" required value="{{ old('emergency_phone')}}">
                            </div>
                            <div class="col-xs-12">
                                <label for="goldar" class="lbl-input">Golongan Darah</label>
                                <select name="goldar" id="goldar">
                                    <option value="-">Golongan Darah</option>
                                    <option value="a">A</option>
                                    <option value="b">B</option>
                                    <option value="ab">AB</option>
                                    <option value="o">O</option>
                                </select>
                            </div>
                            <div class="col-xs-12">
                                <label for="riwayat" class="lbl-input">Riwayat Penyakit</label>
                                <input type="text" name="riwayat" id="riwayat" placeholder="Pisahkan dengan tanda koma jika lebih satu" required>
                            </div>
                            <div class="col-xs-12">
                                <label class="lbl-input" for="asuransi">Scan BPJS(*Max : 500Kb | jpg,png,jpeg,pdf)</label>
                                <input type="file" name="bpjs" id="bpjs">
                            </div>
                            <div class="col-xs-12">
                                <label class="lbl-input" for="ktp">Scan KTP(*Max : 500Kb | jpg,png,jpeg,pdf)</label>
                                <input type="file" name="ktp" id="ktp">
                            </div>
                            <div class="col-xs-12"> <button type="submit" class="btn btn--primary">Daftar</button> </div>
                            
                            <div class="col-xs-12"> <span class="type--fine-print">Dengan mendaftar, anda menyetujui <a href="#">Syarat dan Ketentuan</a></span> </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('registeredScript')
    <script type="text/javascript">
        $(document).ready(function(){
            $('.lbl-input').css({'float':'left','font-size':'20'});
            $('#provinsi').on('change',function(){
                $idProvinsi = $('#provinsi').val();
                $.ajax({
                    method : 'GET',
                    url : '/sepeda/administratif/'+$idProvinsi+'/provinsi'
                })
                .done(function(data){
                    var dataKabupaten = JSON.parse(data);
                    $('#kabupaten').empty();
                    $('#kabupaten').append('<option value="0">--Kabupaten--</option>');
                    $.each(dataKabupaten, function( key, value ) {
                        $('#kabupaten').append('<option value="'+value.id+'">'+value.name+'</option>');
                    });
                });
            });

            $('#nohp').keypress(function (e) {
                if (e.which !== 8 && e.which !== 0 && (e.which < 48 || e.which > 57)) {
                    return false;
                }
            });

            $('#nohpkeluarga').keypress(function (e) {
                if (e.which !== 8 && e.which !== 0 && (e.which < 48 || e.which > 57)) {
                    return false;
                }
            });

            $('#emergency_phone').keypress(function(e){
                if (e.which !== 8 && e.which !== 0 && (e.which < 48 || e.which > 57)) {
                    return false;
                }
            })
        });
    </script>
@endsection