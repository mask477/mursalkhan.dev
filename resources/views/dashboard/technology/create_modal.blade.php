<!-- Modal -->

<form action="{{ route('technology.store') }}" method="POST">
    @csrf
    <input type="hidden" name="action" value="create" />

    <div class="modal fade" id="createTechnologyModal" tabindex="-1" aria-labelledby="createTechnologyModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="createTechnologyModalLabel">Create Technology</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="name" class="form-label">Name:</label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                            id="name" placeholder="Project Name" value="{{ old('name') }}" required />
                        @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="desscription" class="form-label">Description</label>
                        <textarea class="form-control @error('description') is-invalid @enderror" name="description"
                            id="description" rows="2" required>{{ old('description') }}</textarea>

                        @error('description')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
</form>

@push('scripts')
<script>
    const createTechnologyModal = new bootstrap.Modal('#createTechnologyModal');

    @if ($errors->any() && old('action') == 'create')
    createTechnologyModal.show();
    @endif
</script>
@endpush