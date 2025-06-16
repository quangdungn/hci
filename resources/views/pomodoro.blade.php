{{-- resources/views/pomodoro.blade.php --}}
@extends('layouts.app')

@section('title','Pomodoro')

@section('content')
{{-- Wrapper chính, chiếm hết phần main (đã flex-grow trong layout) --}}
<div class="d-flex flex-column align-items-center justify-content-center w-100 h-100" style="background:#e6f7ff;">

  {{-- Tiêu đề --}}
  <h1 class="mb-4">Pomodoro</h1>
  
  {{-- Vòng tròn chứa timer --}}
  <div class="position-relative d-flex align-items-center justify-content-center"
       style="width:240px; height:240px; border:10px solid #1abc9c; border-radius:50%;">

    {{-- Thời gian hiển thị --}}
    <div id="timerText" class="text-dark" style="font-size:2rem; font-weight:700;">
      25:00
    </div>
    
    {{-- Nút Play --}}
    <button id="startBtn"
            class="btn btn-dark position-absolute rounded-circle d-flex align-items-center justify-content-center"
            style="width:48px; height:48px; bottom:-24px;">
      <i class="bi bi-play-fill text-white"></i>
    </button>
  </div>
</div>

{{-- Script đếm ngược --}}
<script>
document.addEventListener('DOMContentLoaded', () => {
  const startBtn   = document.getElementById('startBtn');
  const timerText  = document.getElementById('timerText');
  let remaining    = 25 * 60; // 25 phút
  let intervalId   = null;

  startBtn.addEventListener('click', () => {
    if (intervalId) return;
    intervalId = setInterval(() => {
      remaining--;
      if (remaining < 0) {
        clearInterval(intervalId);
        return;
      }
      const m = String(Math.floor(remaining / 60)).padStart(2, '0');
      const s = String(remaining % 60).padStart(2, '0');
      timerText.textContent = `${m}:${s}`;
    }, 1000);
  });
});
</script>
@endsection
