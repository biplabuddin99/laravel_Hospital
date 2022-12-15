@include('layouts.header')
@stack('admin_style')
  <!-- ======= Header ======= -->
  @include('layouts.topbar')
<!-- End Header -->

  <!-- ======= Sidebar ======= -->
@include('layouts.sidebar')
  <!-- End Sidebar-->

 @yield('content')
 @stack('admin_script')
<!-- Sweet Alert Delete -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script>
  $('.show_confirm').click(function(event){
      let form= $(this).closest('form');


      event.preventDefault();
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
              form.submit();
              Swal.fire(
              'Deleted!',
              'Your file has been deleted.',
              'success'
              )
          }
          })
  });
</script>
  <!-- ======= Footer ======= -->
@include('layouts.footer')

