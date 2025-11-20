@extends('layouts.backend.app')

@section('title', 'Life Members')
    
@section('content')
<div class="container">

    <h4 class="mb-3">Life Members List</h4>

    <a href="{{ route('admin.life-members.import-view') }}" class="btn btn-primary mb-3">
        Import Excel
    </a>

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>LM No</th>
                <th>Name</th>
                <th>Status</th>
                <th>Abroad?</th>
                <th>Address</th>
            </tr>
        </thead>

        <tbody>
            @foreach($members as $key => $member)
            <tr>
                <td>{{ $members->firstItem() + $key }}</td>
                <td>{{ $member->lm_no }}</td>
                <td>{{ $member->name }}</td>
                <td>{{ $member->status }}</td>
                <td>{{ $member->is_abroad ? 'Yes' : 'No' }}</td>
                <td>{{ $member->address }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {!! $members->links('pagination::bootstrap-4') !!}

</div>

@endsection
