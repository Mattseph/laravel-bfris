<x-app-layout>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-8">
                <div class="card">
                    <div class="card-header">Create Resident</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('resident.store') }}" enctype="multipart/form-data">
                            @csrf

                            <p>create resident</p>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
