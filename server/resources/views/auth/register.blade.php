@extends('layouts.app_only_content')

@section('title')
会員登録
@endsection

@section('content')
<div class="main">
    <!-- Sign up form -->
    <section class="signup">
        <div class="container">
            <div class="signup-content">
                <div class="signup-form">
                    <h2 class="form-title">ユーザー登録</h2>
                    @include('error_card_list')
                    <form method="POST" action="{{ route('register') }}" class="register-form" id="register-form">
                        @csrf
                        <div class="form-group">
                            <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                            <input type="text" name="name" id="name" placeholder="Your Name" required value="{{ old('name') }}" />
                        </div>
                        <div class="form-group">
                            <label for="email"><i class="zmdi zmdi-email"></i></label>
                            <input type="email" name="email" id="email" placeholder="Your Email" required value="{{ old('email') }}" />
                        </div>
                        <div class="form-group">
                            <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                            <input type="password" name="password" id="password" placeholder="Password" requried />
                        </div>
                        <div class="form-group">
                            <label for="password"><i class="zmdi zmdi-lock-outline"></i></label>
                            <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Repeat your password" required />
                        </div>
                        <div class="form-group">
                            <input type="checkbox" name="agree-term" id="agree-term" class="agree-term" value="1" />
                            <label for="agree-term" class="label-agree-term"><span><span></span></span>プライバシーポリシーを確認し、<a href="#" class="term-service">同意しました。</a></label>
                        </div>
                        <div class="form-group form-button">
                            <input type="submit" name="signup" id="signup" class="form-submit" value="ユーザー登録" />
                        </div>
                    </form>
                </div>
                <div class="signup-image">
                    <figure><a href="/"><img src="images/signup-image.jpg" alt="sing up image"></a></figure>
                    <a href="{{ route('login') }}" class="signup-image-link">アカウントをお持ちの方は</a>
                    <div class="social-login" style="margin-top: 10px;">
                        <span class="social-label">Or signin with</span>
                        <ul class="socials">
                            <li><a href="#"><i class="display-flex-center zmdi zmdi-facebook"></i></a></li>
                            <li><a href="#"><i class="display-flex-center zmdi zmdi-twitter"></i></a></li>
                            <li><a href="{{ route('login.{provider}', ['provider' => 'google']) }}"><i class="display-flex-center zmdi zmdi-google"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection