<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class InformationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('vendor.registration.create');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data ['vendor'] = User::where('role_as','=', 'vendor')->orderBy('id','DESC')->find($id);

        return view('vendor.registration.edit' ,$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (auth()->user()->demo_id == 1) {
            session()->flash('error', 'Demo account are not change anything! thanks');
            return redirect()->route('registration.index');
        }
        else
        {
            $request->validate([
                'name' => 'required',
                'email' => 'required|unique:users,email,'.$id,
                'mobile' => 'required|unique:users,mobile,'.$id,
                'password' => 'confirmed',
                'status' => 'required'
            ]);

            $user = User::findOrFail($id);

            $user->name = $request->name;
            $user->email = $request->email;
            $user->mobile = $request->phone;
            if ($request->has('password') && $request->password != null ){

                $user->password = Hash::make($request->password);
            }

            $user->status = $request->status;
            $user->save();
            return redirect()->route('registration.index');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (auth()->user()->demo_id == 1) {
            session()->flash('error', 'Demo account are not change anything! thanks');
            return redirect()->route('registration.index');
        }
        else
        {
            User::destroy($id);
            return redirect()->route('registration.index');
        }
    }
}
