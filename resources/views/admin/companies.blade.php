@extends('layouts.app')

@section('content')
        <div class="right_content content_side_companies">

            <div class="add_company">
                <a href="{{route('companies.create')}}" class="btn btn-success">
                    Add new company
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
            <table class="companies">
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Logo</th>
                    <th>Website</th>
                    <th>Edit</th>
                    <th>Remove</th>
                </tr>


            @foreach($companies as $company)
                <tr>
                    <td>{{$company->name}}</td>
                    <td>{{$company->email}}</td>
                    {{--<img src="{{storage_path('public/5b633665ace82.jpg')}}" alt="">--}}
                    <td>Logo</td>
                    <td>{{$company->website}}</td>
                    <td>
                        <a href="{{route('companies.edit',$company->id)}}">
                            <i class="far fa-edit"></i>
                        </a>
                    </td>
                    <td>
                        <form method="post" action="{{route('companies.destroy',$company->id)}}">
                            @csrf
                            @method('delete')

                            <button class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>

                        </form>

                    </td>
                </tr>
            @endforeach
            </table>
            <div style="display: flex;justify-content: center" class="align-center">
                   {{$companies->render()}}
            </div>
        </div>
</div

</div>
@endsection
