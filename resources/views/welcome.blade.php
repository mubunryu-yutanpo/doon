@extends('layouts.parent')

@section('title', 'DO-ON')
    
    <!-- header -->
    @section('header')
      @parent
    @endsection

    <!-- main -->
    @section('main')
      <div class="p_img-container">
         <img src="{{ asset('images/main.png') }}" alt="" class="p_img-container-image">
      </div>

      <!-- about -->
      <div class="main_about-wrap u_bg2">
        
        <div class="c_content-card">
          <h3 class="c_content-card-title bg-1">どうおんとは？</h3>
          <div class="c_content-card-about">
            <p>「どうおん」は同じ音でちがう意味をもつ「同音異義語」をテーマにしてクイズを作成・解くことができるアプリです。</p>
            <p>会員登録・プレイなど全て無料でご利用可能です。</p>
            <p>※クイズの作成には会員登録が必要です</p>
          </div>
        </div>

        <div class="c_content-card">
          <h3 class="c_content-card-title bg-1">どんな人ができる？</h3>
          <div class="c_content-card-about">
            <p>「どうおん」は小学校低学年から習いはじめる漢字の練習として利用していただく予定で作っています。</p>
            <p>同音異義語をテーマにしていますが、自由にクイズを作って楽しむことも可能です。</p>
            <p>小学生はもちろん、オトナの方もクイズの作成・プレイを楽しんでいただければ幸いです。</p>
          </div>

        </div>
      </div>

      <div class="p_welcome-container">
        <img src="{{ asset('images/main_footer.png') }}" alt="" class="p_welcome-bgimage">
       
        <div class="p_welcome-content">
          <h3 class="p_welcome-content-title">クイズをプレイしよう!</h3>
          <a href="{{ route('index') }}" class="p_welcome-content-start">
            <button class="p_welcome-content-start-btn" style="white-space:nowrap;">
              どうおんをはじめる
            </button>
          </a>

          <div class="p_welcome-content-about">
            <a href="/register" class="p_welcome-content-about-link">
            <i class="fa-solid fa-pen-nib"></i>
              クイズ作成はコチラから
            </a>
          </div>
        </div>

      </div>
    @endsection

    <!-- footer -->
    @section('footer')
      @parent
    @endsection


