{{-- resources/views/group.blade.php --}}
@extends('layouts.app')

@section('title', $group['name'])

@section('content')
<div class="d-flex w-100 h-100" style="min-height:0;">

  {{-- Sidebar nhóm --}}
  <div class="d-flex flex-column bg-white border-end" style="width:240px; min-height:0;">
    <div class="d-flex align-items-center px-3 py-2 border-bottom" style="height:60px; flex-shrink:0;">
      <img src="{{ asset('images/' . $group['avatar']) }}" width="32" height="32" class="rounded-circle me-2" alt="Avatar">
      <h6 class="mb-0">{{ $group['name'] }}</h6>
    </div>
    <ul class="list-group list-group-flush flex-grow-1 overflow-auto" style="min-height:0;">
      <li class="list-group-item p-0">
        <button id="chatChannelBtn" class="btn w-100 text-start px-3 py-2 active">
          <i class="bi bi-chat-left-text me-2"></i>Kênh chat
        </button>
      </li>
      <li class="list-group-item p-0">
        <button id="callChannelBtn" class="btn w-100 text-start px-3 py-2">
          <i class="bi bi-camera-video me-2"></i>Kênh thoại
        </button>
      </li>
    </ul>
  </div>

  {{-- Nội dung kênh --}}
  <div class="flex-grow-1 d-flex flex-column" style="min-height:0;">
    {{-- Chat Channel --}}
    <div id="chatChannel" class="flex-grow-1 d-flex flex-column" style="min-height:0;">
      @include('partials.chat')
    </div>

    {{-- Call Channel --}}
    <div id="callChannel" class="d-none flex-grow-1 d-flex flex-column" style="min-height:0;">
      <div class="d-flex flex-wrap overflow-auto flex-grow-1 p-3 gap-3" style="min-height:0;">
        @for($i = 0; $i < 9; $i++)
          <div class="bg-dark text-white d-flex align-items-center justify-content-center rounded-3"
               style="width:calc((100% - 3rem) / 4); height:120px;">
            Camera của người dùng
          </div>
        @endfor
      </div>
      <div class="d-flex justify-content-center align-items-center p-3" style="flex-shrink:0;">
        <button class="btn btn-light me-3"><i class="bi bi-mic-fill fs-5"></i></button>
        <button class="btn btn-light me-3"><i class="bi bi-camera-video fs-5"></i></button>
        <button class="btn btn-light me-3"><i class="bi bi-arrows-fullscreen fs-5"></i></button>
        <button class="btn btn-danger"><i class="bi bi-telephone-fill fs-5"></i></button>
      </div>
    </div>
  </div>

</div>

<script>
  document.getElementById('chatChannelBtn').addEventListener('click', function() {
    this.classList.add('active');
    document.getElementById('callChannelBtn').classList.remove('active');
    document.getElementById('chatChannel').classList.remove('d-none');
    document.getElementById('callChannel').classList.add('d-none');
  });
  document.getElementById('callChannelBtn').addEventListener('click', function() {
    this.classList.add('active');
    document.getElementById('chatChannelBtn').classList.remove('active');
    document.getElementById('callChannel').classList.remove('d-none');
    document.getElementById('chatChannel').classList.add('d-none');
  });
</script>
@endsection
