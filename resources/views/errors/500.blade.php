<div class="content">
    <div class="title">Something went wrong.</div>
    @unless(empty($sentryID))
            <!-- Sentry JS SDK 2.1.+ required -->
    <script src="https://cdn.ravenjs.com/3.3.0/raven.min.js"></script>

    <script>
        Raven.showReportDialog({
            eventId: '{{ $sentryID }}',

            // use the public DSN (dont include your secret!)
            dsn: 'https://ec923d3d31b44a10b426c977d5d52c15@sentry.io/179364'
        });
    </script>
    @endunless
</div>