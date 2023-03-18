@extends('layouts.parent')

@section('title', 'DO-ONプレイ')

<!-- header -->
@section('header')
  @parent
@endsection

<!-- main -->
@section('main')
    <div id="app">
      <example-component :problems="{{ $problems }}"></example-component>
    </div>
@endsection

<!-- footer -->
@section('footer')
  @parent
  <script src="{{ secure_asset('js/app.js') }}" defer></script>
@endsection
