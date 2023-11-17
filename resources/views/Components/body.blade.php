<body>
<section class="d-flex">
@auth
<x-side-nav />
@endauth
<main id="main-content" style="width:100%;">
    <x-message/>
    <div class="container align-items-center">
        {{ $slot }}
    </div>
</main>
</section>
</body>