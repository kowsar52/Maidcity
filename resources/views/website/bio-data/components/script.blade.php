<script>
    $(document).on("click", ".contact-action", function () {
        const id = $(this).attr("id");
        const url = $(this).attr('data-url');
        $.ajax({
            method:"GET",
            url:url,
            success:function (result) {
                if (result.success == true){
                    $("#contactShowModal").html(result.view);
                    $("#contactShowModal").modal('show');
                } else {
                    errorMessage(result.message);
                }
            }
        });
    });
    $(document).on('click','#saveToFavourite',function (){
        const id = $('#saveToFavourite');
        const url = id.attr('data-url');
        const dataId = id.attr('data-id');
        $.ajax({
           method:'GET',
           url:url,
           success:function (result){
               if (result.success){
                   if (result.type === 'save'){
                       id.html('<i class="fas fa-heart me-3"></i> {{ __('general.save_to_unfavourite') }}');
                       id.attr('data-url',"{{ url('bio-data-shortlist-remove') }}/"+result.modelId);
                   } else {
                       id.html('<i class="far fa-heart me-3"></i> {{ __('general.save_to_favourite') }}');
                       id.attr('data-url',"{{ url('bio-data-shortlist') }}/"+dataId);
                   }
               } else {
                   errorMessage(result.message)
               }
           }
        });
    });
</script>
