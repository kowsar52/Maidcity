<script>
    $(document).ready(function(){
        employerQuestionAnswer();
        initializeFields();
    });

    function initializeFields() {
        // $('.solid-validation').parsley().on('form:submit', function () {
        //     showWait();
        // });
    }

    function showWait() {
        Swal.fire({
            customClass: {'confirmButton': ''},
            html: '{!! __('general.request_wait') !!}',
            backdrop: true,
            allowOutsideClick: () => !Swal.isLoading(),
            allowEscapeKey: () => !Swal.isLoading(),
            allowEnterKey: () => !Swal.isLoading()
        });
        Swal.showLoading();
    }

    function hideWait() {
        Swal.close();
    }

    function successMessage(message){
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-right',
            iconColor: 'white',
            customClass: {
                popup: 'bg-success text-white'
            },
            showConfirmButton: false,
            timer: 9000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        });
        Toast.fire({
            icon: 'success',
            title: message
        });
    }

    function errorMessage(message){
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-right',
            iconColor: 'white',
            customClass: {
                popup: 'bg-danger text-white'
            },
            showConfirmButton: false,
            timer: 9000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        });
        Toast.fire({
            icon: 'error',
            title: message
        });
    }

    function employerQuestionAnswer()
    {
        $.ajax({
            method: "GET",
            url: "{{ route('website.employer-mdw-requirement.create') }}",
            success: function (result) {
                $('#modalContent').html(result);
                $("#employerMDWRequirementModal").modal('show');
                initializeFields();
            },
        });
    }

    function changeMap(element) {
        const value = element.value;
        if (value == 'orchard') {
            $("#orchardMap").css('display', 'block');
            $("#kovanMap").css('display', 'none');
            $("#clementiMap").css('display', 'none');
            $("#toaPayohMap").css('display', 'none');
        }
        if (value == 'kovan') {
            $("#orchardMap").css('display', 'none');
            $("#kovanMap").css('display', 'block');
            $("#clementiMap").css('display', 'none');
            $("#toaPayohMap").css('display', 'none');
        }
        if (value == 'clementi') {
            $("#orchardMap").css('display', 'none');
            $("#kovanMap").css('display', 'none');
            $("#clementiMap").css('display', 'block');
            $("#toaPayohMap").css('display', 'none');
        }
        if (value == 'toa_payoh') {
            $("#orchardMap").css('display', 'none');
            $("#kovanMap").css('display', 'none');
            $("#clementiMap").css('display', 'none');
            $("#toaPayohMap").css('display', 'block');
        }
    }

    function DataTypeModal(id) {
        showWait();
        $.ajax({
            type: "POST",
            url: "{{ route('website.data-type.modal.show') }}",
            data: {
                "_token": "{{ csrf_token() }}",
                id: id,
            },
            success: function(data) {
                hideWait();
                $('#bioDataModal').html(data);
                $('#bioDataModal').modal('show');
            },
            error: function (data) {
                hideWait();
                if (data.responseJSON.message == 'Unauthenticated.'){
                    location.href = '{{ route('website.login') }}';
                }
            },
        });
    }
</script>
