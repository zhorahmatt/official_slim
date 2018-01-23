<footer class="footer-4 space--sm text-center-xs">
    <div class="container">
        <div class="row">
            <div class="col-sm-6"> <img alt="Image" class="logo" src="{{ asset('uploaded') }}/{{ $setting->logo }}" "></div>
            <div class="col-sm-6">
                
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6"> <span class="type--fine-print">© <span class="update-year"></span> Sepeda Lipat Makassar.</span>
                {{--  <a class="type--fine-print" href="#">Privacy Policy</a>
                <a class="type--fine-print" href="#">Legal</a>  --}}
            </div>
            <div class="col-sm-6 text-right text-center-xs block--xs">
                <ul class="social-list list-inline list--hover">
                    <li><a href="https://plus.google.com/{{ $setting->google }}"><i class="socicon socicon-google icon icon--xs"></i></a></li>
                    <li><a href="https://twitter.com/{{ $setting->twitter }}"><i class="socicon socicon-twitter icon icon--xs"></i></a></li>
                    <li><a href="https://www.facebook.com/{{ $setting->facebook }}"><i class="socicon socicon-facebook icon icon--xs"></i></a></li>
                    <li><a href="https://www.instagram.com/{{ $setting->instagram }}"><i class="socicon socicon-instagram icon icon--xs"></i></a></li>
                </ul>
            </div>
        </div>
    </div>
</footer>