<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

Paginator::useBootstrap();
class AdminUser extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $prePage=8;
        $user_arr=User::where('role',1)->orderByDesc('id')->paginate($prePage)->withQueryString();
        return view('admin.user_ds',compact(['user_arr']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
     
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
    public function edit(Request $request ,string $id)
    {
        $user=User::where('id',$id)->first();
        if($user==null){
            $request->session()->flash('/thongbao_ad','Người dùng này không tồn tại');
            return redirect('admin.user_ds');

        }
        return view('admin.user_chinh',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::find($id); 
    
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password')); 
        $user->address = $request->input('address');
        $user->phone = $request->input('phone');
        
        if($request->hasFile('hinh')){
            $file = $request->file('hinh'); 
            $filename = time().'.'. $file->getClientOriginalExtension();
            $file->move(public_path('/assets/images'), $filename);
            $user->image = '/assets/images/'.$filename;
        } else {
            $user->image = $request->input('hinhcu');
        }
        
        $user->save();
    
        return redirect()->back();
    }
    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request,string $id)
    {
        $xoa_user = user::where('id', $id)->exists();
        if ($xoa_user == false) {
            $request->session()->flash('thongbao_ad', "Người dùng không tồn tại");
            return redirect()->route('user.index');
        }
        user::where('id', $id)->delete();
        $request->session()->flash('thongbao_ad', "Đã xóa người dùng");
        return redirect()->route('user.index');
    }
    public function block($id)
    {
        $user = User::find($id);

        if ($user) {
     
            $user->status = ($user->status == 0) ? 1 : 0;
            $user->save();
        }

        return redirect()->back();
    }
}
