@extends('layouts.master')

@section('content')

    <div class="container">
        <div class="card">
            <div class="card-header">
                <h4>Customer #{{$customer->id}}</h4>
            </div>

            <div class="card-body">
                <div class="row">
                    <div class="col-8">
                        <div> ID - {{$customer->id}}</div>
                        <div> FName - {{$customer->first_name}}</div>
                        <div> LName - {{$customer->last_name}}</div>
                        <div> Email - {{$customer->email}}</div>
                        <div> Birth - {{$customer->birth_date}}</div>
                        <div> Sex - {{$customer->sex}}</div>
                    </div>

                    <div class="col-4 text-right">
                        <a href="{{ route('customer.edit', $customer) }}" class="btn btn-warning">
                            <i class="fas fa-pencil-alt"></i> Edit customer
                        </a>
                        <div class="mt-2">
                            <form action="{{ route('customer.destroy', $customer) }}" method="post" onsubmit="return confirm('Are you sure you want to delete customer {{$customer->first_name}} {{$customer->last_name}}?');">
                                @method('delete')
                                @csrf
                                <button type="submit" class="btn btn-danger">
                                    <i class="fas fa-trash-alt"></i> Remove
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
