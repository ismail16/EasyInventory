@extends('admin.layouts.app')

@section('content')

  <div class="content-wrapper">
      <router-view :key="$route.path"></router-view>
      <vue-progress-bar></vue-progress-bar>
  </div>

@endsection