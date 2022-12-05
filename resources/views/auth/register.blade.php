@extends('layouts.app')

@section('content')
<section class="pt-3" style="background-color: #eee;">
  <div class="container h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-lg-12 col-xl-11">
        <div class="card text-black" style="border-radius: 25px;">
          <div class="card-body p-md-5">
            <div class="row justify-content-center">
              <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Sign up</p>

                <form method="POST" action="{{ route('register') }}" class="registration_form">
                        @csrf

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-user fa-lg me-3 fa-fw mt-4"></i>
                    <div class="form-outline flex-fill mb-0 pl-2">
                      <label class="form-label" for="form3Example1c">UserName</label>
                      <input type="text" id="form3Example1c" class="form-control" placeholder="Enter User Name" name="user_name"/>
                       <span class="help-block text-danger user_name_error"></span>
                      @error('user_name')
                            <span class="help-block text-danger">{{ $message }}</span>
                      @enderror
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-envelope fa-lg me-3 fa-fw mt-4"></i>
                    <div class="form-outline flex-fill mb-0 pl-2">
                       <label class="form-label" for="form3Example3c">Email</label>
                      <input type="email" id="form3Example3c" class="form-control" placeholder="Enter Email" name="email" />
                     <span class="help-block text-danger email_error"></span>
                     @error('email')
                            <span class="help-block text-danger">{{ $message }}</span>
                      @enderror
                    </div>
                  </div>
                    <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-mobile fa-lg me-3 fa-fw mt-4"></i>
                    <div class="form-outline flex-fill mb-0 pl-2">
                       <label class="form-label" for="form3Example3c">Mobile Number</label>
                      <input type="email" id="form3Example3c" class="form-control" placeholder="Enter Mobile Number" name="mobile_number" maxlength="10" minlength="10" oninput="onlyNumberPaste(this)" onkeypress="onlyNumbers(this.value, event)" />
                     <span class="help-block text-danger mobile_number_error"></span>
                     @error('mobile_number')
                            <span class="help-block text-danger">{{ $message }}</span>
                      @enderror
                    </div>
                  </div>


                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-lock fa-lg me-3 fa-fw mt-4"></i>
                    <div class="form-outline flex-fill mb-0 pl-2">
                      <label class="form-label" for="form3Example4c">Password</label>
                      <input type="password" id="form3Example4c" class="form-control" placeholder="Enter Password" name="password" minlength="6" />
                      <span class="help-block text-danger password_error"></span>
                      @error('password')
                            <span class="help-block text-danger">{{ $message }}</span>
                      @enderror
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-key fa-lg me-3 fa-fw mt-4"></i>
                    <div class="form-outline flex-fill mb-0 pl-2">
                      <label class="form-label" for="form3Example4cd">Confirm Password</label>
                      <input type="password" id="form3Example4cd" class="form-control" placeholder="Enter Confirm Password" name="password_confirmation" />
                      <span class="help-block text-danger password_confirmation_error"></span>
                      @error('password_confirmation')
                            <span class="help-block text-danger">{{ $message }}</span>
                      @enderror
                    </div>
                  </div>
                  <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">I agree all statements in <a href="#!">Terms of service</a></label>
                  </div>
                  

                  <div class="d-flex justify-content-center mx-4 mb-3 mt-3 mb-lg-4">
                    <button type="button" class="btn btn-primary btn-lg" onclick="validate_registration_form()">Register</button>
                  </div>

                </form>

              </div>
              <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">

                <img src="{{ asset('images/register.png') }}"
                  class="img-fluid" alt="Sample image">

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
