@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header"> Add customer</div>
            <div class="card-body">
                {{ Form::open([
                        'route' => 'customer.store',
                        'method' => 'post',
                        'role' => 'form',
                        'enctype' => 'multipart/form-data',
                    ]) }}
                @csrf
                <div class="form-group row">

                    {{ Form::label('first_name', 'First Name', ['class' => 'col-4 text-md-right']) }}
                    {{ Form::text('first_name',null , ['class' => "form-control col-8" .  ($errors->has('first_name') ? 'is-invalid' : '')], 'required') }}
                    @if($errors->has('first_name'))
                        <span class="invalid-feedback" role="alert"></span>
                        <strong> {{ $errors->first('first_name') }}</strong>
                    @endif

                    {{ Form::label('last_name', 'Last Name', ['class' => 'col-4 text-md-right']) }}
                    {{ Form::text('last_name',null , ['class' => "form-control col-8" .  ($errors->has('last_name') ? 'is-invalid' : '')], 'required') }}
                    @if($errors->has('last_name'))
                        <span class="invalid-feedback" role="alert"></span>
                        <strong> {{ $errors->first('last_name') }}</strong>
                    @endif

                    {{ Form::label('email', 'Email', ['class' => 'col-4 text-md-right']) }}
                    {{ Form::text('email', null, ['class' => "form-control col-8" .  ($errors->has('email') ? 'is-invalid' : '')], 'required') }}
                    @if($errors->has('email'))
                        <span class="invalid-feedback" role="alert"></span>
                        <strong> {{ $errors->first('email') }}</strong>
                    @endif

                    {{ Form::label('birth_date', 'Birth Date', ['class' => 'col-4 text-md-right'])}}
                    {{ Form::date('birth_date', \Carbon\Carbon::now(), ['class' => "form-control col-8" .  ($errors->has('birth_date') ? 'is-invalid' : '')], 'required') }}
                    @if($errors->has('birth_date'))
                        <span class="invalid-feedback" role="alert"></span>
                        <strong> {{ $errors->first('birth_date') }}</strong>
                    @endif

                    {{ Form::label('sex', 'Sex', ['class' => 'col-4 text-md-right']) }}
                    {{ Form::select('sex', ['Male'=> 'Male', 'Female'=>'Female'], null, ['placeholder' => 'Pick a sex...'], ['class' => "form-control col-8" .  ($errors->has('sex') ? 'is-invalid' : '')], ['required']) }}
                    @if($errors->has('sex'))
                        <span class="invalid-feedback" role="alert"></span>
                        <strong> {{ $errors->first('sex') }}</strong>
                    @endif

                </div>

                <div class="form-group mt-3 ">
                    {{ Form::submit('Add customer', ['class' => 'btn btn-primary']) }}
                </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>
@endsection
