<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

use Illuminate\Support\Facades\Hash;


class UsersController extends Controller
{
   
    public function login(Request $request)
    {
        //登入
        $request->validate([
            'name' => 'required|string|max:255',         
            'email' => 'required|string|email|max:255|unique:users',           
            'password' => 'required|string|min:8|confirmed',       
        ]);

    }
    
    public function register(Request $request)
    {
        //註冊
        // 驗證請求數據
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:4|confirmed',
        ], [
            'name.required' => '姓名為必填項目，請輸入您的姓名。',
            'name.string' => '姓名必須是有效的字串。',
            'name.max' => '姓名不能超過 255 個字元。',
            
            'email.required' => '電子郵件為必填項目，請輸入有效的電子郵件地址。',
            'email.email' => '電子郵件格式不正確。',
            'email.max' => '電子郵件不能超過 255 個字元。',
            'email.unique' => '此電子郵件已經被註冊。',
            
            'password.required' => '密碼為必填項目，請輸入您的密碼。',
            'password.min' => '密碼長度必須至少為 4 個字元。',
            'password.confirmed' => '兩次密碼輸入不一致，請重新確認密碼。',
        ]);

        // 建立新使用者
        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' =>  Hash::make($validatedData['password']), // 將密碼加密存儲
        ]);

        // 自動登入使用者
        auth()->login($user);

        // 導向至首頁或其他頁面
        return redirect()->route('list')->with('success', '註冊成功，歡迎選購！');
    }

    public function singin(Request $request)
    {
        // 登入 
        // 驗證請求數據
        //  dd($request->email);

        $validatedData = $request->validate([          
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:4',
        ], [
            'email.required' => '電子郵件為必填項目，請輸入有效的電子郵件地址。',
            'email.email' => '電子郵件格式不正確。',
            'email.max' => '電子郵件不能超過 255 個字元。',            
            'password.required' => '密碼為必填項目，請輸入您的密碼。',
            'password.min' => '密碼長度必須至少為 4 個字元。',          
        ]);


       
        

        // 查詢該電子郵件是否存在
        $user = User::where('email', $validatedData['email'])->first();
        // dd($user, $validatedData['password'], $user->password);
       
        if ($user && Hash::check($validatedData['password'], $user->password)) {
            // 密碼比對成功，登入該用戶
            auth()->login($user);
            return redirect()->route('list'); 
        } else {
            // 密碼或帳號錯誤
            return back()->withErrors(['email' => '帳號或密碼錯誤']);
        }

       
       
    }
    public function singout()
    {
        //登出
        auth()->logout();
    
       
        return redirect('/');
    }

}
