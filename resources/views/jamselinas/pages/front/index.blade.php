@extends('jamselinas.layouts.main')

@section('content')
    <section class="text-center">
        <!-- <div class="imageblock__content col-md-5 col-sm-4 pos-right">
            <div class="background-image-holder"> <img alt="image" src="{{ url('assets/jamselinas') }}/img/inner-7.jpg"> </div>
        </div> -->
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <section class="imageblock feature-large bg--white border--round ">
                        <div class="imageblock__content col-md-5 col-sm-3 pos-left">
                            <div class="background-image-holder">
                                <img alt="image" src="img/cowork-10.jpg" />
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="">
                                    <img src="{{ url('assets/jamselinas') }}/img/logo_jamselinas.png" alt="logo_jamselinas" width="170" height="250" >
                                    <h1><strong>Coming Soon</strong></h1>
                                    <p class="lead">For more information about cycling activity in around Makassar or South Sulawesi, please feel free to contact us (<strong>KAKA 0811 411 2244</strong> n <strong>SYARIEF 0895 3356 31297</strong>).</p>
                                </div>
                            </div>
                            <!--end of row-->
                        </div>
                        <!--end of container-->
                    </section>
                </div>
            </div>
        </div>
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
            $(function() {
                $("#myModal").modal();
            });

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
        });
    </script>
@endsection