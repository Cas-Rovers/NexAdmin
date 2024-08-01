@if (session('toast'))
    @php
        $toast = session('toast');
        $type = $toast['type'] ?? 'info'; // Default to 'info' if type is not set
        $message = $toast['message'] ?? ''; // Default to empty string if message is not set
    @endphp
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            showToast('{{ $type }}', '', @json($message));
        });
    </script>
@endif
