@extends('layouts.app')

@section('content')
<script>
    Swal.fire({
        title: 'Unauthorized',
        text: 'This action is unauthorized.',
        icon: 'error',
        confirmButtonText: 'OK'
    }).then(() => {
        window.history.back(); // Navigate back to the previous page
    });
</script>
@endsection
