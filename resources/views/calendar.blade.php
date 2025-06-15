@extends('layouts.app')

@section('title','Lịch')
@section('content')
  <h1>Lịch</h1>
  <div id="calendar"></div>

  <link href="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.4/main.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.4/main.min.js"></script>
  <script>
    document.addEventListener('DOMContentLoaded',function(){
      let calEl = document.getElementById('calendar');
      new FullCalendar.Calendar(calEl,{}).render();
    });
  </script>
@endsection
