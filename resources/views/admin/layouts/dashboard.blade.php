@extends('admin.layouts.app')
@section('title','Easy Invemtory | Admin Dashboard')
@section('content')

  <div class="content-wrapper">
  		<!-- <SettingComponent></SettingComponent> -->
      <router-view :key="$route.path"></router-view>
      <vue-progress-bar></vue-progress-bar>
  </div>

@endsection