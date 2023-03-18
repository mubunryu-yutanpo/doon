@extends('layouts.parent')

@section('title', 'DO-ONクイズ一覧')

@section('header')

<!-- index　ログインしてなくても見れる問題集一覧ページ -->
@section('main')

  <div class="c_content-title">
    <p class="c_content-title-text">
      <i class="fa-solid fa-book"></i>
      クイズ一覧
    </p>
  </div>

  <div class="c_content-container">
    <!-- for文で作った問題集を表示する -->
    @foreach($drills as $drill)
    <div class="c_content-card">
        <!-- title -->
        <p class="c_content-card-title bg-1">『 {{ $drill->title }} 』</p>
        
        <div class="c_content-card-wrap">
          <a href="{{ route('play', $drill->id) }}" class="c_content-card-link">このクイズをプレイ！</a>
        </div>
    </div>
    @endforeach
  </div>

  <!-- ページネーション -->
  <div class="pagination">
    {{ $drills->links() }}
  </div>
@endsection

@section('footer')
