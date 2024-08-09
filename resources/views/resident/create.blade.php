@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-8">
                <div class="card">
                    <div class="card-header">Create Resident</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('resident.store') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="d-flex flex-column gap-2">
                                <div class="input-group d-flex flex-row flex-wrap">
                                    <label for="name" class="form-label">Name</label>
                                    <input type="text" name="name" id="name" class="w-100 form-control"
                                        value="{{ old('name') }}" required>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="input-group d-flex flex-column">
                                    <label for="address" class="form-label">Address</label>
                                    <input type="text" name="address" id="address" class="w-100 form-control"
                                        value="{{ old('address') }}" required>

                                    @error('address')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="input-group d-flex flex-column">
                                    <label for="nationality" class="form-label">Nationality</label>
                                    <input type="text" name="nationality" id="nationality" class="w-100 form-control"
                                        value="{{ old('nationality') }}" required>

                                    @error('nationality')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="input-group d-flex flex-column">
                                    <label for="image" class="form-label">Image</label>
                                    <input type="file" name="image" id="image" class="w-100 form-control"
                                        value="{{ old('image') }}" required>

                                    @error('image')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row justify-content-end m-1 mt-3">
                                <button name="submit" class="btn btn-success w-25">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
