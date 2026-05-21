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
              <div class="track-tab-header d-flex flex-wrap align-items-end justify-content-between gap-3 mb-4">
                <div>
                  <h4 class="track-tab-heading mb-1">{{ $section->title }}</h4>
                  <p class="text-muted small mb-0">Click a vessel to view details.</p>
                </div>
                @if($section->items->isNotEmpty())
                <div class="track-vessel-search-wrap">
                  <i class="fas fa-search track-vessel-search-icon" aria-hidden="true"></i>
                  <input
                    type="search"
                    class="track-vessel-search form-control"
                    placeholder="Search vessels..."
                    aria-label="Search vessels in {{ $section->title }}"
                    data-vessel-search="{{ $section->id }}">
                </div>
                @endif
              </div>

              @if($section->items->isNotEmpty())
                <div class="track-vessel-grid" data-vessel-grid="{{ $section->id }}">
                  @foreach($section->items as $item)
                  <a href="#"
                     class="track-vessel-card track-item-link"
                     data-bs-toggle="modal"
                     data-bs-target="#trackItemModal"
                     data-item-id="{{ $item->id }}"
                     data-title="{{ e($item->title) }}"
                     data-photo="{{ $item->photo ? asset('uploads/trackSection/' . $item->photo) : '' }}"
                     data-search="{{ strtolower($item->title) }}">
                    <span class="track-vessel-card-icon" aria-hidden="true">
                      <i class="fas fa-ship"></i>
                    </span>
                    <span class="track-vessel-card-name">{{ $item->title }}</span>
                    <span class="track-vessel-card-arrow" aria-hidden="true">
                      <i class="fas fa-arrow-right"></i>
                    </span>
                  </a>
                  @endforeach
                </div>
                <p class="track-vessel-no-results text-muted small mb-3 d-none" data-vessel-empty="{{ $section->id }}">
                  No vessels match your search.
                </p>
                <div class="track-vessel-footer d-flex flex-wrap align-items-center justify-content-between gap-3" data-vessel-footer="{{ $section->id }}">
                  <p class="track-vessel-summary text-muted small mb-0" data-vessel-summary="{{ $section->id }}"></p>
                  <nav class="track-vessel-pagination d-none" data-vessel-pagination="{{ $section->id }}" aria-label="Vessel pages for {{ $section->title }}"></nav>
                </div>
              @else
                <div class="track-vessel-empty-state text-center py-5">
                  <i class="fas fa-anchor fa-2x text-muted mb-3"></i>
                  <p class="text-muted mb-0">No vessels listed yet.</p>
                </div>
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

  .track-section-box {
    background: #fff;
    border: 1px solid #e8ece9;
    border-top: none;
    border-radius: 0 1rem 1rem 1rem !important;
  }

  .track-vessel-search-wrap {
    position: relative;
    min-width: min(100%, 260px);
  }

  .track-vessel-search-icon {
    position: absolute;
    left: 0.85rem;
    top: 50%;
    transform: translateY(-50%);
    color: #9bb8a8;
    font-size: 0.85rem;
    pointer-events: none;
  }

  .track-vessel-search {
    padding-left: 2.25rem;
    border: 1px solid #e8ece9;
    border-radius: 999px;
    font-size: 0.9rem;
    color: #0d392e;
    background: #f8faf9;
    transition: border-color 0.2s, box-shadow 0.2s;
  }

  .track-vessel-search:focus {
    border-color: #4a9e70;
    box-shadow: 0 0 0 0.2rem rgba(74, 158, 112, 0.15);
    background: #fff;
  }

  .track-vessel-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(260px, 1fr));
    gap: 0.85rem;
  }

  .track-vessel-card {
    display: flex;
    align-items: center;
    gap: 0.75rem;
    padding: 0.9rem 1rem;
    background: linear-gradient(135deg, #f8faf9 0%, #fff 100%);
    border: 1px solid #e8ece9;
    border-radius: 0.75rem;
    color: #0d392e !important;
    text-decoration: none !important;
    font-weight: 500;
    transition: border-color 0.2s, box-shadow 0.2s, transform 0.2s;
  }

  .track-vessel-card:hover,
  .track-vessel-card:focus-visible {
    border-color: #4a9e70;
    box-shadow: 0 6px 18px rgba(74, 158, 112, 0.18);
    transform: translateY(-2px);
    color: #0d392e !important;
    outline: none;
  }

  .track-vessel-card-icon {
    flex-shrink: 0;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    width: 2.25rem;
    height: 2.25rem;
    border-radius: 0.5rem;
    background: rgba(74, 158, 112, 0.12);
    color: #4a9e70;
    font-size: 0.95rem;
  }

  .track-vessel-card-name {
    flex: 1;
    min-width: 0;
    line-height: 1.35;
    word-break: break-word;
  }

  .track-vessel-card-arrow {
    flex-shrink: 0;
    color: #9bb8a8;
    font-size: 0.75rem;
    transition: transform 0.2s, color 0.2s;
  }

  .track-vessel-card:hover .track-vessel-card-arrow,
  .track-vessel-card:focus-visible .track-vessel-card-arrow {
    color: #4a9e70;
    transform: translateX(3px);
  }

  .track-vessel-empty-state {
    background: #f8faf9;
    border: 1px dashed #d8e4dd;
    border-radius: 0.75rem;
  }

  .track-vessel-footer {
    padding-top: 0.25rem;
    border-top: 1px solid #eef2ef;
  }

  .track-vessel-pagination {
    display: flex;
    align-items: center;
    gap: 0.35rem;
    flex-wrap: wrap;
  }

  .track-vessel-page-btn {
    min-width: 2.1rem;
    height: 2.1rem;
    padding: 0 0.5rem;
    border: 1px solid #e8ece9;
    border-radius: 0.5rem;
    background: #fff;
    color: #0d392e;
    font-size: 0.85rem;
    font-weight: 600;
    line-height: 1;
    cursor: pointer;
    transition: border-color 0.2s, background 0.2s, color 0.2s;
  }

  .track-vessel-page-btn:hover:not(:disabled):not(.active) {
    border-color: #4a9e70;
    color: #4a9e70;
  }

  .track-vessel-page-btn.active {
    background: #4a9e70;
    border-color: #4a9e70;
    color: #fff;
  }

  .track-vessel-page-btn:disabled {
    opacity: 0.45;
    cursor: not-allowed;
  }

  .track-vessel-page-ellipsis {
    color: #9bb8a8;
    font-size: 0.85rem;
    padding: 0 0.15rem;
    user-select: none;
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

    .track-vessel-grid {
      grid-template-columns: 1fr;
    }

    .track-tab-header {
      flex-direction: column;
      align-items: stretch !important;
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

    document.querySelectorAll('[data-vessel-grid]').forEach(function (grid) {
      initVesselList(grid.getAttribute('data-vessel-grid'));
    });

    function initVesselList(sectionId) {
      const grid = document.querySelector('[data-vessel-grid="' + sectionId + '"]');
      const searchInput = document.querySelector('[data-vessel-search="' + sectionId + '"]');
      const emptyMsg = document.querySelector('[data-vessel-empty="' + sectionId + '"]');
      const summary = document.querySelector('[data-vessel-summary="' + sectionId + '"]');
      const footer = document.querySelector('[data-vessel-footer="' + sectionId + '"]');
      const paginationNav = document.querySelector('[data-vessel-pagination="' + sectionId + '"]');
      if (!grid) return;

      const PER_PAGE = 12;
      const cards = Array.from(grid.querySelectorAll('.track-vessel-card'));
      let currentPage = 1;
      let query = '';

      function getMatchingCards() {
        return cards.filter(function (card) {
          return !query || (card.getAttribute('data-search') || '').includes(query);
        });
      }

      function buildPageNumbers(totalPages) {
        const pages = [];
        if (totalPages <= 7) {
          for (let i = 1; i <= totalPages; i++) pages.push(i);
          return pages;
        }

        pages.push(1);
        if (currentPage > 3) pages.push('...');

        const start = Math.max(2, currentPage - 1);
        const end = Math.min(totalPages - 1, currentPage + 1);
        for (let i = start; i <= end; i++) pages.push(i);

        if (currentPage < totalPages - 2) pages.push('...');
        pages.push(totalPages);
        return pages;
      }

      function renderPagination(totalPages) {
        if (!paginationNav) return;

        if (totalPages <= 1) {
          paginationNav.innerHTML = '';
          paginationNav.classList.add('d-none');
          return;
        }

        paginationNav.classList.remove('d-none');
        paginationNav.innerHTML = '';

        const prevBtn = document.createElement('button');
        prevBtn.type = 'button';
        prevBtn.className = 'track-vessel-page-btn';
        prevBtn.textContent = 'Prev';
        prevBtn.disabled = currentPage === 1;
        prevBtn.addEventListener('click', function () {
          currentPage--;
          render();
        });
        paginationNav.appendChild(prevBtn);

        buildPageNumbers(totalPages).forEach(function (page) {
          if (page === '...') {
            const ellipsis = document.createElement('span');
            ellipsis.className = 'track-vessel-page-ellipsis';
            ellipsis.textContent = '...';
            paginationNav.appendChild(ellipsis);
            return;
          }

          const pageBtn = document.createElement('button');
          pageBtn.type = 'button';
          pageBtn.className = 'track-vessel-page-btn' + (page === currentPage ? ' active' : '');
          pageBtn.textContent = page;
          pageBtn.addEventListener('click', function () {
            currentPage = page;
            render();
          });
          paginationNav.appendChild(pageBtn);
        });

        const nextBtn = document.createElement('button');
        nextBtn.type = 'button';
        nextBtn.className = 'track-vessel-page-btn';
        nextBtn.textContent = 'Next';
        nextBtn.disabled = currentPage === totalPages;
        nextBtn.addEventListener('click', function () {
          currentPage++;
          render();
        });
        paginationNav.appendChild(nextBtn);
      }

      function render() {
        const matching = getMatchingCards();
        const total = matching.length;
        const totalPages = Math.max(1, Math.ceil(total / PER_PAGE));

        if (currentPage > totalPages) currentPage = totalPages;
        if (currentPage < 1) currentPage = 1;

        const start = (currentPage - 1) * PER_PAGE;
        const pageCards = matching.slice(start, start + PER_PAGE);
        const visibleIds = new Set(pageCards.map(function (card) { return card; }));

        cards.forEach(function (card) {
          card.classList.toggle('d-none', !visibleIds.has(card));
        });

        if (emptyMsg) {
          emptyMsg.classList.toggle('d-none', total > 0);
        }

        if (footer) {
          footer.classList.toggle('d-none', total === 0);
        }

        if (summary) {
          if (total === 0) {
            summary.textContent = '';
          } else if (total <= PER_PAGE) {
            summary.textContent = total + ' vessel' + (total !== 1 ? 's' : '');
          } else {
            const from = start + 1;
            const to = Math.min(start + PER_PAGE, total);
            summary.textContent = 'Showing ' + from + '\u2013' + to + ' of ' + total + ' vessels';
          }
        }

        renderPagination(totalPages);
      }

      if (searchInput) {
        searchInput.addEventListener('input', function () {
          query = searchInput.value.trim().toLowerCase();
          currentPage = 1;
          render();
        });
      }

      render();
    }

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
