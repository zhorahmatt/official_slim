@extends('jamselinas.layouts.main')

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
                    <form method="post" action="{{ URL('/sepeda/daftar')}}">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-xs-12">
                                <h4 align="left">Personal information</h4>
                                <hr class="long">
                                <input type="text" required name="nama" placeholder="Nama Lengkap">
                            </div>
                            <div class="col-xs-12"> <input type="email" name="email" placeholder="Email"> </div>
                            <div class="col-xs-12">
                                <div class="col-xs-6"> <input type="text" required name="tempatlahir" placeholder="Tempat Lahir"></div>
                                <div class="col-xs-6"> <input type="date" name="tanggallahir" placeholder="Tanggal Lahir"></div>
                            </div>
                            <div class="col-xs-12">
                                <div class="col-xs-6">
                                    <input type="text" required name="nohp" id="nohp" placeholder="Nomor Handphone">
                                </div>
                                <div class="col-xs-6">
                                        <select name="jenkel" id="jenkel">
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
                                <textarea name="alamat" id="alamat" cols="10" rows="10" placeholder="Alamat"></textarea>
                                <!-- <input type="text" required name="alamat" id="alamat" placeholder="Alamat"> -->
                            </div>
                            <div class="col-xs-12">
                                <div class="col-xs-6">
                                    <select name="provinsi" id="provinsi">
                                        <option value="0">--Provinsi--</option>
                                        @foreach($provinsi as $thisProvinsi)
                                            <option value="{{ $thisProvinsi->id}}">{{ $thisProvinsi->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-xs-6">
                                    <select name="kabupaten" id="kabupaten">
                                        <option value="0">--Kabupaten--</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <br>
                                <h4 align="left">Additional Information</h4>
                                <hr class="long">
                                <input type="text" required name="komunitas" id="komunitas" placeholder="Komunitas Sepeda Lipat">
                            </div>
                            <div class="col-xs-12">
                                <select name="ukuranbaju" id="ukuranbaju">
                                    <option value="0">Ukuran Baju</option>
                                    <option value="xs">xs</option>
                                    <option value="s">s</option>
                                    <option value="m">m</option>
                                    <option value="l">l</option>
                                    <option value="xl">xl</option>
                                </select>
                            </div>
                            <div class="col-xs-12">
                                <select name="tgldatang" id="tgldatang">
                                    <option value="">Perkiraan Tanggal Kedatangan</option>
                                    <option value="">A</option>
                                    <option value="">B</option>
                                    <option value="">C</option>
                                    <option value="">D</option>
                                    <option value="">E</option>
                                </select>
                            </div>
                            <div class="col-xs-12">
                                <br>
                                <h4 align="left">In Case Emergency</h4>
                                <hr class="long">
                                <input type="text" name="emergency_name" id="emergency_name" placeholder="Nama Kontak Keluarga" required>
                            </div>
                            <div class="col-xs-12">
                                <input type="text" name="emergency_phone" id="emergency_phone" placeholder="Kontak Keluarga" required>
                            </div>
                            <div class="col-xs-12">
                                <select name="goldar" id="goldar">
                                    <option value="-">Golongan Darah</option>
                                    <option value="a">A</option>
                                    <option value="b">B</option>
                                    <option value="ab">AB</option>
                                    <option value="o">O</option>
                                </select>
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