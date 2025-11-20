@extends('layouts.backend.app')

@section('title', 'Import Life Members')
    
@section('content')
<div class="container">

    <h4>Import Life Members</h4>

    <form action="{{ route('admin.life-members.import') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label>Select Excel File</label>
            <input type="file" name="file" class="form-control" required>
        </div>

        <button class="btn btn-success">Import</button>
    </form>

</div>
@endsection