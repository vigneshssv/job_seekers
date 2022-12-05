@extends('layouts.admin') @section('content') @php $photo = (isset($user->photo_url) && !empty($user->photo_url)) ? $user->photo_url : ''; $resume = (isset($user->resume_url) && !empty($user->resume_url)) ? $user->resume_url : ''; $url =
asset('photos/'.$photo); $resume_url = asset('resumes/'.$resume); $skills = (!empty($user->skills)) ? explode(',', $user->skills) : ''; @endphp
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Profile</h1>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
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
                    {!! Form::open(['method' => 'POST', 'url' => '/job_seekers/update-profile', 'role' => 'search', 'autocomplete' => 'off', 'class' => 'profile_form', 'files' => 'true']) !!} @csrf
                    <div class="card-body">
                        <div class="col-md-12">
                            <div class="form-row">
                                <div class="col-md-3 mb-3">
                                    <label class="form-label" for="form3Example1c">Name<span class="text-danger">*</span></label>
                                    <input type="text" id="form3Example1c" class="form-control" placeholder="Enter User Name" name="name" value="{{ (isset($user->name) && !empty($user->name)) ? $user->name : '' }}" />
                                    <span class="help-block text-danger name_error"></span>
                                    @error('name')
                                    <span class="help-block text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-md-3 mb-3">
                                    <label class="form-label" for="form3Example3c">Mobile Number<span class="text-danger">*</span></label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        placeholder="Enter Mobile Number"
                                        name="mobile_number"
                                        maxlength="10"
                                        minlength="10"
                                        oninput="onlyNumberPaste(this)"
                                        onkeypress="onlyNumbers(this.value, event)"
                                        value="{{ (isset($user->mobile_number) && !empty($user->mobile_number)) ? $user->mobile_number : '' }}"
                                    />
                                    <span class="help-block text-danger mobile_number_error"></span>
                                    @error('mobile_number')
                                    <span class="help-block text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label class="form-label" for="form3Example3c">Email<span class="text-danger">*</span></label>
                                    <input type="email" class="form-control" placeholder="Enter Email" name="email" value="{{ (isset($user->email) && !empty($user->email)) ? $user->email : '' }}" />
                                    <span class="help-block text-danger email_error"></span>
                                    @error('email')
                                    <span class="help-block text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-md-3 mb-3">
                                    <label class="form-label" for="form3Example3c">Skills<span class="text-danger">*</span></label>
                                    <select class="form-control select-multiple select2 select2bs4" name="skills[]" multiple="multiple" data-placeholder="Enter Skills" style="color: black;">
                                        @if(!empty($skills) && count($skills) > 0) @foreach($skills as $item)
                                        <option selected>{{ $item }}</option>
                                        @endforeach @endif
                                    </select>
                                    <span class="help-block text-danger skills_error"></span>
                                    @error('notice_period')
                                    <span class="help-block text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-md-3 mb-3">
                                    <label class="form-label" for="form3Example3c">Notice Period<span class="text-danger">*</span></label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        placeholder="Enter Notice Period"
                                        name="notice_period"
                                        maxlength="3"
                                        minlength="3"
                                        oninput="onlyNumberPaste(this)"
                                        onkeypress="onlyNumbers(this.value, event)"
                                        value="{{ (isset($user->notice_period) && !empty($user->notice_period)) ? $user->notice_period : '' }}"
                                    />
                                    <span class="help-block text-danger notice_period_error"></span>
                                    @error('notice_period')
                                    <span class="help-block text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label class="form-label" for="form3Example3c">Experience From<span class="text-danger">*</span></label>
                                    <input
                                        type="text"
                                        class="form-control yearpicker"
                                        placeholder="Select Year"
                                        name="experience_from"
                                        readonly
                                        value="{{ (isset($user->experience_from) && !empty($user->experience_from)) ? $user->experience_from : '' }}"
                                    />
                                    <span class="help-block text-danger experience_from_error"></span>
                                    @error('experience_from')
                                    <span class="help-block text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label class="form-label" for="form3Example3c">Experience To<span class="text-danger">*</span></label>
                                    <input
                                        type="text"
                                        class="form-control yearpicker"
                                        placeholder="Enter Year"
                                        name="experience_to"
                                        value="{{ (isset($user->experience_to) && !empty($user->experience_to)) ? $user->experience_to : '' }}"
                                        readonly
                                    />
                                    <span class="help-block text-danger experience_to_error"></span>
                                    @error('experience_to')
                                    <span class="help-block text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label class="form-label" for="form3Example3c">Job Location<span class="text-danger">*</span></label>
                                    {!!Form::select('job_location',$cities, !empty($user->city) ? $user->city : null,['class'=>'form-control select2']) !!}
                                    <span class="help-block text-danger job_location_error"></span>
                                    @error('job_location')
                                    <span class="help-block text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label class="form-label" for="form3Example3c">Resume<span class="text-danger">*</span></label>
                                    <input type="file" name="resume" class="form-control" accept="application/msword, application/vnd.ms-powerpoint,text/plain, application/pdf" />
                                    <span class="help-block text-danger resume_error"></span>
                                    @error('notice_period')
                                    <span class="help-block text-danger">{{ $message }}</span>
                                    @enderror
                                    <p>
                                        <a href="{{ $resume_url }}" title="Download File" class="text-danger" download><i class="fa fa-file" aria-hidden="true" style="font-size:25px;"></i></a>
                                    </p>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label class="form-label" for="form3Example3c">Photo<span class="text-danger">*</span></label>
                                    <input type="file" name="photo" class="form-control" accept="image/*" />
                                    <span class="help-block text-danger photo_error"></span>
                                    @error('photo')
                                    <span class="help-block text-danger">{{ $message }}</span>
                                    @enderror

                                    <p><img src="{{ $url }}" width="200px" height="100px" /></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="button" onclick="validate_profile_form();" class="btn btn-primary">Submit</button>
                    </div>
                    {!! Form::close() !!}
                </div>
                <!-- /.card -->

                <!--/.col (right) -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
</section>
@endsection
