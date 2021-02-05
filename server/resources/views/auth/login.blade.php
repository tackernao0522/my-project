@extends('layouts.app_only_content')

@section('title')
ログイン
@endsection

@section('content')
<div class="main">
    <!-- Sing in  Form -->
    <section class="sign-in">
        <div class="container">
            <div class="signin-content">
                <div class="signin-image">
                    <figure><a href="{{ route('top') }}"><img src="images/signin-image.jpg" alt="sing up image" </a></figure>
                    <a href="{{ route('register') }}" class="signup-image-link">ユーザー登録はこちら</a>
                </div>

                <div class="signin-form">
                    <h2 class="form-title">ログイン</h2>
                    @include('error_card_list')
                    <form method="POST" action="{{ route('login') }}" class="register-form" id="login-form">
                        @csrf
                        <div class="form-group">
                            <label for="email"><i class="zmdi zmdi-email"></i></label>
                            <input type="email" name="email" id="email" placeholder="Your Email" required value="{{ old('email') }}">
                        </div>
                        <div class="form-group">
                            <label for="your_pass"><i class="zmdi zmdi-lock"></i></label>
                            <input type="password" name="password" id="password" placeholder="Password" required>
                        </div>
                        <div class="mt-1">
                            パスワードをお忘れの方は<a href="{{ route('password.request') }}">こちら</a>
                        </div>
                        <div class="form-group">
                            <input type="checkbox" name="remember-me" id="remember-me" class="agree-term" {{ old('remember') ? 'checked' : '' }}>
                            <label for="remember-me" class="label-agree-term"><span><span></span></span>ログイン状態を保存する</label>
                        </div>
                        <div class="form-group form-button">
                            <input type="submit" name="signin" id="signin" class="form-submit" value="ログイン" />
                        </div>
                    </form>
                    <div class="social-login">
                        <span class="social-label">Or login with</span>
                        <ul class="socials">
                            <li><a href="#"><i class="display-flex-center zmdi zmdi-facebook"></i></a></li>
                            <li><a href="#"><i class="display-flex-center zmdi zmdi-twitter"></i></a></li>
                            <li><a href="#"><i class="display-flex-center zmdi zmdi-google"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection