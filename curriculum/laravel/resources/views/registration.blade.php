@extends('layouts.app')
@section('content')
    <div class="w-layout-blockcontainer container-32 w-container">
        <h1 class="heading-20">■登録内容</h1>
        <div class="w-form">
            <form action="{{ route('attention') }}" method="post">
                @csrf
                <label>ユーザー名</label>
                <input class="w-input" maxlength="256" name="name" id="name" value="{{ old('name') }}">
                @if ($errors->any())
                    <ul>
                        @if ($errors->has('name'))
                            <p id='vali_name' class="text-danger" style="color:red">{{ $errors->first('name') }}</p>
                        @endif
                    </ul>
                @endif
                <label>メールアドレス</label>
                <input class="w-input" maxlength="256" name="email" id="email" value="{{ old('email') }}">
                @if ($errors->any())
                    <ul>
                        @if ($errors->has('email'))
                            <p id='vali_email' class="text-danger" style="color:red">{{ $errors->first('email') }}</p>
                        @endif
                    </ul>
                @endif

                <label>電話番号</label>
                <input class="w-input" maxlength="256" name="tel" id="tel" value="{{ old('tel') }}">
                @if ($errors->any())
                    <ul>
                        @if ($errors->has('tel'))
                            <p id='vali_tel' class="text-danger" style="color:red">{{ $errors->first('tel') }}</p>
                        @endif
                    </ul>
                @endif

                <label>郵便番号</label>
                <input class="w-input" maxlength="256" name="post" id="post" value="{{ old('post') }}">
                @if ($errors->any())
                    <ul>
                        @if ($errors->has('post'))
                            <p id='vali_post' class="text-danger" style="color:red">{{ $errors->first('post') }}</p>
                        @endif
                    </ul>
                @endif

                <label>住所</label>
                <input class="w-input" maxlength="256" name="address" id="address" value="{{ old('address') }}">
                @if ($errors->any())
                    <ul>
                        @if ($errors->has('address'))
                            <p id='vali_address' class="text-danger" style="color:red">{{ $errors->first('address') }}</p>
                        @endif
                    </ul>
                @endif

                <label>パスワード</label>
                <input class="w-input" maxlength="256" name="password" id="password" value="{{ old('password') }}">
                @if ($errors->any())
                    <ul>
                        @if ($errors->has('password'))
                            <p id='vali_password' class="text-danger" style="color:red">{{ $errors->first('password') }}
                            </p>
                        @endif
                    </ul>
                @endif

                <label>パスワード確認</label>
                <input class="w-input" maxlength="256" name="password_confirm" id="password_confirm"
                    value="{{ old('password_confirm') }}">
                @if ($errors->any())
                    <ul>
                        @if ($errors->has('password_confirm'))
                            <p id='vali_password_confirm' class="text-danger" style="color:red">
                                {{ $errors->first('password_confirm') }}</p>
                        @endif
                    </ul>
                @endif
                <div class="div-block-4">
                    <a href="/" class="button-8 w-button">戻る</a>
                    <input type="submit" class="submit-button-3 w-button" value="登録">
                </div>
            </form>
        </div>
    </div>
@endsection
