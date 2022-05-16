<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    public function changePassword(Request $request) {
        if (!(Hash::check($request->current_password, Auth::user()->password))) {

            // The passwords matches
            return redirect()->back()->with(["error"=>" كلمة المرور لا تتطابق مع كلمة المروو الخاصه بك"]);
        }

        if(strcmp($request->current_password , $request->new_password) == 0){

            // Current password and new password same
            return redirect()->back()->with(["error"=>" كلمة المرور الجديده لا يمكن تساوي   كلمة الحاليه"]);
        }

        //Change Password
        $user = Auth::user();
        $user->password = bcrypt($request->new_password);
        $user->save();

        return redirect()->back()->with(["error"=>" تم تغيير كلمة السر بنجاح"]);
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $user = User::findOrFail($id);
            if ($user->image !== '') { // check if user has image
                // remove image
                // Storage::disk('users')->delete($user->image);
                $fileName=public_path('assets/images/users/'.$photo);
                unlink(realpath($fileName));
            }

            $user->delete();
            return redirect()->route('user.home');
        } catch (\Exception $e) {
            //throw $th;
        }
    }

    // get all orders for user auth
    public function orders()
    {
        try {

            $user = User::with('pharmacy')->find(Auth::id());

            // if user is pharmacy
            if($user->type == 2){

                $orders = Order::where('pharmacy_id',$user->pharmacy->id)->get();

            // if user is admin
            }else if($user->type == 1){
                $order = Order::all();

            }else{

             // if user is normal user
                $orders = Order::where('user_id',Auth::id())->get();
            }

            if ($orders) {

                return $orders;
            } else {
                // return view('order.list');
            }
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
    public function order($id)
    {
        try {

            $order = Order::find($id);

            if ($order) {
                return redirect()->back();
            } else {
                return view('order.list');
            }
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}
