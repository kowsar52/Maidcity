@extends('layouts.website')
@section('css-after')
@endsection
@section('content')
    <!-- breadcrumb-area -->
    @include('layouts.website-components.breadcrumb')
    <!-- breadcrumb-area-end -->
    <section class="my-5">
        <div class="container">
            @include('website.jobs.job-card')
            @include('website.jobs.job-list')
            @include('website.jobs.join-us')
        </div>
    </section>
    <!-- Modal -->
    <div class="modal fade" id="applyNowModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"></div>
    <div class="modal fade" id="shareSocialMediaModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"></div>
@endsection
@section('innerScriptFiles')
@endsection
@section('innerScript')
    <script>
        $(document).on("click", ".job-action", function () {
            const id = $(this).attr("id");
            const url = $(this).attr('data-url');
            const text = $(this).text();
            $.ajax({
                method:"GET",
                url:url,
                beforeSend:function (){
                    showWait();
                },
                success:function (result) {
                    hideWait();
                    $('#'+id).text(text);
                    $("#applyNowModal").html(result);
                    $("#applyNowModal").modal('show');
                    initializeFields();
                },
            });
        });
        $(document).on('change','#date_of_birth',function (){
            var value = $(this).val();
            var dob = new Date(value);
            var today = new Date();
            var age = Math.floor((today-dob) / (365.25 * 24 * 60 * 60 * 1000));
            $('#age').html(age+' years old');
        });

        $(document).on('submit', 'form#form_data', function(e) {
            e.preventDefault();

            let form = $(this);
            let data = new FormData(this);

            $.ajax({
                method: 'POST',
                url: form.attr('action'),
                dataType: 'json',
                cache: false,
                contentType: false,
                processData: false,
                data: data,
                beforeSend:function (){
                    showWait();
                },
                success: function(result) {
                    if (result.success) {
                        successMessage(result.message);
                        location.reload();
                    } else {
                        errorMessage(result.message);
                    }
                },
                error: function (data) {
                    $.each(data.responseJSON.errors, function (key, value) {
                        errorMessage(value);
                    });
                },
            });
        });

        $(document).on('click', '#shareSocialMedia',function (){
            const url = $(this).data('url');
            $.ajax({
                method: 'GET',
                url: url,
                success: function (result){
                    $('#shareSocialMediaModal').html(result.view).modal('show');
                    const facebookUrl = 'https://www.facebook.com/sharer/sharer.php?u={{ url('/job-share-detail') }}/'+result.model.id;
                    const shareGooglePlus = 'https://plus.google.com/share?url={{ url('/job-share-detail') }}/'+result.model.id;
                    const shareWhatsapp = 'whatsapp://send?text={{ url('/job-share-detail') }}/'+result.model.id;
                    const shareTwitter = 'https://twitter.com/share?ref_src={{ url('/job-share-detail') }}/'+result.model.id;
                    $('#shareFacebook').attr('href',facebookUrl);
                    $('#shareGooglePlus').attr('href',shareGooglePlus);
                    $('#shareWhatsapp').attr('href',shareWhatsapp);
                    $('#shareTwitter').attr('href',shareTwitter);
                }
            });
        });
    </script>
@endsection
