<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Validator;
use App\Models\City;
use App\User;
use App\Models\JobSeeker;
use Auth;
use Response;
use Illuminate\Http\Request;
use App\Models\File;
use Hash;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function guard() {
        return Auth::guard('job_seeker');
    }
    function validate_login_form(Request $request) {
        $rules = [
            'user_name' => 'required',
            'password' => 'required|max:15',
        ];
        $validator = Validator::make($request->all(), $rules);

        if($validator->fails()) {
            return response()->json(['code' => 401, 'errors' => $validator->getMessageBag()->toArray()]);
        }
        return Response::json(['success' => true], 200);
    }

    public function update_admin_login(Request $request) {
        $validator = Validator::make($request->all(), [
            'user_name' => 'required',
            'password' => 'required|max:15|min:6',
        ]);
        
        if ($validator->fails()) {
            return redirect('admin')->withErrors($validator)->withInput();
        }

        $user = User::where('user_name', $request->user_name)
                        ->where('status', 'active')
                        ->first();

        if(!empty($user)) {
            $password = (isset($user->password) && !empty($user->password)) ? $user->password : '';
            if (!Hash::check($request->password, $password)) {
                return redirect('admin')->with('error_message', 'Kindly Enter the valid Username / Password');
            }
            if(Auth::guard('web')->attempt(['user_name' => $request->user_name, 'password' => $request->password])) {
                 \Auth::login($user);
               
                 return redirect('admin/dashboard');
            }
           
        } else {
            return redirect('admin')->with('error_message', 'Kindly Enter the valid Username / Password');
        }
    }

    public function job_seekers_login() {
        return view('auth.job_seekers_login');
    }
    public function job_seekers_register() {
        $cities = City::where('status', 'active')
                ->orderBy('id', 'asc')
                ->pluck('name', 'id')
                ->prepend('Select Job Location', "");
        return view('auth.job_seekers_register', compact('cities'));
    }

     public function validate_registration_form(Request $request) {
        $rules = [
            'name' => 'required',
            'email' => 'required|email|max:50|unique:users,email',
            'mobile_number' => 'required|max:10|regex:"^[0-9\s]"|unique:users,mobile_number',
            'password' => 'required|max:15|min:6|required_with:password_confirmation|same:password_confirmation',
            'password_confirmation' => 'required|max:15|min:6',
            'notice_period' => 'required|max:3|regex:"^[0-9\s]"',
            'skills' => 'required',
            'experience_from' => 'required',
            'experience_to' => 'required|gt:experience_from',
            'job_location' => 'required',
            'resume' => 'required',
            'photo' => 'required|image',
        ];

        $validator = Validator::make($request->all(), $rules);

        if($validator->fails()) {
            return response()->json(['code' => 401, 'errors' => $validator->getMessageBag()->toArray()]);
        }
        return Response::json(['success' => true], 200);
    }

    public function upate_registration(Request $request) {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|max:50|unique:users,email',
            'mobile_number' => 'required|max:10|regex:"^[0-9\s]"|unique:users,mobile_number',
            'password' => 'required|max:15|min:6|required_with:password_confirmation|same:password_confirmation',
            'password_confirmation' => 'required|max:15|min:6',
            'notice_period' => 'required|max:3|regex:"^[0-9\s]"',
            'skills' => 'required',
            'experience_from' => 'required',
            'experience_to' => 'required|gt:experience_from',
            'job_location' => 'required',
            'resume' => 'required',
            'photo' => 'required|image',
        ]);
        
        if ($validator->fails()) {
            return redirect('post/create')->withErrors($validator)->withInput();
        }

        $data = $request->all();
        $data['skills'] = (isset($request->skills) && count($request->skills) > 0) ? implode(',', $request->skills) : NULL;
        $data['experience'] = (int)$data['experience_to'] - (int)$data['experience_from'];
        $data['password'] = Hash::make($data['password']);
        $data['city'] = $data['job_location'];
        $job_seeker = JobSeeker::create($data);
        if($job_seeker == true && !empty($request->file('resume')) && !empty($request->file('photo'))) {
            if($request->hasfile('resume')) {
               $destinationPath = 'resumes';
               $file_name = time().'_'.$request->resume->getClientOriginalName();
               $request->resume->move(public_path($destinationPath), $file_name);
               JobSeeker::find($job_seeker->id)->update(['resume_url' => $file_name]);
            }
            if($request->hasfile('photo')) {
               $destinationPath = 'photos';
               $photo_name = time().'_'.$request->photo->getClientOriginalName();
               $request->photo->move(public_path($destinationPath), $photo_name);
               JobSeeker::find($job_seeker->id)->update(['photo_url' => $photo_name]);
            }
        }

        return redirect('job_seekers/login')->with('flash_message', 'Registration Successfull...!');
    }

    public function update_login(Request $request) {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|max:50|unique:users,email',
            'password' => 'required|max:15|min:6',
        ]);
        
        if ($validator->fails()) {
            return redirect('post/create')->withErrors($validator)->withInput();
        }

        $job_seeker = JobSeeker::where('email', $request->email)
                        ->where('status', 'active')
                        ->first();

        if(!empty($job_seeker)) {
            $password = (isset($job_seeker->password) && !empty($job_seeker->password)) ? $job_seeker->password : '';
            if (!Hash::check($request->password, $password)) {
                return redirect('job_seekers/login')->with('error_message', 'Kindly Enter the valid Email / Password');
            }
            if(Auth::guard('job_seeker')->attempt(['email' => $request->email, 'password' => $request->password])) {
                 return redirect('job_seekers/dashboard');
            }
           
        } else {
            return redirect('job_seekers/login')->with('error_message', 'Kindly Enter the valid Email / Password');
        }
    }

    function validate_job_login_form(Request $request) {
        $rules = [
            'email' => 'required|email',
            'password' => 'required|max:15',
        ];
        $validator = Validator::make($request->all(), $rules);

        if($validator->fails()) {
            return response()->json(['code' => 401, 'errors' => $validator->getMessageBag()->toArray()]);
        }
        return Response::json(['success' => true], 200);
    }
}
