<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>Name</th>
            <th>Type</th>
            <th>Department</th>
            <th>Exp</th>
            <th>Notice</th>
            <th>Description</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @forelse($applications as $app)
            <tr>
                <td>{{ $app->name }}</td>
                <td>{{ $app->job_type }}</td>
                <td>{{ $app->job_category }}</td>
                <td>{{ $app->experience }}</td>
                <td>{{ $app->notice_period }}</td>
                <td>{{ \Illuminate\Support\Str::limit($app->job_description, 30) }}</td>
                <td class="d-flex gap-1">
                    <a href="{{ route('application.edit', $app->id) }}" class="btn btn-sm btn-info">Edit</a>
                    <form action="{{ route('application.destroy', $app->id) }}" method="POST" class="delete-form">
                        @csrf
                        @method('DELETE')
                        <button type="button" class="btn btn-sm btn-danger delete-btn"
                            data-id="{{ $app->id }}">Delete</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="7">No applications found</td>
            </tr>
        @endforelse
    </tbody>
</table>

@if ($applications->hasPages())
    <div class="d-flex justify-content-center mt-4">
        {{ $applications->links() }}
    </div>
@endif

@push('scripts')
<script>
    $(document).on('click', '.delete-btn', function (e) {
        e.preventDefault();
        let button = $(this);
        let form = button.closest('form');

        Swal.fire({
            title: 'Are you sure?',
            text: "This action cannot be undone!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                form.submit();
            }
        });
    });
</script>
@endpush

