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
                    <hr class="long">
                    @foreach ($errors->all() as $message)
                        {{ $message }}<br>
                    @endforeach
                    <form method="post" action="{{ URL('/daftar')}}">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-xs-12"> 
                                <input type="text" required name="nama" placeholder="Nama Lengkap">
                            </div>
                            <div class="col-xs-12"> <input type="email" name="email" placeholder="Email"> </div>
                            <div class="col-xs-12">
                                <div class="col-xs-6"> <input type="text" required name="tempatlahir" placeholder="Tempat Lahir"></div>
                                <div class="col-xs-6"> <input type="date" name="tanggallahir" placeholder="Tanggal Lahir"></div>
                            </div>
                            <div class="col-xs-12">
                                <select name="jenkel" id="jenkel">
                                    <option value="0">--Pilih Jenis Kelamin--</option>
                                    <option value="1">laki-laki</option>
                                    <option value="2">perempuan</option>
                                </select>
                            </div>
                            <div class="col-xs-12">
                                <textarea name="alamat" id="alamat" cols="20" rows="10" placeholder="Alamat"></textarea>
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
                                <input type="text" required name="nohp" id="nohp" placeholder="Nomor Handphone">
                            </div>
                            <div class="col-xs-12">
                                <input type="text" required name="komunitas" id="komunitas" placeholder="Komunitas Sepeda Lipat">
                            </div>
                            <div class="col-xs-12">
                                <select name="ukuranbaju" id="ukuranbaju">
                                    <option value="0">--Ukuran Baju--</option>
                                    <option value="xs">xs</option>
                                    <option value="s">s</option>
                                    <option value="m">m</option>
                                    <option value="l">l</option>
                                    <option value="xl">xl</option>
                                </select>
                            </div>
                            <div class="col-xs-12">
                                <input type="text" required name="penyakit" id="penyakit" placeholder="Penyakit yang pernah di derita">
                            </div>
                            <div class="col-xs-12">
                                <input type="number" name="nohpkeluarga" id="nohpkeluarga" placeholder="Nomor Handphone Keluarga">
                            </div>
                            <div class="col-xs-12">
                                <select name="hubkeluarga" id="hubkeluarga">
                                    <option value="0">--Hubungan dengan Keluarga--</option>
                                    <option value="1">Ayah</option>
                                    <option value="2">Ibu</option>
                                </select>
                            </div>
                            <div class="col-xs-12">
                                <select name="goldarah" id="goldarah">
                                    <option value="0">--Golongan Darah--</option>
                                    <option value="a">A</option>
                                    <option value="b">B</option>
                                    <option value="ab">AB</option>
                                    <option value="0">O</option>
                                </select>
                            </div>
                            <div class="col-xs-12">
                                <div class="col-xs-4"><input type="text" required name="fb" id="fb" placeholder="Facebook Account"></div>
                                <div class="col-xs-4"><input type="text" required name="twitter" id="twitter" placeholder="Twitter Account"></div>
                                <div class="col-xs-4"><input type="text" required name="ig" id="ig" placeholder="Instagram Account"></div>
                            </div>
                            <div class="col-xs-12">
                                <input type="text" required name="sepeda" id="sepeda" placeholder="Merek Sepeda yang digunakan">
                            </div>
                            <div class="col-xs-12">
                                <select name="ikutserta" id="ikutserta">
                                    <option value="0">--Keikutsertaan Jamselinas--</option>
                                    <option value="1">1 kali</option>
                                    <option value="2">2 kali</option>
                                    <option value="3">3 kali</option>
                                    <option value="4">Lebih dari 3 kali</option>
                                </select>
                            </div>
                            <div class="col-xs-12">
                                <select name="ikutmks" id="ikutmks">
                                    <option value="0">Pertama Kali Ke Makassar</option>
                                    <option value="ya">ya</option>
                                    <option value="tidak">tidak</option>
                                </select>
                            </div>
                            <div class="col-xs-12">
                                <input type="text" required name="merk_hp" placeholder="Merek Handphone">
                            </div>
                            <div class="col-xs-12">
                                <input type="text" required name="tipe_hp" placeholder="Tipe Handphone (Android/IOS)">
                            </div>
                            <!-- <div class="col-xs-12">
                                <div class="input-checkbox"> <input type="checkbox" name="agree"> <label></label> </div> <span>Remember Me</span>
                            </div> -->
                            <div class="col-xs-12"> <button type="submit" class="btn btn--primary">Daftar</button> </div>
                            <hr>
                            <div class="col-xs-12"> <span class="type--fine-print">Dengan mendaftar, anda menyetujui <a href="#">Syarat dan Ketentuan</a></span> </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        {{--  <div class="col-sm-3 mb--1">
            <div class="modal-instance block">
                <a class="btn modal-trigger" href="#">
                    <span class="btn__text">
                        Newsletter Wide
                    </span>
                </a>
                <div class="modal-container" id="mtrigger">
                    <div class="modal-content">
                        <section class="imageblock feature-large bg--white border--round ">
                            <div class="imageblock__content col-md-5 col-sm-3 pos-left">
                                <div class="background-image-holder">
                                    <img alt="image" src="img/cowork-10.jpg" />
                                </div>
                            </div>
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-5 col-md-push-6 col-sm-7 col-sm-push-4">
                                        <h2>News, Freebies and More.</h2>
                                        <p class="lead">Subscribe to our monthly mailing list. Strictly useful articles and resources &mdash; no spam.</p>
                                        <form action="//mrare.us8.list-manage.com/subscribe/post?u=77142ece814d3cff52058a51f&amp;id=f300c9cce8" data-success="Thanks for signing up.  Please check your inbox for a confirmation email." data-error="Please provide your name, email address and agree to the terms.">
                                            <input class="validate-required" type="text" name="NAME" placeholder="Your Name" />
                                            <input class="validate-required validate-email" type="email" name="EMAIL" placeholder="Email Address" />
                                            <input class="validate-required" type="checkbox" name="group[13737][1]" />
                                            <span>I have read and agree to the
                                                <a href="#">terms and conditions</a>
                                            </span>
                                            <button type="submit" class="btn btn--primary type--uppercase">Subscribe To Newsletter</button>
                                            <div style="position: absolute; left: -5000px;" aria-hidden="true">
                                                <input type="text" required name="b_77142ece814d3cff52058a51f_f300c9cce8" tabindex="-1" value="">
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <!--end of row-->
                            </div>
                            <!--end of container-->
                        </section>
                    </div>
                </div>
            </div>
            <!--end of modal instance-->
        </div>  --}}
    </section>
    <!-- <section class="text-center">
        <div class="container">
            <div class="row">
                <div class="col-sm-8">
                    <div class="tabs-container" data-content-align="left">
                        <ul class="tabs">
                            <li class="active">
                                <div class="tab__title text-center"> <i class="icon icon--sm block icon-Target-Market"></i> <span class="h5">Code Quality</span> </div>
                                <div class="tab__content">
                                    <p class="lead"> Stack follows the BEM naming convention that focusses on logical code readability that is reflected in both the HTML and CSS. Interactive elements such as accordions and tabs follow the same markup patterns making rapid development easier for developers and beginners alike. </p>
                                    <p class="lead"> Add to this the thoughtfully presented documentation, featuring code highlighting, snippets, class customizer explanation and you've got yourself one powerful value package. </p>
                                </div>
                            </li>
                            <li>
                                <div class="tab__title text-center"> <i class="icon icon--sm block icon-Text-Effect"></i> <span class="h5">Visual Design</span> </div>
                                <div class="tab__content">
                                    <p class="lead"> Stack offers a clean and contemporary look to suit a range of purposes from corporate, tech startup, marketing site to digital storefront. Elements have been designed to showcase content in a diverse yet consistent manner. </p>
                                    <p class="lead"> Multiple font and colour scheme options mean that dramatically altering the look of your site is just clicks away — Customizing your site in the included Variant Page Builder makes experimenting with styles and content arrangements dead simple. </p>
                                </div>
                            </li>
                            <li>
                                <div class="tab__title text-center"> <i class="icon icon--sm block icon-Love-User"></i> <span class="h5">Stack Experience</span> </div>
                                <div class="tab__content">
                                    <p class="lead"> Medium Rare is an elite author known for offering high-quality, high-value products backed by timely and personable support. Recognised and awarded by Envato on multiple occasions for producing consistently outstanding products, it's no wonder over 20,000 customers enjoy using Medium Rare templates. </p>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section> -->
@endsection
@section('registeredScript')
    <script type="text/javascript">
        $(document).ready(function(){
            $('#provinsi').on('change',function(){
                $idProvinsi = $('#provinsi').val();
                $.ajax({
                    method : 'GET',
                    url : '/administratif/'+$idProvinsi+'/provinsi'
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
        });
    </script>
@endsection