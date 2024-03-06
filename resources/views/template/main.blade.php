@include('template/header')
@include('template/sidebar')
<main id="main" class="main">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">

    <!-- Bootstrap JS (Popper.js and Bootstrap JS) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>


    <section>
        <div class="container">

            @yield('content')

        </div>
    </section>

    

</main><!-- End #main -->
@include('template/footer')
