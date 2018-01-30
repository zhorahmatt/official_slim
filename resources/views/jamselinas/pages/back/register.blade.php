<!doctype html>
<html lang="en">
    <head>
        <title>Document</title>
        <!-- meta -->
        @include('jamselinas.layouts.partials.meta')

        @yield('styles')
    </head>
    <body data-smooth-scroll-offset="77">
        <div class="nav-container">
            @include('jamselinas.layouts.partials.header')
        </div>
        <div class="main-container">
            @yield('content')
            <section class="space--xs imageblock switchable feature-large">
                <div class="imageblock__content col-md-5 col-sm-4 pos-right">
                    <div class="background-image-holder"> <img alt="image" src="img/inner-7.jpg"> </div>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-md-5 col-sm-7">
                            <h2>Create a Stack account</h2> <span>Already have an account? <a href="#">Sign In</a></span>
                            <hr class="short">
                            <form>
                                <div class="row">
                                    <div class="col-xs-12"> <input type="text" name="First Name" placeholder="Your Name"> </div>
                                    <div class="col-xs-12"> <input type="email" name="Email Address" placeholder="Email Address"> </div>
                                    <div class="col-xs-12"> <input type="password" name="Password" placeholder="Password"> </div>
                                    <div class="col-xs-12"> <input type="password" name="Password-confirm" placeholder="Confirm Password"> </div>
                                    <div class="col-xs-12">
                                        <div class="input-checkbox"> <input type="checkbox" name="agree"> <label></label> </div> <span>Remember Me</span> </div>
                                    <div class="col-xs-12"> <button type="submit" class="btn btn--primary">Create Account</button> </div>
                                    <hr>
                                    <div class="col-xs-12"> <span class="type--fine-print">By signing up, you agree to the <a href="#">Terms of Service</a></span> </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
            <section class="text-center">
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
            </section>
            @include('jamselinas.layouts.partials.footer')
        </div>

        @include('jamselinas.layouts.partials.script')

        @yield('registeredScript')
    </body>

</html>