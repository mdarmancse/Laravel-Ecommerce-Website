@extends('Layout.app2')

@section('title','Registration')

@section('content')
    <div class="main">

        <!-- Sign up form -->
        <section class="signup">
        <div class="container">
            <div class="signup-content">
                <div class="signup-form">
                    <h2 class="form-title">Sign up</h2>
                    <form method="POST" action="{{url('/billing-add')}}" class="register-form" id="register-form">
                        @csrf

                        <div class="form-group">
                            <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                            <input type="text" name="customer_name" id="fname" placeholder="Name" required/>
                        </div>

                        <div class="form-group">
                            <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                            <input type="text" name="country" id="fname" placeholder="Country" required/>
                        </div>

                        <div class="form-group">
                            <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                            <input type="text" name="address" id="fname" placeholder="Address" />
                        </div>
                        <div class="form-group">
                            <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                            <input type="text" name="zip_code" id="fname" placeholder="Postal Code" />
                        </div>

                        <div class="form-group">
                            <label for="email"><i class="zmdi zmdi-email"></i></label>
                            <input type="email" name="email_address" id="email" placeholder="Your Email"/>
                        </div>

                        <div class="form-group">
                            <label for="email"><i class="zmdi zmdi-email"></i></label>
                            <input type="number" name="mobile" id="mobile" placeholder="Telephone"/>
                        </div>
                        <div class="form-group">
                            <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                            <input type="password" name="password" id="pass" placeholder="Password"/>
                        </div>

                        <div class="form-group">
                            <input type="checkbox" name="agree-term" id="agree-term" class="agree-term" />
                            <label for="agree-term" class="label-agree-term"><span><span></span></span>I agree all statements in  <a href="#" class="term-service">Terms of service</a></label>
                        </div>
                        <div class="form-group form-button">
                            <input class="btn btn-danger" type="submit" name="signup" id="signup" class="form-submit" value="Register"/>
                        </div>

                    </form>
                </div>
                <div class="signup-image">
                    <figure><img src="{{asset('img/signup-image.jpg')}}" alt="sing up image"></figure>

                </div>
            </div>
        </div>
        </section>
    </div>




@endsection
