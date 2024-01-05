<script>
    $(document).on('click', '#saveToFavourite', function () {
        const id = $(this);
        const url = id.attr('data-url');
        const dataId = id.attr('data-id');
        $.ajax({
            method: 'GET',
            url: url,
            success: function (result) {
                if (result.success) {
                    if (result.type === 'save') {
                        id.html('<i class="fas fa-heart me-3"></i> <span id="saveToFavouriteText' + dataId + '" style="display: none;">{{ __('general.save_to_unfavourite') }}</span>');
                        id.attr('data-url', "{{ url('bio-data-shortlist-remove') }}/" + result.modelId);
                    } else {
                        id.html('<i class="far fa-heart me-3"></i> <span id="saveToFavouriteText' + dataId + '" style="display: none;">{{ __('general.save_to_favourite') }}</span>');
                        id.attr('data-url', "{{ url('bio-data-shortlist') }}/" + dataId);
                    }
                } else {
                    errorMessage(result.message)
                }
            }
        });
    });

    function showText(element, id) {
        $(element).addClass('btn-custom btn-custom-light');
        $('#saveToFavouriteText' + id).css('display', 'block');
    }

    function hideText(element, id) {
        $(element).removeClass('btn-custom btn-custom-light');
        $('#saveToFavouriteText' + id).css('display', 'none');
    }
</script>
