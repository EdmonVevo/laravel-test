@extends('layouts.app')
@section('content')

    <div class="right_content">
        <div class="addComp save">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @if(session()->has('success'))

                <div class="alert alert-success alert-block">

                    <button type="button" class="close" data-dismiss="alert">×</button>

                    <strong>{{ session()->get('success') }}</strong>

                </div>
                {{session()->forget('success')}}
            @endif
            <form method="post" action="{{route('employees.update',$employer->id)}}" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="form-group">
                    <label for="firstname">Firstname</label>
                    <input type="text" class="form-control" id="firstname" aria-describedby="firstname" placeholder="Enter firstname" name="firstname" value="{{$employer->firstname}}">
                </div>
                <div class="form-group">
                    <label for="lastname">Lastname</label>
                    <input type="text" class="form-control" id="lastname" aria-describedby="lastname" placeholder="Enter lastname" name="lastname" value="{{$employer->lastname}}">
                </div>
                <div class="form-group">
                    <label for="company">Company</label>
                    <input type="text" class="form-control" id="company" aria-describedby="company" placeholder="Enter company" name="company" value="{{$employer->company}}">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" name="email" value="{{$employer->email}}">
                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                </div>

                <div class="form-group">
                    <label for="phone">Phone</label>
                    <input type="text" class="form-control" id="phone" placeholder="phone" name="phone" value="{{$employer->phone}}">
                </div>


                <button type="submit" class="btn btn-primary">Update Employer</button>
            </form>
        </div>
    </div>
    </div>
    </div>

@endsection
