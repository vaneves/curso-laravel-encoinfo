@extends('layouts.app')

@section('content')
<div class="container">
  
  @if (session('success'))
  <div class="alert alert-success alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
    {{ session('success') }}
  </div>
  @endif

  <div class="panel panel-default">
    <div class="panel-heading">
      {{ $question->title }}
    </div>
    <div class="panel-body">
      <p>
        {{ $question->content }}
      </p>
    </div>
    <div class="panel-footer">
      Enviada por {{ $question->user->name }} em {{ $question->created_at->format('d/m/Y H:i') }}
    </div>
  </div>

  @foreach ($question->responses as $response)
  <div class="panel panel-default">
    <div class="panel-body">
      <p class="text-muted">
        Enviada por {{ $response->user->name }} em {{ $response->created_at->format('d/m/Y H:i') }}
      </p>
      <p>
        {{ $response->content }}
      </p>
    </div>
    <div class="panel-footer">
      Enviada por {{ $response->user->name }} em {{ $response->created_at->format('d/m/Y H:i') }}
    </div>
  </div>
  @endforeach

  <div class="panel panel-default">
    <div class="panel-heading">
      Responder
    </div>
    <div class="panel-body">
      <form role="form" method="POST" action="{{ url('question/response/' . $question->id) }}">
        {{ csrf_field() }}
        <div class="form-group{{ $errors->has('content') ? ' has-error' : '' }}">
          <textarea id="content" class="form-control" name="content" value="{{ old('content') }}"></textarea>
          @if ($errors->has('content'))
            <span class="help-block">
              {{ $errors->first('content') }}
            </span>
          @endif
        </div>
        <button type="submit" class="btn btn-primary">Responder</button>
      </form>
    </div>
  </div>
</div>
@endsection
