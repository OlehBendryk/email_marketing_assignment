@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">Sent Email </div>
            <div class="card-body">
                {{ Form::open([
                         'route' => 'email_mass_sending.store',
                         'method' => 'post',
                         'role' => 'form',
                         'enctype' => 'multipart/form-data',
                     ]) }}
                @csrf
                <div class="form-group row">

                    {{ Form::label('group_id', 'Recipients', ['class' => 'col-4 text-md-right']) }}
                    {{ Form::select('group_id', $recipients, null, ['class' => "form-control col-8 mb-2" .  ($errors->has('group_id') ? 'is-invalid' : ''), 'placeholder'=> 'Select Group'], ['required']) }}
                    @if($errors->has('group_id'))
                        <span class="invalid-feedback" role="alert"></span>
                        <strong> {{ $errors->first('group_id') }}</strong>
                    @endif

                    {{ Form::label('email_template_id', 'Email templates', ['class' => 'col-4 text-md-right']) }}
                    {{ Form::select('email_template_id', $emailTemplates, null, ['class' => "form-control col-8 mb-2" .  ($errors->has('email_template_id') ? 'is-invalid' : ''), 'placeholder'=> 'Select Email Template'], ['required']) }}
                    @if($errors->has('email_template_id'))
                        <span class="invalid-feedback" role="alert"></span>
                        <strong> {{ $errors->first('email_template_id') }}</strong>
                    @endif

                    {{ Form::label('send_to', 'Time sending', ['class' => 'col-4 text-md-right']) }}
                    {{ Form::text('send_to', null, ['class' => "form-control col-8" .  ($errors->has('send_to') ? 'is-invalid' : ''), 'placeholder'=>'Year-month-day hour:minute (2021-12-31 10:00)  --For immediately dispatch keep empty--'], 'required') }}

                </div>

                <div class="form-group mt-3 ">
                    {{ Form::submit('Send Email', ['class' => 'btn btn-primary']) }}
                </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>
@endsection
