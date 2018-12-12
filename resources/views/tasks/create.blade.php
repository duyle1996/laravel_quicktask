@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex flex-row">
        <div class="col-12 px-0">
            <h3 class="text-uppercase">@lang('messages.create_page')</h3>
            {!! Form::open(['route' => 'tasks.store', 'method' => 'post']) !!}
            <div class="form-group row">
                {!! Form::label('name', trans('messages.name'),
                    ['class' => 'col-12 col-form-label text-md-left']) !!}
                <div class="col-6">
                    {!! Form::text('name', old('name'), ['id' => 'name', 'required', 'autofocus',
                        'class' => 'form-control'. ($errors->has('name') ? ' is-invalid' : '')]) !!}
                </div>
            </div>
            <div class="form-group ">
                {{ Form::submit(trans('messages.confirm'), ['class' => 'btn btn-danger']) }}
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection
