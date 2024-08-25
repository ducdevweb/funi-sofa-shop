<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }
    public function rules(): array {
        return [
            'name' => ['required','min:2', 'max:30'],
            'phone'=>['required','digits:10','regex:/^[0-9]+$/'],
            'email' => 'required|email|ends_with:@gmail.com',
            'password' => 'required|min:6|same:password_confirmation',
            'password_confirmation' => 'required|min:6'
            ];
        }
        public function messages() {
            return [
             'name.required' => 'Phải nhập họ tên nha bạn ơi',
             'name.min' => 'Nhập họ tên ít nhất 2 ký tự',
             'name.max' => 'Họ tên gì mà dài quá thế',
             'phone.required'=>'Vui lòng nhập số điện thoại',
             'phone.regex'=>'Vui lòng nhập số không nhập chữ',
             'phone.digits'=>'Số điện thoại là 10 số',
             'email.required' => 'Chưa nhập email',
             'email.email' => 'Nhập email chưa đúng',
             'email.ends_with' => 'Email phải có đuôi là gmail.com',
             'password.required' => 'Bạn chưa nhập mật khẩu',
             'password.min' => 'Mật khẩu từ 6 ký tự trở lên',
             'password.same' => 'Hai mật khẩu không giống nhau',
             'password_confirmation.required' => 'Bạn chưa nhập lại mật khẩu',
             'password_confirmation.min' => 'Mật khẩu nhập lại cùng từ 6 ký tự trở lên'
           ];
         }
    
}
