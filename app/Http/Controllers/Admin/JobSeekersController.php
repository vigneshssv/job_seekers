<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\City;
use App\Models\JobSeeker;
use Auth;

class JobSeekersController extends Controller {

    
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request) {
      $per_page = (!empty($request->page_per_view)) ? $request->page_per_view : 10;
      $name = $request->name;
      $email = $request->email;
      $skills = $request->skills;
      $city = $request->city;
      $min_experience = $request->min_experience;
      $max_experience = $request->max_experience;
      if(!empty($request->cancel)) {
         return redirect('admin/job_seekers');
      }
     
       $job_seekers = JobSeeker::latest()
                     ->select('name','email','mobile_number','password','experience_from','experience_to','experience','notice_period','skills','city','resume_url','photo_url','status', 'id');
      if(!empty($name)) {
         $job_seekers->where('name', 'like', '%' . $name . '%');
      }
      if(!empty($email)) {
         $job_seekers->where('email', 'like', '%' . $email . '%');
      }
      if(!empty($skills) && count($skills) > 0) {
         // $skills = implode(',', $skills);
         $job_seekers->whereRaw('FIND_IN_SET(?, skills)', $skills);
      }
      if(!empty($city)) {
         $job_seekers->where('city', $city);
      }
      if(!empty($min_experience)) {
         $job_seekers->where('experience', '>=', $min_experience);
      }
      if(!empty($max_experience)) {
         $job_seekers->where('experience', '<=', $max_experience);
      }

       $job_seekers = $job_seekers->orderBy('id', 'desc')
                     ->paginate($per_page);

       $cities = City::where('status', 'active')
                ->orderBy('id', 'asc')
                ->pluck('name', 'id')
                ->prepend('Select Job Location', "");
       return view('admin/job_seekers/index', compact('cities', 'job_seekers'));
    }

    public function show($id = "") {
      if(!empty($id)) {
         $job_seeker = JobSeeker::select('name','email','mobile_number','password','experience_from','experience_to','experience','notice_period','skills','city','resume_url','photo_url','status')
            ->find($id);
         return view('admin/job_seekers/show', compact('job_seeker'));
      }
    }
    public function destroy($id = '') {
       if(!empty($id)) {
         $job_seeker = JobSeeker::find($id);
         $resume = public_path('resumes/'.$job_seeker->resume_url);
         $photo = public_path('photos/'.$job_seeker->photo_url);
         
         unlink($resume);
         unlink($photo);
         $job_seeker->delete();
         return redirect('admin/job_seekers')->with('flash_message', 'Job Seeker Deleted Successfully...!');
       }
    }
}
