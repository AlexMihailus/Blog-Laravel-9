@extends('admin.layouts.main')
@section('content')

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">

            <div class="col-sm-6 mt-3">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ url('/admin') }}">Admin</a></li>
                    <li class="breadcrumb-item active">Tags</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<div class="table-responsive">
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th colspan="3" class="text-center">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tags as $tag)
            <tr>
                <td>{{ $tag->id }}</td>
                <td>{{ $tag->title }}</td>
                <td class="text-center"><a href="{{ route('tags.show', $tag->id) }}" class="text-primary">show</a></td>
                <td class="text-center"><a href="{{ route('tags.edit', $tag->id) }}" class="text-success">edit</a></td>
                <td class="text-center">
                    <form action="{{ route('tags.destroy', $tag->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="border-0 bg-transparent text-danger">
                            delete
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
<div class="row">
    <div class="col-1 mb-3">
        <a href="{{ route('tags.create') }}" class="btn btn-block btn-primary">Create</a>
    </div>
</div>

@endsection