<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>DIIQS Beauty Skincare - Admin</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>    

    <link href="/docs/5.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    {{-- Toastr --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body class="antialiased">

    @include('backend.layout.header')
    
    @include('backend.layout.sidebar')

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        @yield('content')
    </main>
    
    @include('backend.layout.footer')

    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    
    {{-- toastr notification --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        @if(Session::has('message'))
        var type = "{{ Session::get('alert-type','info') }}"
        switch(type){
        case 'info':
        toastr.info("{{ Session::get('message') }}");
        break;

        case 'success':
        toastr.success("{{ Session::get('message') }}");
        break;

        case 'warning':
        toastr.warning("{{ Session::get('message') }}");
        break;

        case 'error':
        toastr.error("{{ Session::get('message') }}");
        break;
        }

        @endif
    </script>

    
    {{-- SWEEALERT DELETE --}}
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script type="text/javascript">
        $(function(){
            $(document).on('click','#delete',function(e){
                e.preventDefault();
                var link = $(this).attr("href");

                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            Swal.fire(
                            'Deleted!',
                            'Your file has been deleted.',
                            'success'
                            )
                        }
                    })

            });
        });
        
    </script>
    
</body>

<style>
/* font-family: "Open Sans", sans-serif; */
    html {
    scroll-behavior: smooth;
    }

    body {
    font-size: .875rem;
    }

    .feather {
    width: 16px;
    height: 16px;
    vertical-align: text-bottom;
    }

    /*
    * Sidebar
    */

    .sidebar {
    position: fixed;
    top: 0;
    /* rtl:raw:
    right: 0;
    */
    bottom: 0;
    /* rtl:remove */
    left: 0;
    z-index: 100; /* Behind the navbar */
    padding: 48px 0 0; /* Height of navbar */
    box-shadow: inset -1px 0 0 rgba(0, 0, 0, .1);
    }

    @media (max-width: 767.98px) {
    .sidebar {
        top: 5rem;
    }
    }

    .sidebar-sticky {
    position: relative;
    top: 0;
    height: calc(100vh - 48px);
    padding-top: .5rem;
    overflow-x: hidden;
    overflow-y: auto; /* Scrollable contents if viewport is shorter than content. */
    }

    .sidebar .nav-link {
    font-weight: 500;
    color: #333;
    }

    .sidebar .nav-link .feather {
    margin-right: 4px;
    color: #727272;
    }

    .sidebar .nav-link.active {
    color: #2470dc;
    }

    .sidebar .nav-link:hover .feather,
    .sidebar .nav-link.active .feather {
    color: inherit;
    }

    .sidebar-heading {
    font-size: .75rem;
    text-transform: uppercase;
    }

    /*
    * Header
    */

    .navbar-brand {
    padding-top: .75rem;
    padding-bottom: .75rem;
    font-size: 1rem;
    background-color: rgba(0, 0, 0, .25);
    box-shadow: inset -1px 0 0 rgba(0, 0, 0, .25);
    }

    .navbar .navbar-toggler {
    top: .25rem;
    right: 1rem;
    }

    .navbar .form-control {
    padding: .75rem 1rem;
    border-width: 0;
    border-radius: 0;
    }

    .form-control-dark {
    color: #fff;
    background-color: rgba(255, 255, 255, .1);
    border-color: rgba(255, 255, 255, .1);
    }

    .form-control-dark:focus {
    border-color: transparent;
    box-shadow: 0 0 0 3px rgba(255, 255, 255, .25);
    }

    /*
    * Footer
    */
    .footer {
    clear: both;
    position: relative;
    z-index: 10;
    height: 3em;
    margin-top: -3em;
    }
</style>

</html>