@extends('layouts.app')

@section('content')
        <div class="right_content content_side_employees">
            <div class="add_employer">
                <a href="{{route('employees.create')}}" class="btn btn-success">
                    Add new employer
                </a>
            </div>
            <div>
                @if(session()->has('success'))

                    <div class="alert alert-success alert-block">

                        <button type="button" class="close" data-dismiss="alert">×</button>

                        <strong>{{ session()->get('success') }}</strong>

                    </div>
                    {{session()->forget('success')}}
                @endif

            </div>
            <table class="employers">
                <tr>
                    <th>Firstname</th>
                    <th>Lastname</th>
                    <th>Companny</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Edit</th>
                    <th>Remove</th>
                </tr>


                @foreach($employees as $employee)
                    <tr>
                        <td>{{$employee->firstname}}</td>
                        <td>{{$employee->lastname}}</td>
                        <td>{{$employee->company}}</td>
                        <td>{{$employee->email}}</td>
                        <td>{{$employee->phone}}</td>
                        <td>
                            <a href="{{route('employees.edit',$employee->id)}}">
                                <i class="far fa-edit"></i>
                            </a>
                        </td>
                        <td>
                            <form method="post" action="{{route('employees.destroy',$employee->id)}}">
                                @csrf
                                @method('delete')

                                <button class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>

                            </form>
                        </td>
                    </tr>
                @endforeach
            </table>
            <div style="display: flex;justify-content: center" class="align-center">
                {{$employees->render()}}
            </div>
        </div>
</div>

</div>
@endsection

