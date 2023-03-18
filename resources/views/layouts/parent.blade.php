<!doctype html>
<html lang="ja">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link href="https://fonts.googleapis.com/earlyaccess/nicomoji.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kaisei+Opti&display=swap" rel="stylesheet">
    
    <!-- fontAwsome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">

    <title>@yield('title', 'home')</title>
  </head>

<body>
    @section('header')
      <div class="header">
        <img src="{{ asset('images/header.png') }}" alt="">

      <!-- ハンバーガー -->
      <button class="header_nav-btn js-nav-open-btn">
        <span class="header_nav-span"></span>
        <span class="header_nav-span"></span>
        <span class="header_nav-span"></span>
      </button>

      </div>

      @if (Route::has('login'))
        <div class="p_top-nuv-container js-menu-container">
          
          <div class="p_top-nuv-close">
            <button class="p_top-nuv-close-btn js-nuv-close-btn">
              <i class="fa-solid fa-xmark"></i>
            </button>
          </div>

          <li class="p_top-nuv-list"><a href="/" class="p_top-nuv-link">TOP</a></li>
          <li class="p_top-nuv-list"><a href="{{ route('index') }}" class="p_top-nuv-link">クイズをプレイ</a></li>
          @auth
              <li class="p_top-nuv-list"><a href="{{ route('mypage') }}" class="p_top-nuv-link">マイページ</a></li>
              <li class="p_top-nuv-list"><a href="{{ route('new') }}" class="p_top-nuv-link">クイズ作成</a></li>
              <li class="p_top-nuv-list"><a href="{{ route('prof', Auth::id() ) }}" class="p_top-nuv-link">プロフィール編集</a></li>
              <li class="p_top-nuv-list"><a href="{{ route('logout') }}" class="p_top-nuv-link">ログアウト</a></li>
          @else
              <li class="p_top-nuv-list"> <a href="{{ route('login') }}" class="p_top-nuv-link">{{ __('Login') }}</a></li>
              @if (Route::has('register'))
                <li class="p_top-nuv-list u_margin-bottom-menu"><a href="{{ route('register') }}" class="p_top-nuv-link">{{ __('Register') }}</a></li>
              @endif
          @endauth
        </div>

        @endif

    @show

    <!-- フラッシュメッセージ -->
    @if (session('flash_message'))
      <div class="alert alert-primary text-center" role="alert">
        {{ session('flash_message') }}
      </div>
    @endif


     <div class="main">
        @yield('main')
     </div>

    @section('footer')
      <div class="footer">
        <p>Copyright ©️ DO-ON. All Right Reserved.</p>
      </div>
    @show

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="{{ mix('js/menu.js') }}"></script>
</body>
</html>

