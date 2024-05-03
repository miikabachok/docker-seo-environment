<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @isset($metadata)
        <title>{{ \array_key_exists('title', $metadata) ? $metadata['title'] : '' }}</title>
        <meta name="description" content="{{ \array_key_exists('description', $metadata) ? $metadata['description'] : '' }}">
        <meta name="keywords" content="{{ \array_key_exists('keywords', $metadata) ? $metadata['keywords'] : '' }}">
        <meta property="og:title" content="{{ \array_key_exists('title', $metadata) ? $metadata['title'] : '' }}">
        <meta property="og:description" content="{{ \array_key_exists('description', $metadata) ? $metadata['description'] : '' }}">
    @endisset

    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('icons/font/bootstrap-icons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
</head>
<body>
@include('includes.spinner')
@include('includes.alerts')
@include('includes.header')
@include('includes.main')
@include('includes.footer')

<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        (function (currentUrl) {
            const items = document.querySelectorAll('ul.navbar-nav a.nav-link');

            for (let i = 0; i < items.length; i++) {
                try {
                    const url = new URL(items[i].getAttribute('href'));

                    if (url.pathname === currentUrl.pathname) {
                        items[i].classList.add('active');
                        items[i].setAttribute('aria-current', 'page');

                        break;
                    }
                } catch (e) {
                    //
                }
            }
        })(new URL(window.location.href));
    });
</script>

@stack('scripts')
</body>
</html>
