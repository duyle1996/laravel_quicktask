@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            @include('common.erorrs')
            <h3 class="text-uppercase">@lang('messages.index')</h3>
            <table class="table table-hover table-bordered">
                <thead>
                    <tr class="text-center">
                        <th scope="col" class="">@lang('messages.stt')</th>
                        <th scope="col" class="">@lang('messages.name')</th>
                        <th scope="col" class="">@lang('messages.active')</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach($users as $user)
                    <tr class="text-center">
                        <th scope="row">{{$user->id}}</th>
                        <td>{{$user->name}}</td>
                        <td class="d-flex align-items-center justify-content-around">
                            {!! Form::open(['route' => ['tasks.edit', $user->id], 'method' => 'get']) !!}
                            {{ Form::submit(trans('messages.edit'), ['class' => 'btn btn-warning',
                                'id' => 'edit-task-'.$user->id]) }}
                            {!! Form::close() !!}
                            {!! Form::open(['route' => ['tasks.destroy', $user->id], 'method' => 'delete']) !!}
                            {{ Form::submit(trans('messages.delete'), ['class' => 'btn btn-danger',
                                'id' => 'delete-task-'.$user->id]) }}
                            {!! Form::close() !!}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="container mb-5">
    <div class="row">
        <div class="col-12">
            <div class="d-flex justify-content-end align-items-center">
                {!! Form::open(['route' => ['tasks.create', $user->id], 'method' => 'get']) !!}
                {{ Form::submit(trans('messages.create'), ['class' =>'btn btn-info text-uppercase font-weight-bold
                    rounded-0','id' => 'create-task'.$user->id]) }}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection
