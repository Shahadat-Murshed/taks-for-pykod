<!-- JS Libraries  -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script src="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.datatables.net/2.0.3/js/dataTables.js"></script>
<script>
    const notyf = new Notyf({
        duration: 3000,
        types: [{
            type: 'warning',
            background: 'orange',
            icon: '<i class="fa-solid fa-circle-exclamation"></i>'
        }]
    });
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            notyf.error("{{ $error }}");
        @endforeach
    @endif
</script>
<!-- Custom JS  -->
<script src="{{ asset('assets/js/scripts.js') }}"></script>
@stack('scripts')
