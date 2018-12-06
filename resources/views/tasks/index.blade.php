@extends('layouts.app')
@section('content')
<div class="container">
  <div class="row">
    <div class="col-12">
      <h3 class="text-uppercase">@lang('messages.index')</h3>
      <table class="table table-hover table-bordered">
        <thead>
          <tr class="text-center">
            <th scope="col" class="">#</th>
            <th scope="col" class="">Name</th>
            <th scope="col" class="">Action</th>
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
        <for action="{{route('tasks.create')}}" method="get">
        {!! Form::open(['route' => ['tasks.create', $user->id], 'method' => 'get']) !!}
          </button>
        {{ Form::submit(trans('messages.create'), ['class' =>'btn btn-info text-uppercase font-weight-bold rounded-0', 
        'id' => 'create-task-'.$user->id]) }}
  
        {!! Form::close() !!} 
      </div>
    </div>
@endsection
