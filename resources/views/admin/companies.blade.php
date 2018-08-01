@extends('layouts.app')

@section('content')
        <div class="right_content content_side_companies">
            <div class="add_company">
                <a href="{{route('addCompany')}}" class="btn btn-success">
                    Add new company
                </a>
            </div>
            <table class="companies">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Logo</th>
                    <th>Website</th>
                    <th>Edit</th>
                    <th>Remove</th>
                </tr>


            @foreach($companies as $company)
                <tr>
                    <td>{{$company->id}}</td>
                    <td>{{$company->name}}</td>
                    <td>{{$company->email}}</td>
                    <td>{{$company->logo}}</td>
                    <td>{{$company->website}}</td>
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
</div

</div>
@endsection
