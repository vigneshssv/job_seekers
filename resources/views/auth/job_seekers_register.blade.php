@extends('layouts.app')

@section('content')
<section class="pt-3" style="background-color: #eee;">
  <div class="container h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-lg-12 col-xl-11">
        <div class="card text-black" style="border-radius: 25px;">
          <div class="card-body p-md-5">
            <div class="col-md-12 text-center">
                <h1>Sing Up</h1>
              </div>
            <form method="POST" action="{{ url('job_seekers/upate-registration') }}" class="registration_form" enctype="multipart/form-data">
                        @csrf
            <div class="row justify-content-center pt-5">
              
              <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

              
                

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-user fa-lg me-3 fa-fw mt-4"></i>
                    <div class="form-outline flex-fill mb-0 pl-2">
                      <label class="form-label" for="form3Example1c">Name<span class="text-danger">*</span></label>
                      <input type="text" id="form3Example1c" class="form-control" placeholder="Enter User Name" name="name"/>
                       <span class="help-block text-danger name_error"></span>
                      @error('name')
                            <span class="help-block text-danger">{{ $message }}</span>
                      @enderror
                    </div>
                  </div>
                  
                 
                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-mobile fa-lg me-3 fa-fw mt-4"></i>
                    <div class="form-outline flex-fill mb-0 pl-2">
                       <label class="form-label" for="form3Example3c">Mobile Number<span class="text-danger">*</span></label>
                      <input type="text" class="form-control" placeholder="Enter Mobile Number" name="mobile_number" maxlength="10" minlength="10" oninput="onlyNumberPaste(this)" onkeypress="onlyNumbers(this.value, event)" />
                     <span class="help-block text-danger mobile_number_error"></span>
                     @error('mobile_number')
                            <span class="help-block text-danger">{{ $message }}</span>
                      @enderror
                    </div>
                  </div>
                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-mobile fa-lg me-3 fa-fw mt-4"></i>
                    <div class="form-outline flex-fill mb-0 pl-2">
                       <label class="form-label" for="form3Example3c">Experience From<span class="text-danger">*</span></label>
                      <input type="text" class="form-control yearpicker" placeholder="Select Year" name="experience_from" readonly>
                     <span class="help-block text-danger experience_from_error"></span>
                     @error('experience_from')
                            <span class="help-block text-danger">{{ $message }}</span>
                      @enderror
                    </div>
                  </div>

                 
                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-mobile fa-lg me-3 fa-fw mt-4"></i>
                    <div class="form-outline flex-fill mb-0 pl-2">
                       <label class="form-label" for="form3Example3c">Skills<span class="text-danger">*</span></label>
                      <select class="form-control select-multiple select2 select2bs4" name="skills[]" multiple="multiple" data-placeholder="Enter Skills" style="color:black;">
                       
                      </select>
                     <span class="help-block text-danger skills_error"></span>
                     @error('notice_period')
                            <span class="help-block text-danger">{{ $message }}</span>
                      @enderror
                    </div>
                  </div>
                   <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-mobile fa-lg me-3 fa-fw mt-4"></i>
                    <div class="form-outline flex-fill mb-0 pl-2">
                       <label class="form-label" for="form3Example3c">Resume<span class="text-danger">*</span></label>
                      <input type="file" name="resume" class="form-control" accept="application/msword, application/vnd.ms-powerpoint,text/plain, application/pdf">
                     <span class="help-block text-danger resume_error"></span>
                     @error('notice_period')
                            <span class="help-block text-danger">{{ $message }}</span>
                      @enderror
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-lock fa-lg me-3 fa-fw mt-4"></i>
                    <div class="form-outline flex-fill mb-0 pl-2">
                      <label class="form-label" for="form3Example4c">Password<span class="text-danger">*</span></label>
                      <input type="password" id="form3Example4c" class="form-control" placeholder="Enter Password" name="password" minlength="6" />
                      <span class="help-block text-danger password_error"></span>
                      @error('password')
                            <span class="help-block text-danger">{{ $message }}</span>
                      @enderror
                    </div>
                  </div>

                 
                  <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    &nbsp;
                    <label class="form-check-label" for="exampleCheck1">I agree all statements in <a href="#!">Terms of service</a></label>
                  </div>
                  

                
                

              </div>
              <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">
                 
                  
                <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-envelope fa-lg me-3 fa-fw mt-4"></i>
                    <div class="form-outline flex-fill mb-0 pl-2">
                       <label class="form-label" for="form3Example3c">Email<span class="text-danger">*</span></label>
                      <input type="email" class="form-control" placeholder="Enter Email" name="email" />
                     <span class="help-block text-danger email_error"></span>
                     @error('email')
                            <span class="help-block text-danger">{{ $message }}</span>
                      @enderror
                    </div>
                  </div>
                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-mobile fa-lg me-3 fa-fw mt-4"></i>
                    <div class="form-outline flex-fill mb-0 pl-2">
                       <label class="form-label" for="form3Example3c">Notice Period<span class="text-danger">*</span></label>
                      <input type="text" class="form-control" placeholder="Enter Notice Period" name="notice_period" maxlength="3" minlength="3" oninput="onlyNumberPaste(this)" onkeypress="onlyNumbers(this.value, event)" />
                     <span class="help-block text-danger notice_period_error"></span>
                     @error('notice_period')
                            <span class="help-block text-danger">{{ $message }}</span>
                      @enderror
                    </div>
                  </div>
                   <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-mobile fa-lg me-3 fa-fw mt-4"></i>
                    <div class="form-outline flex-fill mb-0 pl-2">
                       <label class="form-label" for="form3Example3c">Experience To<span class="text-danger">*</span></label>
                      <input type="text" class="form-control yearpicker" placeholder="Enter Year" name="experience_to" readonly>
                     <span class="help-block text-danger experience_to_error"></span>
                     @error('experience_to')
                            <span class="help-block text-danger">{{ $message }}</span>
                      @enderror
                    </div>
                  </div>
                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-mobile fa-lg me-3 fa-fw mt-4"></i>
                    <div class="form-outline flex-fill mb-0 pl-2">
                       <label class="form-label" for="form3Example3c">Job Location<span class="text-danger">*</span></label>
                     {!!Form::select('job_location',$cities, null,['class'=>'form-control select2']) !!}
                     <span class="help-block text-danger job_location_error"></span>
                     @error('job_location')
                            <span class="help-block text-danger">{{ $message }}</span>
                      @enderror
                    </div>
                  </div>
                  
                    <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-mobile fa-lg me-3 fa-fw mt-4"></i>
                    <div class="form-outline flex-fill mb-0 pl-2">
                       <label class="form-label" for="form3Example3c">Photo<span class="text-danger">*</span></label>
                      <input type="file" name="photo" class="form-control" accept="image/*">
                     <span class="help-block text-danger photo_error"></span>
                     @error('photo')
                            <span class="help-block text-danger">{{ $message }}</span>
                      @enderror
                    </div>
                  </div>
                 <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-key fa-lg me-3 fa-fw mt-4"></i>
                    <div class="form-outline flex-fill mb-0 pl-2">
                      <label class="form-label" for="form3Example4cd">Confirm Password<span class="text-danger">*</span></label>
                      <input type="password" id="form3Example4cd" class="form-control" placeholder="Enter Confirm Password" name="password_confirmation" />
                      <span class="help-block text-danger password_confirmation_error"></span>
                      @error('password_confirmation')
                            <span class="help-block text-danger">{{ $message }}</span>
                      @enderror
                    </div>
                  </div>
              </div>
              <br>
                 <div class="col-md-12 col-lg-6 col-xl-5 order-2 order-lg-1 pt-4">
                 <button type="button" class="btn btn-primary btn-lg" onclick="validate_job_seeker_registration_form()">Register</button>
              </div>
            </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<style type="text/css">
  .select2-selection__choice__display{
    color: black !important;
  }
</style>
@endsection
