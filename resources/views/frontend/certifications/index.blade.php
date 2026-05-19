@extends('frontend.layout.app')
@section('title', 'Certifications | MSRL - Green Ship Recycling')
@section('description', 'View our industry certifications and compliance documents. Mahinur Ship Recycling Limited (MSRL) - HKC-compliant green ship recycling in Bangladesh.')

@push('styles')
  <link rel="stylesheet" href="{{ asset('asset/css/about/about.css') }}">
  <link rel="stylesheet" href="{{ asset('asset/css/certifications/certifications.css') }}">
@endpush

@section('content')
  @include('frontend.layout.nav')

  <section class="certifications-page-top about-page-top"
    style="@if($settings && $settings->banner_image) background-image: url('{{ asset('uploads/certifications/' . $settings->banner_image) }}'); @else background-image: url('{{ asset('frontend/images/banner.jpg') }}'); @endif">
    <div class="overlay">
      <div class="container pt-5 d-flex align-items-end">
        <p><span>C</span>ertifications</p>
      </div>
    </div>
  </section>

  <section class="certificates-section">
    <div class="container">
      <div class="cert-section-head">
        <span class="cert-eyebrow">Compliance &amp; Standards</span>
        <h2>Our Certifications</h2>
        @if($settings && $settings->intro_text)
          <p class="cert-intro">{!! nl2br(e($settings->intro_text)) !!}</p>
        @else
          <p class="cert-intro">Official certificates and compliance documents demonstrating our commitment to safe, responsible green ship recycling.</p>
        @endif
      </div>

      @if($certificates->count())
        <div class="cert-grid">
          @foreach($certificates as $cert)
            @php $pdfUrl = asset('uploads/certifications/' . $cert->pdf); @endphp
            <article class="cert-card">
              <div class="cert-card-visual">
                <span class="cert-badge">Verified</span>
                <div class="cert-pdf-preview">
                  <i class="fas fa-file-pdf" aria-hidden="true"></i>
                  <span>PDF</span>
                </div>
              </div>
              <div class="cert-card-content">
                <h3 class="cert-card-title">{{ $cert->title }}</h3>
                @if($cert->description)
                  <p class="cert-card-desc">{{ $cert->description }}</p>
                @endif
                <div class="cert-card-actions">
                  <button type="button" class="cert-action-btn cert-action-primary" data-bs-toggle="modal"
                    data-bs-target="#pdfModal" data-pdf="{{ $pdfUrl }}" data-title="{{ $cert->title }}">
                    <i class="fas fa-eye" aria-hidden="true"></i>
                    <span>View Certificate</span>
                  </button>
                  <a href="{{ $pdfUrl }}" class="cert-action-btn cert-action-secondary" download
                    target="_blank" rel="noopener">
                    <i class="fas fa-download" aria-hidden="true"></i>
                    <span>Download PDF</span>
                  </a>
                </div>
              </div>
            </article>
          @endforeach
        </div>
      @else
        <div class="cert-empty">
          <div class="cert-empty-icon">
            <i class="fas fa-certificate" aria-hidden="true"></i>
          </div>
          <h5>Certificates coming soon</h5>
          <p>Our certification documents will be published here shortly.</p>
        </div>
      @endif
    </div>
  </section>

  <div class="modal fade cert-modal" id="pdfModal" tabindex="-1" aria-labelledby="pdfModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="pdfModalLabel">Certificate</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body p-0">
          <iframe id="pdfFrame" src="" title="Certificate PDF"></iframe>
        </div>
      </div>
    </div>
  </div>

  @include('frontend.layout.footer')

  <script>
    document.getElementById('pdfModal')?.addEventListener('show.bs.modal', function (event) {
      const button = event.relatedTarget;
      document.getElementById('pdfModalLabel').textContent = button.getAttribute('data-title') || 'Certificate';
      document.getElementById('pdfFrame').src = button.getAttribute('data-pdf');
    });
    document.getElementById('pdfModal')?.addEventListener('hidden.bs.modal', function () {
      document.getElementById('pdfFrame').src = '';
    });
  </script>
@endsection

