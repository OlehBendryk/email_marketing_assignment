@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="card mt-2 col-6">
            <div class="card-header"> Edit Customer </div>
            <div class="card-body">
                {{ Form::open([
                        'route' => ['customer.update', $customer],
                        'method' => 'put',
                        'files' => true,
                    ]) }}
                <div class="form-group row">

                    {{ Form::label('first_name', 'First Name', ['class' => 'col-4 text-md-right']) }}
                    {{ Form::text('first_name', $customer->first_name, ['class' => "form-control col-8" .  ($errors->has('first_name') ? 'is-invalid' : '')], 'required') }}
                    @if($errors->has('first_name'))
                        <span class="invalid-feedback" role="alert"></span>
                        <strong> {{ $errors->first('first_name') }}</strong>
                    @endif

                    {{ Form::label('last_name', 'Last Name', ['class' => 'col-4 text-md-right']) }}
                    {{ Form::text('last_name',$customer->last_name , ['class' => "form-control col-8" .  ($errors->has('last_name') ? 'is-invalid' : '')], 'required') }}
                    @if($errors->has('last_name'))
                        <span class="invalid-feedback" role="alert"></span>
                        <strong> {{ $errors->first('last_name') }}</strong>
                    @endif

                    {{ Form::label('email', 'Email', ['class' => 'col-4 text-md-right']) }}
                    {{ Form::text('email', $customer->email, ['class' => "form-control col-8" .  ($errors->has('email') ? 'is-invalid' : '')], 'required') }}
                    @if($errors->has('email'))
                        <span class="invalid-feedback" role="alert"></span>
                        <strong> {{ $errors->first('email') }}</strong>
                    @endif

                    {{ Form::label('birth_date', 'Birth Date', ['class' => 'col-4 text-md-right'])}}
                    {{ Form::date('birth_date', $customer->birth_date, ['class' => "form-control col-8" .  ($errors->has('birth_date') ? 'is-invalid' : '')], 'required') }}
                    @if($errors->has('birth_date'))
                        <span class="invalid-feedback" role="alert"></span>
                        <strong> {{ $errors->first('birth_date') }}</strong>
                    @endif

                    {{ Form::label('sex', 'Sex', ['class' => 'col-4 text-md-right']) }}
                    {{ Form::select('sex', ['male'=> 'Male', 'female'=>'Female'], $customer->sex, ['class' => "form-control col-8" .  ($errors->has('sex') ? 'is-invalid' : '')], ['required']) }}
                    @if($errors->has('sex'))
                        <span class="invalid-feedback" role="alert"></span>
                        <strong> {{ $errors->first('sex') }}</strong>
                    @endif

                </div>

                <div class="form-group mt-3 ">
                    {{ Form::submit('Edit', ['class' => 'btn btn-primary']) }}
                </div>
                {{ Form::close() }}
            </div>

        </div>
        </div>
@endsection
