<x-app-layout>
</x-app-layout>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
   @include('admin.css')
  </head>
  <body>
    <div class="container-scroller">
      
      </div>
      <!-- partial:partials/_sidebar.html -->
    @include('doctor.sidebar')
      @include('admin.script')
  </body>
</html>