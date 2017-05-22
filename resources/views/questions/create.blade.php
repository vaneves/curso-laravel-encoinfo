@extends('layouts.app')

@section('content')
<div class="container">
  <div class="panel panel-default">
    <div class="panel-heading">Criar Pergunta</div>
    <div class="panel-body">
      <form class="form-horizontal" role="form" method="POST" action="{{ url('question') }}">
        {{ csrf_field() }}

        <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
          <label for="title" class="col-md-3 control-label">Título</label>
          <div class="col-md-6">
            <input id="title" type="text" class="form-control" name="title" value="{{ old('title') }}">
            @if ($errors->has('title'))
              <span class="help-block">
                {{ $errors->first('title') }}
              </span>
            @endif
          </div>
        </div>

        <div class="form-group{{ $errors->has('content') ? ' has-error' : '' }}">
          <label for="content" class="col-md-3 control-label">Conteúdo</label>

          <div class="col-md-6">
            <textarea id="content" class="form-control" name="content" value="{{ old('content') }}"></textarea>

            @if ($errors->has('content'))
              <span class="help-block">
                {{ $errors->first('content') }}
              </span>
            @endif
          </div>
        </div>

        <div class="form-group">
          <div class="col-md-6 col-md-offset-3">
            <button type="submit" class="btn btn-primary">
              Enviar
            </button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection