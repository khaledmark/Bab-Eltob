<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\City;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;

class UserController extends Controller
{
    public function index()
    {
        $data = User::where('user_type', 'user')->get();

        return view('admin.users.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cities = City::pluck('name', 'id')->toArray();
        return view('admin.users.create', compact('cities'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'phone' => 'required|max:191|unique:users',
            'username' => 'required|max:191',
            'email' => 'required|email|max:191|unique:users',
            'city_id' => 'required|exists:cities,id',
            'password' => 'required',
            'password_confirm' => 'same:password',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->route('users.create')->withErrors($validator)->withInput();
        }
        $user = User::create($request->all());

        $user->update(['api_token' => generateApiToken($user->id, 10)]);

        return $user ?
            redirect()->back()->with('success', trans('messages.updateTrue')) :
            redirect()->back()->with('warning', trans('messages.updateFalse'));
    }

    /**
     * Display the specified resource.
     *
     * @param \App\User $user
     *
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('admin.users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\User $user
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $cities = City::pluck('name', 'id')->toArray();

        return view('admin.users.edit', compact('user','cities'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\User                $user
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $rules = [
            'phone' => 'max:191|unique:users,phone,'.$user->id,
            'username' => 'required|max:191',
            'email' => 'required|email|unique:users,email,'.$user->id,
            'city_id' => 'exists:cities,id',
            'section_id' => 'exists:sections,id',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $updated = $user->update($request->all());

        return $updated ?
            redirect()->back()->with('success', trans('messages.updateTrue')) :
            redirect()->back()->with('warning', trans('messages.updateFalse'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\User $user
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    { 
        $user = User::where('id', $request->id)->delete();
        $url = route('users.index');

        return $user
            ? json_encode(['code' => '1', 'url' => $url])
            : json_encode(['code' => '0', 'message' => 'نأسف لحدوث هذا الخطأ, برجاء المحاولة لاحقًا']);
    }

    public function changeStatus(Request $request)
    {
        $user = User::find($request->user_id);

        $updated = $user->update(['status' => $request->status]);

        $url = route($request->url.'.index');

        return json_encode(['code' => $updated, 'url' => $url]);
    }

    public function changeAccountStatus(Request $request)
    {
        $user = User::find($request->user_id);

        $updated = $user->update(['account_status' => $request->account_status]);

        $url = route($request->url.'.index');

        return json_encode(['code' => $updated, 'url' => $url]);
    }

}
