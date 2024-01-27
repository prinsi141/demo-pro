<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Helpers\Main;
use PDF;
use Hash;

class UserController extends BaseController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = $this->User->where('id', '!=', auth()->user()->id)->paginate(2);
        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = $this->Role->get();
        return view('users.create',compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,',
            'mobile' => 'required|string|max:20',
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $hobbiesJson = implode(', ', $request->hobbies);
        
        $user = $this->User;
        $user->first_name = strtolower($request->first_name);
        $user->last_name = strtolower($request->last_name);
        $user->mobile = trim($request->mobile);
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->gender = $request->gender;
        $user->city_id = $request->city;
        $user->hobbies = $hobbiesJson;
        $user->postcode = $request->postcode;
        if ($request->hasFile('image')) {
            $filename = Main::storeMedia('users/', $request->image);
            $user->image = $filename;
        }
        $user->save();
        $user->roles()->attach($request->role_id);

        return $user;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $id = decrypt($id);
        $user = $this->User->whereId($id)->first();
        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $id = decrypt($id);
        $rules = [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'mobile' => 'required|string|max:20',
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $user = $this->User->find($id);
        $hobbiesJson = is_array($request->hobbies) ? implode(', ', $request->hobbies) : '';
        $user->first_name = strtolower($request->first_name);
        $user->last_name = strtolower($request->last_name);
        $user->mobile = trim($request->mobile);
        $user->email = $request->email;
        if ($request->hasfile('image')) {
            $profile = Main::storeMedia('users/', $request->image, $user->image);
            $user->image = $profile;
        }
        $user->gender = $request->gender;
        $user->hobbies = $hobbiesJson;
        $user->postcode = $request->postcode;
        $user->save();

        return redirect('users');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $uid = decrypt($id);
        $user = $this->User->find($uid);
        if ($user) {
            $user->delete();
            return ['status' => 'true'];
        }
    }

    public function generatePDF()
    {
        $users = $this->User->where('id', '!=', auth()->user()->id)->get();
        $pdf = PDF::loadView('users.pdf', compact('users'));
        $pdfPath = public_path('/storage/users.pdf');
        $pdf->save($pdfPath);
        $url = url('public/storage/users.pdf');

        return redirect($url);
    }

    public function getState()
    {
        $state = $this->State->pluck('name', 'id');
        return response()->json($state);
    }

    public function getCity($id)
    {
        $cities = $this->City->where('state_id', $id)->pluck('name', 'id');
        return response()->json($cities);
    }
}
