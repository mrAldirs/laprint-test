@if (session()->has('error'))
    <script>
        Swal.fire({
            icon: 'error',
            title: '{{ Session::get('title') }}',
            text: '{{ Session::get('error') }}',
        });
    </script>
@elseif (session()->has('success'))
    <script>
        Swal.fire({
            icon: 'success',
            title: '{{ Session::get('title') }}',
            text: '{{ Session::get('success') }}',
        });
    </script>
@endif

<script>
    document.getElementById('imageInput').addEventListener('change', function(event) {
        var file = event.target.files[0];
        var reader = new FileReader();

        reader.onload = function(e) {
            var imagePreview = document.getElementById('imagePreview');
            imagePreview.innerHTML = '';
            var img = document.createElement('img');
            img.src = e.target.result;
            img.style.width = '240px';
            img.style.height = '180px';
            imagePreview.appendChild(img);
        };

        reader.readAsDataURL(file);
    });
</script>

<script>
    document.querySelectorAll('.deleteButton').forEach(item => {
        item.addEventListener('click', event => {
            let form = item.closest('.deleteForm');
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        });
    });
</script>

<script>
    function goBack() {
        window.history.back();
    }

    document.addEventListener('DOMContentLoaded', function() {
        document.getElementById('cancelButton').addEventListener('click', function(event) {
            event.preventDefault();
            Swal.fire({
                title: 'Are you sure?',
                text: 'Are you sure you want to cancel? Any changes will not be saved.',
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, cancel now!',
                cancelButtonText: 'Stay here!'
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire({
                        icon: "info",
                        title: "Your data has been cancel",
                        showConfirmButton: false,
                        timer: 1500
                    }).then((result) => {
                        window.history.back();
                    });
                }
            });
        });
    });
</script>
<script>
    document.getElementById('logoutBtn').addEventListener('click', function(e) {
        e.preventDefault();

        Swal.fire({
            title: "Logout",
            text: "Are you sure you want to leave?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Ya",
            cancelButtonText: "Batal",
            dangerMode: true,
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = "{{ route('logout') }}";
            }
        });
    });
</script>
