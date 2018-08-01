@extends('layouts.app')

@section('content')
        <div class="right_content content_side_employees">
            <div class="add_employer">
                <a href="#" class="btn btn-success">
                    Add new company
                </a>
            </div>
            <table class="employers">
                <tr>
                    <th>ID</th>
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
                        <td>{{$employee->id}}</td>
                        <td>{{$employee->firstname}}</td>
                        <td>{{$employee->lastname}}</td>
                        <td>{{$employee->company}}</td>
                        <td>{{$employee->email}}</td>
                        <td>{{$employee->phone}}</td>
                        <td>
                            <a href="">
                                <i class="far fa-edit"></i>
                            </a>
                        </td>
                        <td>
                            <a href="">
                                <i class="fas fa-trash-alt"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
</div>

</div>
@endsection

