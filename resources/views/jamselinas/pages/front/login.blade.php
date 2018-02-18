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
                    <h2>Form Login Jamselinas 8 Makassar 2018</h2> 
                    {{--  <span>Already have an account? <a href="#">Sign In</a></span>  --}}
                    @foreach ($errors->all() as $message)
                        {{ $message }}<br>
                    @endforeach
                    <form method="post" action="{{ URL('/login')}}">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-xs-12">
                                <label for="username" class="lbl-input">Username</label>
                                <input type="text" required name="username" id="username" value="{{ old('username')}}">
                            </div>
                            <div class="col-xs-12">
                                <label for="password" class="lbl-input">Password</label>
                                <input type="password" name="password" value="{{ old('password')}}" required>
                            </div>
                            <div class="col-xs-12"> <button type="submit" class="btn btn--primary">Masuk</button> </div>
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