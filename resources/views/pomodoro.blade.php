@extends('layouts.app')

@section('title','Pomodoro')
@section('content')
  <h1>Pomodoro Timer</h1>
  <div id="timer" class="display-4 text-center mb-3">25:00</div>
  <button id="start" class="btn btn-primary">Bắt đầu</button>
  <button id="reset" class="btn btn-secondary">Đặt lại</button>

  <script>
    let sec = 25*60, interval;
    function render() {
      const m = String(Math.floor(sec/60)).padStart(2,'0'),
            s = String(sec%60).padStart(2,'0');
      document.getElementById('timer').textContent = `${m}:${s}`;
    }
    document.getElementById('start').onclick = ()=>{
      if (!interval) {
        interval = setInterval(()=>{
          if (sec>0) { sec--; render(); }
          else clearInterval(interval);
        },1000);
      }
    };
    document.getElementById('reset').onclick = ()=>{
      clearInterval(interval); interval=null; sec=25*60; render();
    };
  </script>
@endsection
