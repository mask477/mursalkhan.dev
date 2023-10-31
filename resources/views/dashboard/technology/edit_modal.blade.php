<!-- Modal -->

<form action="" method="POST" id="editTechnologyForm">
    @csrf
    @method('patch')
    <input type="hidden" name="action" value="edit" />

    <div class="modal fade" id="editTechnologyModal" tabindex="-1" aria-labelledby="editTechnologyModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="editTechnologyModalLabel">Create Technology</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="editName" class="form-label">Name:</label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                            id="editName" placeholder="Project Name" value="{{ old('name') }}" />
                        @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="editDescription" class="form-label">Description</label>
                        <textarea class="form-control @error('description') is-invalid @enderror" name="description"
                            id="editDescription" rows="2">{{ old('description') }}</textarea>

                        @error('description')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button class="btn btn-primary">Update</button>
                </div>
            </div>
        </div>
    </div>
</form>

@push('scripts')
<script>
    const editTechnologyModal = new bootstrap.Modal('#editTechnologyModal');

    document.getElementById('editTechnologyModal').addEventListener('hidden.bs.modal', function (e) {
        $('#editTechnologyForm').attr('action', ``);
    });

    $('.btn-edit-technology').click(function () {
        const technology = $(this).data('technology');

        $('#editName').val(technology.name);
        $('textarea#editDescription').val(technology.description);
        $('#editTechnologyForm').attr('action', `technology/${technology.id}`);
        editTechnologyModal.show();
    });

    @if ($errors->any() && old('action') == 'edit')
    editTechnologyModal.show();
    @endif
</script>
@endpush