@extends('layouts.app')

@section('content')
<style>
    body {
        background-color: #f8f9fa;
    }

    .form-wrapper {
        max-width: 800px;
        margin: auto;
        background: white;
        padding: 30px;
        border-radius: 12px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);
    }
</style>

<div class="container mt-5">
    <div class="form-wrapper">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="mb-0">Edit Application</h2>
            <a href="{{ route('application.index') }}" class="btn btn-warning">Back to List</a>
        </div>

        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Whoops!</strong> Please fix the following errors:
                <ul class="mb-0 mt-2">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('application.update', $application->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="row">
                <div class="col-md-4 mb-3">
                    <label class="form-label">Name</label>
                    <input type="text" name="name" class="form-control"
                        value="{{ old('name', $application->name) }}">
                </div>

                <div class="col-md-4 mb-3">
                    <label class="form-label">Job Type</label>
                    <select name="job_type" class="form-control">
                        <option value="">Select</option>
                        <option value="Fulltime" {{ $application->job_type == 'Fulltime' ? 'selected' : '' }}>Fulltime</option>
                        <option value="Parttime" {{ $application->job_type == 'Parttime' ? 'selected' : '' }}>Parttime</option>
                        <option value="Consulting" {{ $application->job_type == 'Consulting' ? 'selected' : '' }}>Consulting</option>
                    </select>
                </div>

                <div class="col-md-4 mb-3">
                    <label class="form-label">Job Category</label>
                    <select name="job_category" class="form-control">
                        <option value="">Select</option>
                        <option value="Backend" {{ $application->job_category == 'Backend' ? 'selected' : '' }}>Backend</option>
                        <option value="Frontend" {{ $application->job_category == 'Frontend' ? 'selected' : '' }}>Frontend</option>
                        <option value="UI-UX" {{ $application->job_category == 'UI-UX' ? 'selected' : '' }}>UI/UX</option>
                        <option value="SEO" {{ $application->job_category == 'SEO' ? 'selected' : '' }}>SEO</option>
                    </select>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Experience (Years)</label>
                    <input type="number" name="experience" class="form-control" min="0"
                        value="{{ old('experience', $application->experience) }}">
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Notice Period (Days)</label>
                    <input type="number" name="notice_period" class="form-control" min="0"
                        value="{{ old('notice_period', $application->notice_period) }}">
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label">Job Description</label>
                <textarea name="job_description" class="form-control" rows="4">{{ old('job_description', $application->job_description) }}</textarea>
            </div>

            <div class="text-end">
                <button type="submit" class="btn btn-primary px-4">Update</button>
            </div>
        </form>
    </div>
</div>
@endsection
