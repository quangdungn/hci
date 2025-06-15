@extends('layouts.app')

@section('title','Nhắn tin')
@section('content')
  <h1>Chat</h1>
  <div class="border p-3 mb-3" style="height:300px; overflow:auto;">
    <!-- Messages sẽ append bằng JS nếu cần -->
    <div><strong>Alice:</strong> Xin chào!</div>
    <div><strong>Bob:</strong> Chào Alice!</div>
  </div>
  <input type="text" class="form-control" placeholder="Nhập tin nhắn...">
@endsection
