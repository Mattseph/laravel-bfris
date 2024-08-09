@extends('layouts.app');

@section('content')
    <div class="container">
        <div class="row">
            <div class="d-flex flex-row justify-content-between">
                <h2>{{ $title }}</h2>
                <a href="{{ route('resident.create') }}" class="btn btn-success align-middle">Add New Resident</a>
            </div>

            <div class="table-responsive">
                <table class="table table-borderless">
                    <tr class="border-bottom">
                        <th>Name</th>
                        <th>Address</th>
                        <th>Action</th>
                    </tr>
                    @foreach ($residents as $resident)
                        <tr class="border-bottom">
                            <td>
                                @if ($resident->image !== '')
                                    <img src="{{ asset('storage/' .$resident->image) }}" alt="resident-img" width="50px" height="50px">
                                @endif

                                {{ $resident->name }}
                            </td>
                            <td>{{ Str::words($resident->address, 20) }}</td>

                            <td class="d-flex gap-2">
                                <a href="{{ route('resident.edit', $resident) }}" class="btn btn-info">Update</a>

                                <form action="{{ route('resident.destroy', $resident) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach

                </table>
            </div>
        </div>

        {{ $residents->links() }}
    </div>
@endsection
