@if($message = \Illuminate\Support\Facades\Session::get('success'))
    <script>
        $(document).ready(function(){
            successMessage("{{$message}}")
        });
    </script>
@endif
@if($message = \Illuminate\Support\Facades\Session::get('error'))
    <script>
        $(document).ready(function(){
            errorMessage("{{$message}}")
        });
    </script>
@endif
