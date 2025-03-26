<!-- SEO META TAGS  -->
<meta name="description" content="{{ @$meta['description'] }}">
<meta name="keywords" content="{{ @$meta['keywords'] }}">
<!-- Open Graph (OG) Meta Tags for Social Sharing -->
<meta property="og:title" content="{!! @$meta['title'] !!}">
<meta property="og:description" content="{{ @$meta['description'] }}">
<meta property="og:url" content="{{ request()->fullUrl() }}">
@if (@$meta['image'])
    <meta property="og:image" content="{{ @$meta['image'] }}">
@endif
<meta property="og:type" content="website">
<meta property="og:site_name" content="Brand Name">

<!-- Twitter Card Meta Tags -->
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="{!! @$meta['title'] !!}">
<meta name="twitter:description" content="{{ @$meta['description'] }}">
@if (@$meta['image'])
    <meta property="twitter:image" content="{{ @$meta['image'] }}">
@endif

<!-- Canonical URL -->
<link rel="canonical" href="{{ request()->fullUrl() }}">

<!-- Robots Meta Tag -->
@if (@$meta['noindex'])
    <meta name="robots" content="noindex, nofollow">
@else
    <meta name="robots" content="index, follow">
@endif
