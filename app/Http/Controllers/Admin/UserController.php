<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data ['vendorLists'] = User::where('role_as','=', 'vendor')->orderBy('id','DESC')->paginate(10);

        return view('admin.user.index' ,$data);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

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
        $d_id = decrypt($id);
        $data ['vendor'] = User::where('role_as','=', 'vendor')->orderBy('id','DESC')->find($d_id);

        return view('admin.user.edit' ,$data);
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
            return redirect()->route('user.index');
        }
        else
        {
            $d_id = decrypt($id);
            $request->validate([
                'name' => 'required',
                'email' => 'required|unique:users,email,'.$d_id,
                'mobile' => 'required|unique:users,mobile,'.$d_id,
                'password' => 'confirmed',
                'status' => 'required'
            ]);

            $user = User::findOrFail($d_id);

            $user->name = $request->name;
            $user->email = $request->email;
            $user->mobile = $request->phone;
            if ($request->has('password') && $request->password != null ){

                $user->password = Hash::make($request->password);
            }

            $user->status = $request->status;
            $user->save();
            session()->flash('success', 'Vendor Updated Successfully');
            return redirect()->route('user.index');
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

    }
    public function delete($id)
    {
        if (auth()->user()->demo_id == 1) {
            session()->flash('error', 'Demo account are not change anything! thanks');
            return redirect()->route('user.index');
        }
        else
        {
            $d_id = decrypt($id);
            User::destroy($d_id);
            session()->flash('success', 'Vendor Deleted Successfully');
            return redirect()->route('user.index');
        }
    }
}
