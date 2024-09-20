<x-app-layout>
    <div class="container">
        <div class="row col-10 mx-auto d-flex flex-column align-items-center" >
            <div class="d-flex flex-row justify-content-between mb-3">
            <h2>{{ __('Resident List') }}</h2>
                <a href="{{ route('resident.create') }}" class="btn btn-success text-center">Add New Resident</a>
                <a href="{{ route('resident.create') }}" id="reverse" class="btn btn-success text-center"></a>
            </div>

            <div class="table-responsive">
                <table class="table table-borderless">
                    <tr class="border-bottom">
                        <th>Name</th>
                        <th class="text-center">Action</th>
                    </tr>
                    <tbody>

                    @forelse ($residents as $resident)
                        <tr class="border-bottom mx-auto justify-content-between align-items-center">
                            <td class="w-100">

                                @if ($resident->image !== '')
                                    <img src="{{ asset('storage/' .$resident->image) }}" alt="resident-img" width="50px" height="50px" class="rounded-circle">
                                @endif

                                {{ $resident->lastname . ', ' . $resident->firstname . ($resident->midname ? ' ' . $resident->midname : '') . $resident->suffix ? ' ' . $resident->suffix : ''}}
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
                     @empty

                     <tr>No Records Found</tr>
                    @endforelse
                </tbody>
                </table>
            </div>
            {{ $residents->links() }}
        </div>
    </div>

</x-app-layout>
