@extends('layouts.parent')

@section('title', 'DO-ONクイズ作成')

@section('header')

@section('main')
  <div class="c_main_top-container">
    <h4 class="c_main_top-title">クイズ作成画面</h4>
  </div>

  <div class="p_form-container">
      <form method="POST" action="{{ route('create') }}">
        @csrf

        <div class="form-group">
         
          <label for="drill_title">問題集名：</label>
          <input type="text" name="title" class="form-control @error('title') valid-error @enderror" id="drill_title" value="{{ old('title') }}" placeholder="※同じ問題集名がある場合、そこにこのクイズが追加されます。" autocomplete="on">
          <!-- error -->
          @error('title')
              <span class="invalid-feedback" role="alert" style="display:block;">
                <strong>{{ $message }}</strong>
              </span>
          @enderror

        </div>

        <div class="form-group">
         
         <label for="drill_subtitle">このクイズのタイトル：</label>
         <input type="text" name="subtitle" class="form-control @error('subtitle') valid-error @enderror" id="drill_subtitle" value="{{ old('subtitle') }}" placeholder="例) 問題１">
         <!-- error -->
         @error('subtitle')
             <span class="invalid-feedback" role="alert" style="display:block;">
               <strong>{{ $message }}</strong>
             </span>
         @enderror

       </div>


        <div class="form-group">
          <label for="drill_problem">問題文：</label>
          <div class="">
            <textarea class="p_form-textarea @error('problem_statement') valid-error @enderror" name="problem_statement" id="drill_problem" cols="30" rows="10" placeholder="ここに問題文を入力してください">{{ old('problem_statement') }}</textarea>
          </div>
          <!-- error -->
          @error('problem_statement')
            <span class="invalid-feedback" role="alert" style="display:block;">
              <strong>{{ $message }}</strong>
            </span>
          @enderror
        </div>


        <div class="form-group">
          <label for="drill_corect">正解：</label>
          <input type="text" name="correct" class="form-control @error('title') valid-error @enderror" id="drill_corect" value="{{ old('correct') }}" placeholder="ここに入力した内容が正解として表示されます。">
          <!-- error -->
          @error('correct')
            <span class="invalid-feedback" role="alert" style="display:block;">
              <strong>{{ $message }}</strong>
            </span>
          @enderror
        </div>

        <div class="form-group">
          <label for="drill_comment">解説(任意)：</label>
          <div class="">
            <textarea class="p_form-textarea @error('comment') valid-error @enderror" name="comment" id="drill_comment" cols="30" rows="10" value="{{ old('comment') }}" placeholder="問題の解説がある場合はここに入力してください。"></textarea>
          </div>
          <!-- error -->
          @error('comment')
            <span class="invalid-feedback" role="alert" style="display:block;">
              <strong>{{ $message }}</strong>
            </span>
          @enderror
        </div>

        <div class="form-group">
          <label for="drill_fake1">ダミーの選択肢1：</label>
          <input type="text" name="fake1" class="form-control @error('fake1') valid-error @enderror" id="drill_fake1" value="{{ old('fake1') }}" placeholder="正解と違う内容にしてください">
          <!-- error -->
          @error('fake1')
            <span class="invalid-feedback" role="alert" style="display:block;">
              <strong>{{ $message }}</strong>
            </span>
          @enderror
        </div>

        <div class="form-group">
          <label for="drill_fake2">ダミーの選択肢2：</label>
          <input type="text" name="fake2" class="form-control @error('fake2') valid-error @enderror" id="drill_fake2" value="{{ old('fake2') }}" placeholder="それぞれ違う内容にしましょう">
          <!-- error -->
          @error('fake2')
            <span class="invalid-feedback" role="alert" style="display:block;">
              <strong>{{ $message }}</strong>
            </span>
          @enderror
        </div>

        <div class="form-group">
          <label for="drill_fake3">ダミーの選択肢3：</label>
          <input type="text" name="fake3" class="form-control @error('fake3') valid-error @enderror" id="drill_fake3" value="{{ old('fake3') }}" placeholder="相手を不快にさせる内容はやめましょう">
          <!-- error -->
          @error('fake3')
            <span class="invalid-feedback" role="alert" style="display:block;">
              <strong>{{ $message }}</strong>
            </span>
          @enderror
        </div>

        <div class="p_form-submit">
          <button type="submit" class="btn btn-primary">{{ __('Finished') }}</button>
        </div>
      </form>
  </div>


@endsection

@section('footer')
