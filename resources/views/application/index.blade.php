@extends('layouts.app')

@section('title', 'All Applications')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h2>All Applications</h2>
    <a href="{{ route('application.create') }}" class="btn btn-success">Apply Here</a>
</div>

@if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<form id="filterForm" method="GET" class="row g-3 mb-4">
    <div class="col-md-3">
        <input type="text" name="search" id="searchInput" class="form-control" placeholder="Search Name"
            value="{{ request('search') }}">
    </div>
    <div class="col-md-3">
        <select name="job_type" id="typeSelect" class="form-control">
            <option value="">All Types</option>
            <option value="Fulltime">Fulltime</option>
            <option value="Parttime">Parttime</option>
            <option value="Consulting">Consulting</option>
        </select>
    </div>
    <div class="col-md-3">
        <select name="job_category" id="categorySelect" class="form-control">
            <option value="">All Categories</option>
            <option value="Backend">Backend</option>
            <option value="Frontend">Frontend</option>
            <option value="UI-UX">UI-UX</option>
            <option value="SEO">SEO</option>
        </select>
    </div>
</form>

<div id="tableContainer">
    @include('application.partials.table')
</div>

{{-- Centered Pagination Styling --}}
<style>
    .pagination-wrapper {
        display: flex;
        justify-content: center;
        margin-top: 30px;
        margin-bottom: 20px;
    }
</style>
@endsection

@push('scripts')
<script>
    function fetchFilteredData(page = 1) {
        const search = $('#searchInput').val();
        const job_type = $('#typeSelect').val();
        const job_category = $('#categorySelect').val();

        $.ajax({
            url: "{{ route('application.index') }}" + "?page=" + page,
            type: 'GET',
            data: {
                search,
                job_type,
                job_category,
            },
            success: function (response) {
                $('#tableContainer').html(response);
            },
            error: function () {
                alert('Something went wrong!');
            }
        });
    }

    $('#searchInput, #typeSelect, #categorySelect').on('input change', function () {
        fetchFilteredData();
    });

    $(document).on('click', '.pagination a', function (e) {
        e.preventDefault();
        const page = $(this).attr('href').split('page=')[1];
        fetchFilteredData(page);
    });
</script>
@endpush
