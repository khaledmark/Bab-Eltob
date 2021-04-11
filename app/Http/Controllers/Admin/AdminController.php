<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\AdminRequest;
use App\User;
use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use Illuminate\Support\Facades\Input;
use Hash;

class AdminController extends Controller
{
    public function index()
    {
        $data = User::where('user_type', 'admin')->get();

        return view('admin.admins.index', compact('data'));
    }

    public function create()
    {
        return view('admin.admins.create');
    }

    public function store(AdminRequest $request)
    {
        // if ( isset($request->photo) && $request->photo )
        //     $request['image'] = UploadImage($request->file('photo'), 'users', '/uploads/users');

        // $request['user_type'] = 'admin';
        // $request['country_id'] = 1;
        // $request['city_id'] = 1;

        $user = User::create([
            'user_type' => 'admin' ,
            'country_id' => 1 ,
            'city_id' => 1 ,
            'username' => $request->username ,
            'email' => $request->email ,
            'phone' => $request->phone ,
            'password' => $request->password ,
            'password_confirm' => $request->password_confirm ,
        ]);

        return $user ?
            redirect()->route('admins.index')->with('success', trans('messages.addAdminOk2')) :
            redirect()->route('admins.create')->with('warning', trans('messages.addAdminNo'));
    }

    public function edit(User $admin)
    {
        if($admin->id != 1)
        {
            return view('admin.admins.edit', compact('admin'));
        }
        abort('403');
    }

    public function update(AdminRequest $request, User $admin)
    {
        $updated = $admin->update($request->all());

        return $updated ?
            redirect()->route('admins.index')->with('success', trans('messages.updateTrue')) :
            redirect()->back()->with('warning', trans('messages.updateFalse'));
    }

    public function editprofile(User $admin)
    {
        return view('admin.admins.editProfile', compact('admin'));
        
    }

    public function updateProfile(Request $request, User $admin)
    {

        $rules = [
            'username' => 'required|max:191',
            'email' => 'required|email|max:191|unique:users,email,'. $admin->id,
            'phone' => 'max:191|unique:users,phone,'.$admin->id,
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $updated = $admin->update($request->all());

        return $updated ?
            redirect()->back()->with('success', trans('messages.updateTrue')) :
            redirect()->back()->with('warning', trans('messages.updateFalse'));
    }


    public function editPassword(User $admin)
    {
        return view('admin.admins.editPassword', compact('admin'));
    }

    public function changePassword(Request $request)
    {
        $rules = [
            'current_password' => 'required|max:191',
            'new_password' => 'required|max:191',
            'password_confirmation' => 'required|same:new_password',
        ];

       
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        if (!(Hash::check($request->current_password, Auth::user()->password)))
            return redirect()->back()->with('warning', 'خطا فى كلمة المرور الحالية '); 

        if( strcmp($request->current_password, $request->new_password) == 0 )
            return redirect()->back()->with('warning', 'كلمة المرور الحالية مطابقة لكلمة المرور الجديدة ');

        $updated = Auth::user()->update(['password' => $request->new_password]);

        return $updated ?
            redirect()->back()->with('success', trans('messages.updateTrue')) :
            redirect()->back()->with('warning', trans('messages.updateFalse'));
    }
}
