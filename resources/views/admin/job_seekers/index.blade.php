@extends('layouts.admin') @section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card card-outline card-primary">
            <div class="card-header">
                <b>Filter</b>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                </div>
                <!-- /.card-tools -->
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                {!! Form::open(['method' => 'GET', 'url' => '/admin/job_seekers', 'role' => 'search', 'autocomplete' => 'off']) !!}
                <div class="col-md-12">
                    <div class="form-row">
                        <div class="col-md-3 mb-3">
                            <label class="form-label" for="form3Example1c">Name</label>
                            <input type="text" class="form-control" placeholder="Enter Name" name="name" value="{{ request('name') }}" />
                        </div>
                        <div class="col-md-3 mb-3">
                            <label class="form-label" for="form3Example1c">Email</label>
                            <input type="email" class="form-control" placeholder="Enter Email" name="email" value="{{ request('email') }}"/>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label class="form-label" for="form3Example1c">Skills</label>
                            @php
                            $skills = (!empty(request('skills')) && count(request('skills')) > 0) ? request('skills') : '';
                            @endphp
                            <select class="form-control select-multiple select2 select2bs4" name="skills[]" multiple="multiple" data-placeholder="Enter Skills" style="color:black;">
                              @if(!empty($skills) && count($skills) > 0)
                              @foreach($skills as $item)
                              <option selected>{{ $item }}</option>
                              @endforeach
                              @endif
                            </select>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label class="form-label" for="form3Example1c">Job Location</label>
                            {!!Form::select('city',$cities, !empty(request('city')) ? request('city') : null,['class'=>'form-control select2']) !!}
                        </div>
                        <div class="col-md-3 mb-3">
                            <label class="form-label" for="form3Example1c">Min Experience</label>
                            <input type="text" class="form-control" placeholder="Enter Min Experience" name="min_experience" maxlength="3" oninput="onlyNumberPaste(this)" onkeypress="onlyNumbers(this.value, event)" value="{{ request('min_experience') }}"/>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label class="form-label" for="form3Example1c">Max Experience</label>
                            <input type="text" class="form-control" placeholder="Enter Max Experience" name="max_experience" maxlength="3" oninput="onlyNumberPaste(this)" onkeypress="onlyNumbers(this.value, event)" value="{{ request('max_experience') }}"/>
                        </div>
                    </div>
                    <div class="form-row">
                        <button class="btn btn-sm btn-success" type="submit">Search</button>
                        &nbsp; @if(!empty(request('name')) || !empty(request('email')) || !empty(request('skills')) || !empty(request('city')) || !empty(request('min_experience')) || !empty(request('max_experience')))
                        <a href="{{ url('admin/job_seekers?cancel=cancel') }}" class="btn btn-sm btn-danger">Cancel</a>
                        @endif
                    </div>
                </div>

                {!! Form::close() !!}
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.col -->

    <!-- /.col -->
</div>

<div class="row">
    <div class="col-md-2">
        {!!Form::select('page_per_view',page_per_view(), !empty(request('page_per_view')) ? request('page_per_view') : null,['class'=>'form-control select2 page_per_view']) !!}
    </div>
    <br />
    <br />
    <div class="col-md-12">
        <table class="table table-hover table-striped table-bordered text-nowrap">
            <thead>
                <tr>
                    <th class="text-center">#</th>
                    <th class="text-center">Name</th>
                    <th class="text-center">Email</th>
                    <th class="text-center">Mobile Number</th>
                    <th class="text-center">Experience</th>
                    <th class="text-center">Photo</th>
                    <th class="text-center">Resume</th>
                    <th class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse($job_seekers as $item) @php $photo = (isset($item->photo_url) && !empty($item->photo_url)) ? $item->photo_url : ''; $resume = (isset($item->resume_url) && !empty($item->resume_url)) ? $item->resume_url : ''; $url =
                asset('photos/'.$photo); $resume_url = asset('resumes/'.$resume); @endphp
                <tr>
                    <td>{{ (($job_seekers->currentPage() - 1) * $job_seekers->perPage()) + $loop->iteration }}</td>
                    <td>{{ (isset($item->name) && !empty($item->name)) ? ucfirst($item->name) : '-' }}</td>
                    <td>{{ (isset($item->email) && !empty($item->email)) ? $item->email : '-' }}</td>
                    <td>{{ (isset($item->mobile_number) && !empty($item->mobile_number)) ? $item->mobile_number : '-' }}</td>
                    <td align="center">{{ (isset($item->experience) && !empty($item->experience)) ? $item->experience.' Year' : '-' }}</td>
                    <td align="center"><img src="{{ $url }}" width="50px" height="50px" /></td>
                    <td align="center">
                        <a href="{{ $resume_url }}" title="Download File" class="text-danger" download><i class="fa fa-file" aria-hidden="true"></i></a>
                    </td>
                    <td align="center">
                        <a href="{{ url('admin/job_seekers/'.$item->id) }}" title="View Job Seeker"><i class="fa fa-eye text-navy" aria-hidden="true"></i></a>
                        &nbsp;
                        <form method="post" action="{{ url('/admin/job_seekers/'.$item->id) }}" accept-charset="UTF-8" style="display: inline;">
                            {{method_field('DELETE')}} {{ csrf_field() }}
                            <button type="submit" class="btn-sm btn btn-xs" title="Delete Job Seeker" onclick='return confirm("Confirm Delete?")'><i class="fa fa-trash text-danger" aria-hidden="true"></i></button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="8" class="text-center"><b>No Data Found</b></td>
                </tr>
                @endforelse
            </tbody>
        </table>
        @if($job_seekers->total() > 0)
        <div class="col-md-4 pagination pagination-sm float-left">
            Showing {{ !empty($job_seekers->firstItem()) ? $job_seekers->firstItem() : '0' }} to {{ !empty($job_seekers->lastItem()) ? $job_seekers->lastItem() : '0' }} of {{ $job_seekers->total() }} entries
        </div>
        @endif
        <div class="col-md-4 pagination pagination-sm float-right">
            {!! $job_seekers->appends(request()->input())->render() !!}
        </div>
    </div>
</div>

<style type="text/css">
    .page_per_view {
        width: 70px !important;
    }
</style>
@endsection
