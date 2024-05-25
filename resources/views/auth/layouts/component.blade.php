@if (Session::has('failed'))
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Login Failed',
            text: '{{ Session::get('failed') }}',
        });
    </script>
@elseif (Session::has('success'))
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Create Account',
            text: '{{ Session::get('success') }}',
        });
    </script>
@endif
