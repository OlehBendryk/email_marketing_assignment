@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="card mt-2 col-12">
            <div class="card-header"> Edit Group </div>
            <div class="card-body">
                {{ Form::open([
                        'route' => ['group.update', $group],
                        'method' => 'put',
                        'files' => true,
                    ]) }}
                <div class="form-group row">

                    {{ Form::label('name', 'Name', ['class' => 'col-4 text-md-right']) }}
                    {{ Form::text('name', $group->name, ['class' => "form-control col-8" .  ($errors->has('name') ? 'is-invalid' : '')], 'required') }}

                    @if($errors->has('name'))
                        <span class="invalid-feedback" role="alert"></span>
                        <strong> {{ $errors->first('name') }}</strong>
                    @endif

                    <div class="row mt-2">
                        <table class="table">
                            <span class="table-title">
                                <h6> Customers of the {{$group->name}} group </h6>
                            </span>
                            <thead>
                            <tr class="table-success">
                                <th>ID</th>
                                <th>FName</th>
                                <th>LName</th>
                                <th>Phone</th>
                                <th>Birth</th>
                                <th>Sex</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($customersForGroup as $customer)
                                <tr class="table-primary">
                                    <td>{{$customer->id}}</td>
                                    <td>{{$customer->first_name}}</td>
                                    <td>{{$customer->last_name}}</td>
                                    <td>{{$customer->phone}}</td>
                                    <td>{{$customer->date_of_birth}}</td>
                                    <td>{{$customer->sex}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>


                    <h6 class="card-title mt-2">Add Customers for group</h6>

                        <div class="col-md-2">
                            {{ Form::select('customers[]', $customers, $customersForGroup, ['class' => 'form-control', 'multiple' => 'multiple']) }}
                        </div>

                    @if($errors->has('customers'))
                        <span class="invalid-feedback" role="alert"></span>
                        <strong> {{ $errors->first('customers') }}</strong>
                    @endif
                </div>

                <div class="form-group mt-3 ">
                    {{ Form::submit('Edit Group', ['class' => 'btn btn-primary']) }}
                </div>
                {{ Form::close() }}
            </div>

        </div>
        </div>
@endsection
