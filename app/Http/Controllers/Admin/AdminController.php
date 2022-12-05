<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Auth;
use Response;
use App\Models\JobSeeker;
use App\Models\City;
use Hash;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index() {
        $is_admin = Auth::guard('web')->check();
        return view('admin.dashboard');
    }

    public function change_password() {
        return view('job_seekers.change_password');
    }
    public function validate_change_password_form(Request $request) {
        $id = Auth::user()->id;
        $user = JobSeeker::select('password')->find($id);
        $rules = [
            'old_password' => [
                    'required',
                    function ($attribute, $value, $fail) use ($user) {
                        if (!Hash::check($value, $user->password)) {
                            $fail('Your password was not updated, since the provided current password does not match.');
                        }
                    }
                ],
            'new_password' => 'required|min:6|max:15|different:old_password',
            'confirm_password' => 'required|min:6|max:15|same:new_password',
        ];
        $messages = array();
        
        
        $validator = Validator::make($request->all(), $rules, $messages);

        if($validator->fails()) {
            return response()->json(['code' => 401, 'errors' => $validator->getMessageBag()->toArray()]);
        }
        return Response::json(['success' => true], 200);
    }

    public function update_password(Request $request) {
        $id = Auth::user()->id;
        $user = JobSeeker::find($id);
        $validator = Validator::make($request->all(), [
            'old_password' => [
                    'required',
                    function ($attribute, $value, $fail) use ($user) {
                        if (!Hash::check($value, $user->password)) {
                            $fail('Your password was not updated, since the provided current password does not match.');
                        }
                    }
                ],
            'new_password' => 'required|min:6|max:15|different:old_password',
            'confirm_password' => 'required|min:6|max:15|same:new_password',
        ]);
            
        if ($validator->fails()) {
            return redirect('admin')->withErrors($validator)->withInput();
        }
        
        $user->update(['password' => Hash::make($request->new_password)]);
        return redirect('job_seekers/change-password')->with('flash_message', 'Password Updated SuccssFully...!');
    }

    public function profile(Request $request) {
        $id = Auth::user()->id;
        $user = JobSeeker::find($id);
         $cities = City::where('status', 'active')
                ->orderBy('id', 'asc')
                ->pluck('name', 'id')
                ->prepend('Select Job Location', "");
        return view('job_seekers.profile', compact('cities', 'user'));
    }

    public function validate_profile_form(Request $request) {
        $rules = [
            'name' => 'required',
            'email' => 'required|email|max:50|unique:users,email',
            'mobile_number' => 'required|max:10|regex:"^[0-9\s]"|unique:users,mobile_number',
            'notice_period' => 'required|max:3|regex:"^[0-9\s]"',
            'skills' => 'required',
            'experience_from' => 'required',
            'experience_to' => 'required|gt:experience_from',
            'job_location' => 'required',
            
        ];
        $messages = array();
    
        $validator = Validator::make($request->all(), $rules, $messages);

        if($validator->fails()) {
            return response()->json(['code' => 401, 'errors' => $validator->getMessageBag()->toArray()]);
        }
        return Response::json(['success' => true], 200);
    }

    public function update_profile(Request $request) {
        $validator = Validator::make($request->all(), [
               'name' => 'required',
            'email' => 'required|email|max:50|unique:users,email',
            'mobile_number' => 'required|max:10|regex:"^[0-9\s]"|unique:users,mobile_number',
            'notice_period' => 'required|max:3|regex:"^[0-9\s]"',
            'skills' => 'required',
            'experience_from' => 'required',
            'experience_to' => 'required|gt:experience_from',
            'job_location' => 'required',
           
        ]);
            
        if ($validator->fails()) {
            return redirect('admin')->withErrors($validator)->withInput();
        }

        $id = Auth::user()->id;
        $data = $request->all();
        $data['skills'] = (isset($request->skills) && count($request->skills) > 0) ? implode(',', $request->skills) : NULL;
        $data['experience'] = (int)$data['experience_to'] - (int)$data['experience_from'];
        $data['city'] = $data['job_location'];
        $job_seeker = JobSeeker::find($id)->update($data);
         if($job_seeker == true) {
            if($request->hasfile('resume')) {
               $destinationPath = 'resumes';
               $file_name = time().'_'.$request->resume->getClientOriginalName();
               $request->resume->move(public_path($destinationPath), $file_name);
               JobSeeker::find($id)->update(['resume_url' => $file_name]);
            }
            if($request->hasfile('photo')) {
               $destinationPath = 'photos';
               $photo_name = time().'_'.$request->photo->getClientOriginalName();
               $request->photo->move(public_path($destinationPath), $photo_name);
               JobSeeker::find($id)->update(['photo_url' => $photo_name]);
            }
        }
         return redirect('job_seekers/profile')->with('flash_message', 'Profile Updated SuccssFully...!');
    }
}
