@extends('layouts.app')
@section('content')
    <form action="{{ route('register.store') }}" method="post">
        @csrf
        <div class="w-layout-blockcontainer w-container">
            <h1>■登録情報確認</h1>
            <div class="w-layout-blockcontainer w-container">
                <h2 class="heading-22">●ユーザー名</h2>
                <div class="text-block-9" name="name">{{ $validatedData['name'] }}</div>
                <input name="name" type="hidden" value="{{ $validatedData['name'] }}">
            </div>
            <div class="w-layout-blockcontainer w-container">
                <h2 class="heading-22">●メールアドレス</h2>
                <div class="text-block-9" name="email">{{ $validatedData['email'] }}</div>
                <input name="email" type="hidden" value="{{ $validatedData['email'] }}">
            </div>
            <div class="w-layout-blockcontainer w-container">
                <h2 class="heading-22">●電話番号</h2>
                <div class="text-block-9" name="tel">{{ $validatedData['tel'] }}</div>
                <input name="tel" type="hidden" value="{{ $validatedData['tel'] }}">
            </div>
            <div class="w-layout-blockcontainer w-container">
                <h2 class="heading-22">●郵便番号</h2>
                <div class="text-block-9" name="post">{{ $validatedData['post'] }}</div>
                <input name="post" type="hidden" value="{{ $validatedData['post'] }}">
            </div>
            <div class="w-layout-blockcontainer w-container">
                <h2 class="heading-22">●住所</h2>
                <div class="text-block-9" name="address">{{ $validatedData['address'] }}</div>
                <input name="address" type="hidden" value="{{ $validatedData['address'] }}">
            </div>
            <div class="w-layout-blockcontainer w-container">
                <h2 class="heading-22">●パスワード</h2>
                <div class="text-block-9" name="password">{{ $validatedData['password'] }}</div>
                <input name="password" type="hidden" value="{{ $validatedData['password'] }}">
            </div>
        </div>
        <div class="w-layout-blockcontainer container-29 w-container">
            <a href="registration" class="button-7 w-button">戻る</a>
            <button type="submit" class="button-6 w-button">登録</button>
        </div>
    </form>
@endsection
