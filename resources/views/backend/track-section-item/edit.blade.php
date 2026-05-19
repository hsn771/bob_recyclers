@extends('backend.layout.app')
@section('content')
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Edit Track Section Item</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('track-section.index') }}">Track Sections</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit Item</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <div class="page-content">
        <section class="section">
            <div class="card">
                <div class="card-body">
                    <form id="trackSectionItemForm" action="{{ route('track-section-item.update', encryptor('encrypt', $item->id)) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="track_section_id">Section</label>
                            <select name="track_section_id" id="track_section_id" class="form-control" required>
                                @foreach ($sections as $section)
                                    <option value="{{ $section->id }}" {{ old('track_section_id', $item->track_section_id) == $section->id ? 'selected' : '' }}>
                                        {{ $section->title }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="title">Bullet Title (link text)</label>
                            <input type="text" name="title" id="title" class="form-control" value="{{ old('title', $item->title) }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="short_description">Short Description (modal)</label>
                            <textarea name="short_description" id="short_description" class="form-control" cols="30" rows="8">{{ old('short_description', $item->short_description) }}</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="photo">Photo (modal)</label>
                            <input type="file" name="photo" id="photo" class="form-control" accept="image/*">
                            @if ($item->photo)
                                <img src="{{ asset('uploads/trackSection/' . $item->photo) }}" width="100" class="mt-2 rounded" alt="">
                            @endif
                        </div>
                        <div class="mb-3">
                            <label for="sort_order">Sort Order</label>
                            <input type="number" name="sort_order" id="sort_order" class="form-control" value="{{ old('sort_order', $item->sort_order) }}" min="0">
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                        <a href="{{ route('track-section.index') }}" class="btn btn-secondary">Cancel</a>
                    </form>
                </div>
            </div>
        </section>
    </div>
</div>
@endsection
@push('styles')
<style>
  .tox-tinymce .tox-edit-area__iframe {
    pointer-events: auto !important;
  }
</style>
@endpush
@push('scripts')
<script src="{{ asset('assets/tinymc.js') }}"></script>
<script>
  tinymce.init({
    selector: '#short_description',
    height: 320,
    plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount checklist mediaembed casechange export formatpainter pageembed linkchecker tinymcespellchecker permanentpen powerpaste advtable advcode editimage advtemplate mentions tinycomments tableofcontents footnotes mergetags autocorrect typography inlinecss',
    toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | align lineheight | numlist bullist indent outdent | removeformat',
    menubar: 'file edit view insert format tools table',
    font_size_formats: '8pt 10pt 12pt 14pt 16pt 18pt 24pt 36pt',
    promotion: false,
    setup: function (editor) {
      editor.on('change keyup', function () {
        editor.save();
      });
    },
    init_instance_callback: function (editor) {
      editor.mode.set('design');
    },
  });

  document.getElementById('trackSectionItemForm').addEventListener('submit', function () {
    tinymce.triggerSave();
  });
</script>
@endpush
