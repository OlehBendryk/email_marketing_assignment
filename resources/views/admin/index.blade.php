@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="d-flex flex-column flex-shrink-0 p-3  bg-black shadow-sm">
                    <hr>
                    <ul class="nav nav-pills ">
                        <li class="nav-item">
                            <a href="{{route('customer.index')}}" class="nav-link ">
                                Customers
                            </a>
                        </li>
                        <li>
                            <a href="{{route('group.index')}}" class="nav-link">
                                Groups
                            </a>
                        </li>
                        <li>
{{--                            <a href="{{route('email.index')}}" class="nav-link">--}}
{{--                                Email Template--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <a href="{{route('email_sending.create')}}" class="nav-link">--}}
{{--                                Send Email--}}
{{--                            </a>--}}
{{--                        </li>--}}
                    </ul>
                    <hr>
                </div>
            </div>
        </div>
    </div>
@endsection
