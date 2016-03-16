@extends('layouts.app')


@section('content')
    <div class="panel-body">
        @include('common.errors')

        <form action="{{ url('client') }}" method="POST" class="form-horizontal">
            {!! csrf_field() !!}
            <div class="form-group">
                <label for="client" class="col-sm-3 control-label">Cliente</label>
                <div class="col-sm-6">
                    <input type="text" name="name" id="client-name" class="form-control">
                </div>
            </div>


            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" class="btn btn-default">
                        <i class="fa fa-plus"></i> Add Task
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection