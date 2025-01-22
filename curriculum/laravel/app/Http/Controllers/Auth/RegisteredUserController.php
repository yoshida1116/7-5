<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(Request $request): View
    {
        return view('registrationconfirm',[
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'tel' => $request->input('tel'),
            'post' => $request->input('post'),
            'address' => $request->input('address'),
            'password' => $request->input('password'),
        ]);
    }

    public function attention (Request $request)
    {
        $validatedData=$request->validate([
            'name' => 'required|max:255|regex:/^[ぁ-んァ-ヶ一-龥々ー]+$/u',
            'email' => 'required|regex:/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/',
            'tel' => 'required|regex:/^\d{1,11}$/',
            'post' => 'required',
            'address' => 'required',
            'password' => 'required','confirmed',
            'password_confirm' => 'required|same:password',
        ],[
            'name.required' => '氏名は必須です。',
            'name.max' => '氏名は255文字以内で入力してください。',
            'name.regex' => '氏名はひらがな、カタカナ、漢字のみ使用可能です。',
            'email.required' => 'メールアドレスは必須です。',
            'email.regex' => '正しいメール形式で入力してください。',
            'tel.required' => '電話番号は必須です。',
            'tel.regex' => '電話番号は1〜11桁の半角数字のみ入力可能です。',
            'post.required' => '郵便番号は必須です。',
            'address.required' =>  '住所は必須です。',
            'password.required' => 'パスワードは必須です。',
            'password.confirmed' => '確認用パスワードが一致しません。',
            'password_confirm.required' => 'パスワード（確認用）は必須です。',
            'password_confirm.same:password' => '確認用パスワードが一致しません。',
        ]);
        return view('registrationconfirm', compact('validatedData'));
        // return redirect()->route('registration.confirm');
    }


    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'tel' => $request->tel,
            'post' => $request->post,
            'address' => $request->address,
            'password' => Hash::make($request->password),
        ]);
        return redirect()->route('register.complete');
    }

    public function cart()
    {
        return view('cart');
    }
}
