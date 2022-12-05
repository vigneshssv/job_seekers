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

                <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Login</p>

                <form method="POST" action="{{ url('admin/login') }}" class="login_form">
                        @csrf
                        
                <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-envelope fa-lg me-3 fa-fw mt-4"></i>
                    <div class="form-outline flex-fill mb-0 pl-2">
                       <label class="form-label" for="form3Example3c">User Name</label>
                      <input type="text" id="form3Example3c" class="form-control" placeholder="Enter User Name" name="user_name" />
                     <span class="help-block text-danger user_name_error"></span>
                     @error('user_name')
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

                  <div class="d-flex justify-content-center mx-4 mb-3 mt-3 mb-lg-4">
                    <button type="button" class="btn btn-primary btn-lg" onclick="validate_login_form()">Login</button>
                  </div>
                    <p class="small fw-bold mt-2 pt-1 mb-0">Don't have an account? <a href="{{url('/register')}}"
                class="link-danger">Register</a></p>
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
