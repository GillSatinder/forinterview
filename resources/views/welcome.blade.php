
@extends('layouts.master')


@section('title')
    Welcome!
    @endsection
@section('content')


@include('includes.message-block')



    <div class="row">

            <div class="col-md-6">
                <h3>Sign Up</h3>
                <form action="{{route('signup')}}" method="post">

                    {{csrf_field()}}

                    <div class="form-group">
                        <label for="email">Your E-Mail</label>
                        <input class="form-control" type="email" name="email" id="email">
                    </div>

                    <div class="form-group">
                        <label for="first_name">First Name</label>
                        <input class="form-control" type="text" name="first_name" id="first_name">
                    </div>

                    <div class="form-group">
                        <label for="password">Password</label>
                        <input class="form-control" type="password" name="password" id="password">
                    </div>
                    <button class="btn btn-primary" type="submit">Submit</button>





                </form>
            </div>


            <div class="col-md-6">
                <h3>Log In</h3>
                <form action="{{route('signin')}}" method="post">
                    {{csrf_field()}}

                    <div class="form-group">
                        <label for="email">Your E-Mail</label>
                        <input type="email" class="form-control" name="email" id="email">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" name="password" id="password">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>

    @endsection






