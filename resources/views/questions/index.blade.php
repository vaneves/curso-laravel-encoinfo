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
      Perguntas
      <a href="{{ url('question/create') }}" class="btn btn-xs btn-primary pull-right">Adicionar</a>
    </div>

    <div class="panel-body">
      <table class="table table-striped">
        <thead>
          <tr>
            <th>Título</th>
            <th>Autor</th>
            <th>Data</th>
            <th>Respostas</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($questions as $question)
          <tr>
            <td><a href="{{ url('question/' . $question->id) }}">{{ $question->title }}</a></td>
            <td>{{ $question->user->name }}</td>
            <td>{{ $question->created_at->format('d/m/Y H:i') }}</td>
            <td>{{ $question->responses_count }}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection
