@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row col-10 mx-auto d-flex flex-column align-items-center" style="border: 1px solid black">
            <div class="d-flex flex-row justify-content-between mb-3">
                <h2>{{ $title }}</h2>
                <a href="{{ route('resident.create') }}" class="btn btn-success text-center">Add New Resident</a>
            </div>

            <div class="table-responsive">
                <table class="table table-borderless">
                    <tr class="border-bottom">
                        <th>Name</th>
                        <th class="text-center" style="border: 1px solid black">Action</th>
                    </tr>
                    <tbody>
                    @foreach ($residents as $resident)
                        <tr class="border-bottom mx-auto justify-content-between align-items-center">
                            <td class="w-100">
                                @if ($resident->image !== '')
                                    <img src="{{ asset('storage/' .$resident->image) }}" alt="resident-img" width="50px" height="50px" class="rounded-circle">
                                @endif

                                {{ $resident->name }}
                            </td>

                            <td class="w-100 d-flex justify-content-end align-items-center gap-2">
                                <a href="{{ route('resident.edit', $resident) }}" class="btn btn-info d-block">Update</a>

                                <form action="{{ route('resident.destroy', $resident) }}" method="POST" class="align-items-center">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                </table>
            </div>
        </div>

        {{ $residents->links() }}
    </div>
@endsection
