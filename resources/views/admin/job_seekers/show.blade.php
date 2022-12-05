@extends('layouts.admin')

@section('content')
@php
$photo = (isset($job_seeker->photo_url) && !empty($job_seeker->photo_url)) ? $job_seeker->photo_url : '';
$resume = (isset($job_seeker->resume_url) && !empty($job_seeker->resume_url)) ? $job_seeker->resume_url : '';
$url = asset('photos/'.$photo);
$resume_url = asset('resumes/'.$resume);
@endphp
<div class="row">
          <div class="col-md-12">
            <div class="card card-outline card-primary">
              <div class="card-header">
                <b>Show Job Seeker</b>

                <div class="card-tools">
                  <a href="{{ url('admin/job_seekers') }}"><button  class="btn btn-sm btn-primary">
                   <i class="fa fa-arrow-left" aria-hidden="true"></i> Back
                  </button></a>
                </div>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="row">
                  <div class="col-md-12">
                   <div class="form-row">
                     
                      <div class="col-md-3">
                         <label class="form-label" for="form3Example1c">Name</label>
                         <p>{{ (isset($job_seeker->name) && !empty($job_seeker->name)) ? ucfirst($job_seeker->name) : '-'  }}</p>
                        </div>
                        <div class="col-md-3">
                         <label class="form-label" for="form3Example1c">Email</label>
                         <p>{{ (isset($job_seeker->email) && !empty($job_seeker->email)) ? ucfirst($job_seeker->email) : '-'  }}</p>
                        </div>
                        <div class="col-md-3">
                         <label class="form-label" for="form3Example1c">Mobile Number</label>
                         <p>{{ (isset($job_seeker->mobile_number) && !empty($job_seeker->mobile_number)) ? ucfirst($job_seeker->mobile_number) : '-'  }}</p>
                        </div>

                        <div class="col-md-3">
                         <label class="form-label" for="form3Example1c">Experience From</label>
                         <p>{{ (isset($job_seeker->experience_from) && !empty($job_seeker->experience_from)) ? ucfirst($job_seeker->experience_from) : '-'  }}</p>
                        </div>
                        <div class="col-md-3">
                         <label class="form-label" for="form3Example1c">Experience To</label>
                         <p>{{ (isset($job_seeker->experience_to) && !empty($job_seeker->experience_to)) ? ucfirst($job_seeker->experience_to) : '-'  }}</p>
                        </div>
                        <div class="col-md-3">
                         <label class="form-label" for="form3Example1c">Experience</label>
                         <p>{{ (isset($job_seeker->experience) && !empty($job_seeker->experience)) ? ucfirst($job_seeker->experience) : '-'  }}</p>
                        </div>
                        <div class="col-md-3">
                         <label class="form-label" for="form3Example1c">NoticePeriod</label>
                         <p>{{ (isset($job_seeker->notice_period) && !empty($job_seeker->notice_period)) ? ucfirst($job_seeker->notice_period) : '-'  }}</p>
                        </div>
                        <div class="col-md-3">
                         <label class="form-label" for="form3Example1c">Skills</label>
                         <p>{{ (isset($job_seeker->skills) && !empty($job_seeker->skills)) ? ucfirst($job_seeker->skills) : '-'  }}</p>
                        </div>
                        <div class="col-md-3">
                         <label class="form-label" for="form3Example1c">City</label>
                         <p>{{ (isset($job_seeker->city) && !empty($job_seeker->city)) ? ucfirst($job_seeker->city) : '-'  }}</p>
                        </div>
                        <div class="col-md-3">
                         <label class="form-label" for="form3Example1c">Resume</label>
                         <p><a href="{{ $resume_url }}" title="Download File" class="text-danger" download><i class="fa fa-file" aria-hidden="true"></i></a></p>
                        </div>
                        <div class="col-md-3">
                         <label class="form-label" for="form3Example1c">Photo</label>
                         <p><img src="{{ $url }}" width="50px" height="50px"></p>
                        </div>
                        <div class="col-md-3">
                         <label class="form-label" for="form3Example1c">Status</label>
                         <p>{{ (isset($job_seeker->status) && !empty($job_seeker->status)) ? ucfirst($job_seeker->status) : '-'  }}</p>
                        </div>
                   </div>
                  </div>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        
          <!-- /.col -->
        </div>

@endsection