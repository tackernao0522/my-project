@extends('layouts.app_only_content')

@section('title')
会員登録
@endsection

@section('content')
<div class="main">
  <!-- Google Sign up form -->
  <section class="signup">
    <div class="container">
      <div class="signup-content">
        <div class="signup-form">
          <h2 class="form-title">ユーザー登録</h2>
          @include('error_card_list')
          <form method="POST" action="{{ route('register.{provider}', ['provider' => $provider]) }}" class="register-form" id="register-form">
            @csrf
            <input type="hidden" name="token" value="{{ $token }}">
            <div class="form-group">
              <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
              <input type="text" name="name" id="name" placeholder="Your Name（変更不可）" required />
            </div>
            <div class="form-group">
              <label for="email"><i class="zmdi zmdi-email"></i></label>
              <input type="email" name="email" id="email" placeholder="Your Email" required value="{{ $email }}" disabled />
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
          <figure><a href="/"><img src="../images/signup-image.jpg" alt="sing up image"></a></figure>
        </div>
      </div>
    </div>
  </section>
</div>
@endsection
