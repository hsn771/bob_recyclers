@php
  $pageTitle = ($blogSettings && $blogSettings->page_title) ? $blogSettings->page_title : 'Blog';
  $firstLetter = mb_substr($pageTitle, 0, 1);
  $restTitle = mb_substr($pageTitle, 1);
  $bannerUrl = ($blogSettings && $blogSettings->banner_image)
    ? asset('uploads/blog-page/' . $blogSettings->banner_image)
    : asset('frontend/images/banner.jpg');
@endphp

<section class="about-page-top blog-page-top" style="background-image: url('{{ $bannerUrl }}'); background-position: center;">
  <div class="overlay">
    <div class="container pt-5 d-flex align-items-end">
      <p><span>{{ $firstLetter }}</span>{{ $restTitle }}</p>
    </div>
  </div>
</section>
