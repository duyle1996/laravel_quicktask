@extends('layouts.app')
@section('content')
<div class="container">
  <div class="row">
    <div class="col-12 ">
      <h3 class="text-uppercase">@lang('messages.edit')</h3>
        {!! Form::open(['route' => ['tasks.update', $user->id], 'method' => 'put']) !!}
        <div class="form-group ">          
        {!! Form::label('name', trans('messages.name'), 
            ['class' => 'col-12 col-form-label text-md-left']) !!}
            <div class="col-6">
                {!! Form::text('name', old('name'), ['id' => 'name', 'required', 'autofocus',
                  'class' => 'form-control'. ($errors->has('name') ? ' is-invalid' : '')]) !!}
            </div>
        </div>
        <div class="form-group ">
        {{ Form::submit(trans('messages.save'), ['class' => 'btn btn-danger']) }}
        </div>
      {!! Form::close() !!} 
    </div>
  </div>
</div>
@endsection
