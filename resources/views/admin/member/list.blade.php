@extends('admin.main')

@section('content')
    <table class="table">
        <thead>
        <tr>
            <th style="width: 50px">ID</th>
            <th>Full name</th>
            <th>Email</th>
            <th>level</th>
            <th>update_at</th>
            <th style="width: 100px">&nbsp;</th>
        </tr>
        </thead>
        <tbody>

        @foreach($users as $key => $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->level }}</td>
                <td>{{ $user->updated_at}}</td>
                <td>
                    <a href="#" class="btn btn-danger btn-sm"
                       onclick="removeRow({{ $user->id }}, '/admin/members/destroy')">
                        <i class="fas fa-trash"></i>
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <div class="card-footer clearfix">
        {!! $users->links() !!}
    </div>
@endsection

