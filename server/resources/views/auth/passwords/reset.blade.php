@extends('layouts.app_only_content')

@section('title')
パスワード再設定
@endsection

@section('content')
<div class="main">
    <!-- Sing in  Form -->
    <section class="sign-in">
        <div class="container">
            <div class="signin-content">
                <div class="signin-image">
                    <figure><a href="{{ route('top') }}"><img src="/images/signin-image.jpg" alt="sing up image"></a></figure>
                </div>

                <div class="new-password" style="padding-top: 70px;">
                    <h4 class="form-title">新しいパスワードを設定</h4>

                    @include('error_card_list')

                    <form method="POST" action="{{ route('password.update') }}" class="register-form" id="login-form">
                        @csrf

                        <input type="hidden" name="email" value="{{ $email }}">
                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="form-group">
                            <label for="your_pass"><i class="zmdi zmdi-lock"></i></label>
                            <input type="password" name="password" id="password" placeholder="New Password" required>
                        </div>
                        <div class="form-group">
                            <label for="password"><i class="zmdi zmdi-lock-outline"></i></label>
                            <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Repeat your new password" required />
                        </div>
                        <div class="form-group form-button">
                            <input type="submit" name="signin" id="signin" class="form-submit" value="送信">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection