@extends('layouts.parent')

@section('title', 'DO-ONクイズ一覧')

@section('header')

@section('main')


  <div class="c_content-title">
    <p class="c_content-title-text">
      <i class="fa-solid fa-book"></i>
      問題集名：「{{ $drills->title }}」のクイズ一覧
    </p>
  </div>

  <div class="c_content-container">
    <!-- for文で作った問題集を表示する -->
    @foreach($problems as $problem)
    <div class="c_content-card">
        <!-- title -->
        <p class="c_content-card-title bg-2">{{ $problem->subtitle }}</p>
        <div class="c_content-card-wrap">
            <a href="{{ route('edit', $problem->id) }}" class="c_content-card-link">編集</a>
            
            <!--削除-->
            <!--  route('quiz.delete')  -->
             <form action="{{ route('problem.delete', $problem->id) }}" method="POST" class="d-inline">
               @csrf
               <button class="c_content-card-link" onclick='return confirm("この問題を削除しますか？");'>
                 {{ __('Go Delete') }}
              </button>
             </form>
        </div>
    </div>
    @endforeach

    <div class="p_form-submit u_margin-2">
      <a href="{{ route('same', $drills->id) }}" class="c_content-card-link">この問題集にクイズを追加</a>
    </div>

  </div>

  <!-- ページネーション -->
  <div class="pagination">
    {{ $problems->links() }}
   </div>

@endsection

@section('footer')
