@extends('frontend.layout.app')
@section('content')
@include('frontend.layout.nav')
 <section class="track-page-top" style="@if($card->image) background-image: url('{{ asset('uploads/trackRecord/' . $card->image) }}'); background-position: center; @endif">
      <div class="overlay">
        <div class="container pt-5 d-flex align-items-end">
          <p><span>T</span>rack Record of Scrap Ship Import</p>
        </div>
      </div>
    </section>
    <!-- page top View end -->
@include('frontend.track-cards.card')

@php
  $vesselTabLabels = [1 => 'BOB Vessels', 2 => 'MSRL Vessels'];
@endphp

<section class="my-5 body track-title">
    <div class="container">
      <div class="track-vessels-tabs">
        <ul class="nav nav-tabs track-vessel-nav" id="vesselTabs" role="tablist">
          @foreach($trackSections as $section)
          <li class="nav-item" role="presentation">
            <button
              class="nav-link {{ $loop->first ? 'active' : '' }}"
              id="track-tab-btn-{{ $section->id }}"
              data-bs-toggle="tab"
              data-bs-target="#track-tab-{{ $section->id }}"
              type="button"
              role="tab"
              aria-controls="track-tab-{{ $section->id }}"
              aria-selected="{{ $loop->first ? 'true' : 'false' }}">
              {{ $vesselTabLabels[$section->position] ?? $section->title }}
              <span class="track-tab-count">{{ $section->items->count() }}</span>
            </button>
          </li>
          @endforeach
        </ul>

        <div class="tab-content track-section-box rounded-4 shadow-sm" id="vesselTabsContent">
          @foreach($trackSections as $section)
          <div
            class="tab-pane fade {{ $loop->first ? 'show active' : '' }}"
            id="track-tab-{{ $section->id }}"
            role="tabpanel"
            aria-labelledby="track-tab-btn-{{ $section->id }}"
            tabindex="0">
            <div class="p-4">
              <h4 class="track-tab-heading mb-1">{{ $section->title }}</h4>
              <p class="text-muted small mb-4">Click a vessel name to view details.</p>

              @if($section->items->isNotEmpty())
                <ul class="track-section-list mb-0 ps-3">
                  @foreach($section->items as $item)
                  <li class="mb-2">
                    <a href="#"
                       class="track-item-link"
                       data-bs-toggle="modal"
                       data-bs-target="#trackItemModal"
                       data-item-id="{{ $item->id }}"
                       data-title="{{ e($item->title) }}"
                       data-photo="{{ $item->photo ? asset('uploads/trackSection/' . $item->photo) : '' }}">
                      {{ $item->title }}
                    </a>
                  </li>
                  @endforeach
                </ul>
              @else
                <p class="text-muted mb-0">No items available.</p>
              @endif
            </div>
          </div>
          @endforeach
        </div>
      </div>
    </div>
</section>

@foreach($trackSections as $section)
  @foreach($section->items as $item)
    <div id="track-item-desc-{{ $item->id }}" class="d-none track-item-desc-source">
      {!! $item->short_description !!}
    </div>
  @endforeach
@endforeach

@push('styles')
<style>
  .track-vessel-nav {
    border-bottom: 2px solid #e8ece9;
    gap: 0.5rem;
  }

  .track-vessel-nav .nav-link {
    color: #0d392e !important;
    font-weight: 600;
    border: none;
    border-bottom: 3px solid transparent;
    border-radius: 0.5rem 0.5rem 0 0;
    padding: 0.75rem 1.25rem;
    background: transparent;
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
  }

  .track-vessel-nav .nav-link:hover {
    color: #4a9e70 !important;
    border-bottom-color: #c5e0d0;
  }

  .track-vessel-nav .nav-link.active {
    color: #0d392e !important;
    background: #fff;
    border-bottom-color: #4a9e70;
  }

  .track-tab-count {
    display: inline-block;
    min-width: 1.5rem;
    padding: 0.1rem 0.45rem;
    font-size: 0.75rem;
    font-weight: 700;
    line-height: 1.2;
    color: #fff;
    background: #4a9e70;
    border-radius: 999px;
    text-align: center;
  }

  .track-vessel-nav .nav-link:not(.active) .track-tab-count {
    background: #9bb8a8;
  }

  .track-tab-heading {
    font-weight: 700;
    color: #0d392e;
  }

  .track-section-list {
    list-style-type: disc;
  }

  .track-section-box .track-item-link {
    color: #0d392e !important;
    text-decoration: none !important;
    font-weight: 500;
    transition: color 0.2s;
  }

  .track-section-box .track-item-link:hover {
    color: #4a9e70 !important;
    text-decoration: underline !important;
  }

  .track-section-box {
    background: #fff;
    border: 1px solid #e8ece9;
    border-top: none;
    border-radius: 0 1rem 1rem 1rem !important;
  }

  .track-vessels-tabs .tab-pane {
    max-height: 70vh;
    overflow-y: auto;
  }

  .modal-backdrop.show {
    opacity: 0.55;
  }

  #trackItemModal .modal-dialog {
    max-height: calc(100vh - 2rem);
    margin: 1rem auto;
  }

  #trackItemModal .modal-content {
    max-height: calc(100vh - 2rem);
    display: flex;
    flex-direction: column;
    overflow: hidden;
  }

  #trackItemModal .modal-header {
    flex-shrink: 0;
  }

  #trackItemModal .modal-body {
    overflow-y: auto;
    overscroll-behavior: contain;
    -webkit-overflow-scrolling: touch;
  }

  #trackItemModal .modal-body img {
    max-height: min(60vh, 480px);
    width: auto;
    object-fit: contain;
  }

  .track-modal-description strong,
  .track-modal-description b {
    font-weight: 700;
  }

  @media (max-width: 576px) {
    .track-vessel-nav .nav-link {
      padding: 0.6rem 0.75rem;
      font-size: 0.9rem;
    }
  }
</style>
@endpush

@push('modals')
<div class="modal fade" id="trackItemModal" tabindex="-1" aria-labelledby="trackItemModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header border-bottom">
        <h5 class="modal-title fw-bold text-dark" id="trackItemModalLabel"></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body text-center">
        <img id="trackItemModalPhoto" src="" alt="" class="img-fluid rounded mb-3 d-none mx-auto d-block">
        <div id="trackItemModalDescription" class="text-start mb-0 text-dark track-modal-description" style="line-height: 1.8;"></div>
      </div>
    </div>
  </div>
</div>
@endpush

@push('scripts')
<script>
  document.addEventListener('DOMContentLoaded', function () {
    const modalEl = document.getElementById('trackItemModal');
    if (!modalEl) return;

    let lockedScrollY = 0;

    function lockBackgroundScroll() {
      lockedScrollY = window.scrollY;
      window.scrollTo(0, lockedScrollY);
    }

    modalEl.addEventListener('show.bs.modal', lockBackgroundScroll);
    modalEl.addEventListener('shown.bs.modal', function () {
      lockBackgroundScroll();
      modalEl._scrollLock = function () {
        if (modalEl.classList.contains('show')) {
          window.scrollTo(0, lockedScrollY);
        }
      };
      window.addEventListener('scroll', modalEl._scrollLock);
    });

    modalEl.addEventListener('hidden.bs.modal', function () {
      if (modalEl._scrollLock) {
        window.removeEventListener('scroll', modalEl._scrollLock);
        modalEl._scrollLock = null;
      }
    });

    modalEl.addEventListener('show.bs.modal', function (event) {
      const link = event.relatedTarget;
      if (!link) return;

      const title = link.getAttribute('data-title') || '';
      const itemId = link.getAttribute('data-item-id');
      const photo = link.getAttribute('data-photo') || '';
      const descSource = itemId ? document.getElementById('track-item-desc-' + itemId) : null;

      modalEl.querySelector('#trackItemModalLabel').textContent = title;
      modalEl.querySelector('#trackItemModalDescription').innerHTML = descSource ? descSource.innerHTML : '';

      const photoEl = modalEl.querySelector('#trackItemModalPhoto');
      if (photo) {
        photoEl.src = photo;
        photoEl.alt = title;
        photoEl.classList.remove('d-none');
      } else {
        photoEl.src = '';
        photoEl.classList.add('d-none');
      }

      modalEl.querySelector('.modal-body').scrollTop = 0;
    });
  });
</script>
@endpush

@include('frontend.layout.footer')
@endsection('content')
