<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Apply Now</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
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
</head>

<body>
    <div class="container mt-5">
        <div class="form-wrapper">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2 class="mb-0">Application Form</h2>
                <a href="{{ route('application.index') }}" class="btn btn-warning">See Application</a>
            </div>

            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <form method="POST" action="{{ route('application.store') }}">
                @csrf

                <div class="row">
                    <div class="col-md-4 mb-3">
                        <label for="name">Name:</label>
                        <input type="text" name="name" pattern="[A-Za-z\s]+" title="Number in name field is not allowed"
                            class="form-control" value="{{ old('name') }}">
                        @error('name')
                            <span class="text-danger small">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="col-md-4 mb-3">
                        <label class="form-label">Job Type</label>
                        <select name="job_type" class="form-control">
                            <option value="">Select</option>
                            <option value="Fulltime">Fulltime</option>
                            <option value="Parttime">Parttime</option>
                            <option value="Consulting">Consulting</option>
                        </select>
                        @error('job_type')
                            <span class="text-danger small">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="col-md-4 mb-3">
                        <label class="form-label">Job Category</label>
                        <select name="job_category" class="form-control">
                            <option value="">Select</option>
                            <option value="Backend">Backend</option>
                            <option value="Frontend">Frontend</option>
                            <option value="UI-UX">UI/UX</option>
                            <option value="SEO">SEO</option>
                        </select>
                        @error('job_category')
                            <span class="text-danger small">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Experience (years)</label>
                        <input type="number" name="experience" class="form-control" value="{{ old('experience') }}">
                        @error('experience')
                            <span class="text-danger small">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Notice Period (days)</label>
                        <input type="number" name="notice_period" class="form-control"
                            value="{{ old('notice_period') }}">
                        @error('notice_period')
                            <span class="text-danger small">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label">Job Description</label>
                    <textarea name="job_description" class="form-control" rows="4">{{ old('job_description') }}</textarea>
                    @error('job_description')
                        <span class="text-danger small">{{ $message }}</span>
                    @enderror
                </div>

                <div class="text-end">
                    <button class="btn btn-primary px-4">Submit</button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>
