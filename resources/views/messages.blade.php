{{-- resources/views/messages.blade.php --}}
@extends('layouts.app')

@section('title','Tin nhắn')

@section('content')
<div class="d-flex w-100 h-100">

  {{-- Sidebar trái --}}
  <div class="d-flex flex-column bg-white border-end" style="width:320px;">
    {{-- Header --}}
    <div class="d-flex align-items-center justify-content-between px-3 py-2 border-bottom">
      <h5 class="mb-0">Tin nhắn</h5>
      <button class="btn btn-sm text-primary"><i class="bi bi-plus-lg"></i></button>
    </div>
    {{-- Search --}}
    <div class="px-3 py-2">
      <div class="input-group" style="border:2px solid #0d6efd; border-radius:18px; overflow:hidden;">
        <span class="input-group-text bg-white border-0">
          <i class="bi bi-search text-primary"></i>
        </span>
        <input type="text" class="form-control border-0 shadow-none" placeholder="Search">
      </div>
    </div>
    {{-- Danh sách chat --}}
    <ul class="list-group list-group-flush flex-grow-1 overflow-auto">
      <li class="list-group-item d-flex align-items-center">
        <img src="{{ asset('images/avatar.jpg') }}" class="rounded-circle me-3" width="40" height="40" alt="">
        <div class="flex-grow-1">
          <div class="d-flex justify-content-between">
            <span class="fw-bold">Bình</span>
            <small class="text-muted">16:00</small>
          </div>
          <div class="d-flex justify-content-between small">
            <span class="text-truncate" style="max-width:160px">Bạn: Tớ nghĩ nên thuê xe cho…</span>
            <span class="text-muted">Đang nhập…</span>
          </div>
        </div>
      </li>
      <li class="list-group-item active d-flex align-items-center">
        <img src="{{ asset('images/avatar2.jpg') }}" class="rounded-circle me-3" width="40" height="40" alt="">
        <div class="flex-grow-1">
          <div class="d-flex justify-content-between">
            <span class="fw-bold">Sơn</span>
            <small class="text-muted">14:00</small>
          </div>
          <div class="small text-truncate" style="max-width:160px">Chiều nay đi chơi không ?</div>
        </div>
      </li>
      {{-- … thêm item chat khi cần … --}}
    </ul>
  </div>

  {{-- Khung chat chính giữa --}}
  <div class="d-flex flex-column flex-grow-1">

    {{-- Header chat --}}
    <div class="d-flex align-items-center px-3 bg-white border-bottom" style="height:60px;">
      <img src="{{ asset('images/avatar2.jpg') }}" class="rounded-circle me-3" width="40" height="40" alt="">
      <div>
        <div class="fw-bold">Sơn</div>
        <div class="text-success small">Đang hoạt động</div>
      </div>
    </div>

    {{-- Tin nhắn --}}
    <div class="flex-grow-1 overflow-auto px-3 py-2 bg-light">
      {{-- Tin từ Sơn --}}
      <div class="d-flex mb-3">
        <img src="{{ asset('images/avatar2.jpg') }}" class="rounded-circle me-2" width="32" height="32" alt="">
        <div class="bg-white p-2 rounded-3" style="max-width:60%;">
          <p class="mb-1 small">Chào An! Tớ cũng chưa có kế hoạch gì cả. Có gì vui à?</p>
          <small class="text-muted">16:30</small>
        </div>
      </div>
      {{-- Tin của An --}}
      <div class="d-flex mb-3 justify-content-end">
        <div class="bg-primary text-white p-2 rounded-3" style="max-width:60%;">
          <p class="mb-1 small">Chào Sơn! Cuối tuần này cậu có rảnh không?</p>
          <small class="text-white small">16:20</small>
        </div>
        <img src="{{ asset('images/avatar.jpg') }}" class="rounded-circle ms-2" width="32" height="32" alt="">
      </div>
      {{-- … thêm tin nhắn … --}}
    </div>

    {{-- Khung nhập --}}
    <div class="d-flex align-items-center px-3 py-2 bg-white border-top" style="height:60px;">
      <button class="btn btn-light me-2"><i class="bi bi-mic-fill fs-5"></i></button>
      <button class="btn btn-light me-2"><i class="bi bi-image fs-5"></i></button>
      <button class="btn btn-light me-2"><i class="bi bi-emoji-smile fs-5"></i></button>
      <input type="text" class="form-control rounded-pill border-1" placeholder="Nhập tại đây...">
      <button class="btn btn-primary ms-2"><i class="bi bi-send-fill fs-5"></i></button>
    </div>

  </div>
</div>
@endsection
