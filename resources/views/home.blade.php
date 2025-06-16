{{-- resources/views/home.blade.php --}}
@extends('layouts.app')

@section('title','Trang chủ')

@section('content')
{{-- Wrapper chiếm toàn bộ không gian dưới navbar --}}
<div class="d-flex w-100 flex-grow-1" style="min-height:0;">

  {{-- Sidebar: Nhóm của tôi --}}
  <div class="d-flex flex-column bg-white p-3 border-end" style="width:280px; min-height:0;">
    <h5 class="mb-4">Nhóm của tôi</h5>
    @php
      $myGroups = [
        ['id'=>1,'name'=>'Nhóm tương tác người máy','avatar'=>'avatar1.jpg'],
      ];
    @endphp
    <ul class="list-group list-group-flush flex-grow-1 overflow-auto" style="min-height:0;">
      @foreach($myGroups as $g)
        <li class="list-group-item d-flex align-items-center py-2">
          <img src="{{ asset('images/'.$g['avatar']) }}" width="32" height="32" class="rounded-circle me-2" alt="Avatar">
          <a href="/groups/{{ $g['id'] }}" class="text-decoration-none text-dark">{{ $g['name'] }}</a>
        </li>
      @endforeach
    </ul>
  </div>

  {{-- Main: Phòng học tập chung --}}
  <div class="d-flex flex-column bg-info bg-opacity-25 flex-grow-1 p-4" style="min-height:0;">
    <h4 class="text-center mb-4">Phòng học tập chung</h4>

    {{-- Tạo phòng tập chung --}}
    <div class="d-flex justify-content-center mb-4">
      <input
        type="text"
        class="form-control form-control-lg rounded-pill"
        placeholder="Tạo phòng tập chung"
        style="max-width:600px; width:100%;">
    </div>

    {{-- Danh sách phòng --}}
    @php
      $rooms = [
        ['title'=>'Phòng học tập chung 1','count'=>20,'avatars'=>array_fill(0,7,'avatar2.jpg')],
        ['title'=>'Phòng học tập chung 2','count'=>16,'avatars'=>array_fill(0,5,'avatar3.jpg')],
        ['title'=>'Phòng học tập chung 3','count'=>12,'avatars'=>array_fill(0,6,'avatar4.jpg')],
      ];
    @endphp
    <div class="row g-4 justify-content-center flex-grow-1 overflow-auto" style="min-height:0;">
      @foreach($rooms as $index => $room)
        <div class="@if($index===0) col-12 @else col-12 col-md-6 @endif">
          <div class="card shadow-sm h-100">
            <div class="card-body d-flex flex-column align-items-center text-center">
              <img
                src="{{ asset('images/'.$room['avatars'][0]) }}"
                width="40" height="40"
                class="rounded-circle mb-2"
                alt="Avatar">
              <h5 class="mb-1">{{ $room['title'] }}</h5>
              <small class="text-muted mb-3">{{ $room['count'] }} người trực tuyến</small>
              <div class="d-flex flex-wrap justify-content-center mb-4">
                @foreach($room['avatars'] as $av)
                  <img
                    src="{{ asset('images/'.$av) }}"
                    width="32" height="32"
                    class="rounded-circle me-1 mb-1"
                    alt="Avatar">
                @endforeach
              </div>
              {{-- resources/views/home.blade.php --}}
              <a href="{{ route('show') }}"
                class="btn btn-primary w-50 mt-auto">
                Tham Gia
              </a>
            </div>
          </div>
        </div>
      @endforeach
    </div>
  </div>

</div>
@endsection
