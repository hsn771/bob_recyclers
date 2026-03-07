@extends('backend.layout.app')
@section('pageTitle', 'Add Blog')
@section('content')
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Add New Blog</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.blog.index') }}">Blogs</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Add New</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <section class="section">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('admin.blog.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="mb-3">
                                        <label class="form-label fw-semibold">Title <span
                                                class="text-danger">*</span></label>
                                        <input type="text" name="title"
                                            class="form-control @error('title') is-invalid @enderror"
                                            value="{{ old('title') }}" required>
                                        @error('title') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label fw-semibold">Short Description</label>
                                        <textarea name="short_description" class="form-control"
                                            rows="3">{{ old('short_description') }}</textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label fw-semibold">Content</label>
                                        <!-- Quill Editor Container -->
                                        <div id="quill-editor" style="height: 320px; background: #fff;"></div>
                                        <!-- Hidden textarea to submit content -->
                                        <textarea name="content" id="blog-content"
                                            style="display:none;">{{ old('content') }}</textarea>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label fw-semibold">Category</label>
                                        <input type="text" name="category" class="form-control"
                                            value="{{ old('category') }}" placeholder="e.g. News, Update...">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label fw-semibold">Published Date</label>
                                        <input type="date" name="published_at" class="form-control"
                                            value="{{ old('published_at', date('Y-m-d')) }}">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label fw-semibold">Status <span
                                                class="text-danger">*</span></label>
                                        <select name="status" class="form-select @error('status') is-invalid @enderror"
                                            required>
                                            <option value="1" {{ old('status') == 1 ? 'selected' : '' }}>Active</option>
                                            <option value="0" {{ old('status') == 0 ? 'selected' : '' }}>Inactive</option>
                                        </select>
                                        @error('status') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label fw-semibold">Featured Image</label>
                                        <input type="file" name="image" class="form-control" accept="image/*"
                                            onchange="previewImage(this)">
                                        <div class="mt-2">
                                            <img id="imgPreview" src="#" alt="Preview"
                                                style="display:none; max-width:100%; border-radius:6px; border:1px solid #dee2e6;">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-3">
                                <button type="submit" class="btn btn-primary me-2">
                                    <i class="bi bi-save me-1"></i> Save Blog
                                </button>
                                <a href="{{ route('admin.blog.index') }}" class="btn btn-secondary">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('styles')
    <link href="https://cdn.quilljs.com/1.3.7/quill.snow.css" rel="stylesheet">
@endpush

@push('scripts')
    <script src="https://cdn.quilljs.com/1.3.7/quill.min.js"></script>
    <script>
        function previewImage(input) {
            const preview = document.getElementById('imgPreview');
            if (input.files && input.files[0]) {
                const reader = new FileReader();
                reader.onload = e => { preview.src = e.target.result; preview.style.display = 'block'; };
                reader.readAsDataURL(input.files[0]);
            }
        }

        var quill = new Quill('#quill-editor', {
            theme: 'snow',
            modules: {
                toolbar: [
                    [{ 'header': [1, 2, 3, false] }],
                    ['bold', 'italic', 'underline', 'strike'],
                    [{ 'list': 'ordered' }, { 'list': 'bullet' }],
                    ['link', 'image'],
                    ['blockquote', 'code-block'],
                    ['clean']
                ]
            },
            placeholder: 'Write your blog content here...'
        });

        // Pre-fill content if old() value exists
        var existingContent = document.getElementById('blog-content').value;
        if (existingContent) {
            quill.clipboard.dangerouslyPasteHTML(existingContent);
        }

        // On form submit, sync Quill content to hidden textarea
        document.querySelector('form').addEventListener('submit', function () {
            document.getElementById('blog-content').value = quill.root.innerHTML;
        });
    </script>
@endpush