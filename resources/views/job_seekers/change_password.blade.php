@extends('layouts.admin')

@section('content')
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Change Password</h1>
          </div>
       
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-outline card-primary">
          
              <!-- /.card-header -->
              <!-- form start -->
              {!! Form::open(['method' => 'POST', 'url' => '/job_seekers/update-password', 'role' => 'search', 'autocomplete' => 'off', 'class' => 'change_password_form']) !!}
              @csrf
             <div class="card-body">
                
                <div class="col-md-12">
                    <div class="form-row">
                        <div class="col-md-3 mb-3">
                            <label class="form-label" for="form3Example1c">Old Password</label>
                            <input type="text" class="form-control" placeholder="Enter Old Password" name="old_password" />
                            <span class="help-block text-danger old_password_error"></span>
		                      @error('old_password')
		                            <span class="help-block text-danger">{{ $message }}</span>
		                      @enderror
                        </div>
                        <div class="col-md-3 mb-3">
                            <label class="form-label" for="form3Example1c">New Password</label>
                            <input type="text" class="form-control" placeholder="Enter New Password" name="new_password" />
                            <span class="help-block text-danger new_password_error"></span>
		                      @error('new_password')
		                            <span class="help-block text-danger">{{ $message }}</span>
		                      @enderror
                        </div>
                  	   <div class="col-md-3 mb-3">
                            <label class="form-label" for="form3Example1c">Confirm Password</label>
                            <input type="text" class="form-control" placeholder="Enter Confirm Password" name="confirm_password" />
                            <span class="help-block text-danger confirm_password_error"></span>
		                      @error('confirm_password')
		                            <span class="help-block text-danger">{{ $message }}</span>
		                      @enderror
                        </div>
                    </div>
                   
                </div>

                
            </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="button" onclick="validate_change_password();" class="btn btn-primary">Submit</button>
                </div>
              {!! Form::close() !!}
            </div>
            <!-- /.card -->


          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
@endsection
