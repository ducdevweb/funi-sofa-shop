<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
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
    public function index(Request $request)
    {
        $filter = $request->input('filter');
        $query = DB::table('users');
        switch ($filter) {
            case 'new_users':
                $users = $query->where('role', '!=', 0)
                    ->whereMonth('created_at', '=', Carbon::now());
                break;
            case 'blocked_users':
                $users = $query->where('role', '!=', 0)
                    ->where('status', '=', 1);
                break;
            case 'search':
                $users = $query->where('role', '!=', 0)
                    ->where('name', 'like', '%' . $request->input('search') . '%');
                break;
            case 'role':
                if (!empty($request->input('role'))) {
                    $users = $query->where('role', '!=', 0)
                        ->where('role', '=', $request->input('role'));
                } else {
                    $users = $query->where('role', '!=', 0);
                }
                break;
            case 'all_users':
            default:
                $users = $query->where('role', '!=', 0)
                    ->orderByDesc('created_at');
                break;
        }
        return response()->json($users->get());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'first_email' => [
                'required',
                'string',
                'regex:/^[^@]+$/',
                'unique:users,first_email',
            ],
            'phone' => [
                'required',
                'string',
                'max:15',
                'unique:users,phone',
            ],
            'address' => 'required|string|max:255',
            'hinh' => 'nullable|image|max:2048',
        ], [
            'first_email.unique' => 'Tên email đã tồn tại. Vui lòng chọn tên khác.',
            'phone.unique' => 'Số điện thoại đã tồn tại. Vui lòng chọn số khác.',
            'first_email.regex' => 'Tên email không được chứa ký tự "@".',
        ]);

        $user = new User();
        $user->name = $request->input('name');
        $user->first_email = $request->input('first_email');
        $user->email = $request->input('first_email') . '@gmail.com';

        $user->password = Hash::make($request->input('password'));
        $user->address = $request->input('address');
        $user->role = $request->input('role');
        $user->phone = $request->input('phone');
        $user->email_verified_at = Carbon::now();
        $user->status = $request->input('status');

        if ($request->hasFile('hinh')) {
            $file = $request->file('hinh');
            $imagePath = $file->store('user_img', 'public'); 
            $user->image =  env('APP_URL').'/storage/' . $imagePath;
        } else {
            return response()->json(['message' => 'Vui lòng tải ảnh lên'], 400);
        }
        
        $user->save();
        
        return response()->json([
            'message' => 'Thêm người dùng mới thành công',
            'user' => $user,
        ]);
    
}
    public function show(string $id)
    {
       $user=DB::table('users')->where('id',$id)->first();
       return response()->json($user);
    }
    
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id_user)
    {
        $sua = User::find($id_user);
        if (!$sua) {
            return response()->json(['message' => 'Người dùng không tồn tại'], 404);
        }

        $sua->name = $request->input('name');
        $sua->address = $request->input('address');
        $sua->role = $request->input('role');
        $sua->status = $request->input('status');
        

        if ($request->hasFile('hinh')) {
            $file = $request->file('hinh');
            $imagePath = $file->store('user_img', 'public'); 
            $sua->image = env('APP_URL').'/storage/' . $imagePath;
        }
             else {
            $sua->image = $request->input('hinhcu');
        }
        
        $sua->save();
        
        
        $sua->password = Hash::make($request->input('password'));
        $sua->save();
        return response()->json(['message' => 'Cập nhật người dùng thành công', 'user' => $sua]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, string $id)
    {
        $xoa_user = User::where('id', $id)->exists();
        if ($xoa_user == false) {

            return response()->json(['message' => 'Người dùng không tồn tại'], 404);
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

        User::where('id', $id)->delete();
        return response()->json(['message' => 'Đã xóa người dùng']);
    }
}
