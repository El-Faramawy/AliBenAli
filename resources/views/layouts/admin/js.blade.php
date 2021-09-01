
<script src="{{url('/')}}/admin/assets/plugins/global/plugins.bundle.js"></script>
<script src="{{url('/')}}/admin/assets/js/scripts.bundle.js"></script>
<!--end::Global Javascript Bundle-->
<!--begin::Page Custom Javascript(used by this page)-->
<script src="{{url('/')}}/admin/assets/js/custom/widgets.js"></script>
<script src="{{url('/')}}/admin/assets/js/custom/apps/chat/chat.js"></script>
<script src="{{url('/')}}/admin/assets/js/custom/modals/create-app.js"></script>
<script src="{{url('/')}}/admin/assets/js/custom/modals/upgrade-plan.js"></script>
<script src="{{url('/')}}/admin/assets/js/custom/modals/new-target.js"></script>




{{--=================  dropfy  ================--}}

<script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js"></script>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>
<script>
    // $(document).ready(function () {
    $('.dropify').dropify();
    // });//end jquery
</script>

<script type="text/javascript">
    // $(document).ready(function() {
    $('.file_upload').imageuploadify();
    // })
</script>


<script>
    // $(function () {
    $('.selectpicker').selectpicker();
    // });
</script>


{{--===================  toster ==============================--}}
<script src="{{url('admin/js')}}/tostar.js"></script>

<script>

    @if (Session::has('message'))
    var type = "{{ Session::get('alert-type', 'info') }}"
    switch(type){
        case 'info':

            toastr.options.timeOut = 10000;
            toastr.info("{{Session::get('message')}}");
            var audio = new Audio('audio.mp3');
            audio.play();
            break;
        case 'success':

            toastr.options.timeOut = 10000;
            toastr.success("{{Session::get('message')}}");
            var audio = new Audio('music/Success 12.mp3');
            audio.play();

            break;
        case 'warning':

            toastr.options.timeOut = 10000;
            toastr.warning("{{Session::get('message')}}");
            var audio = new Audio('music/error2.mp3');
            audio.play();

            break;
        case 'error':

            toastr.options.timeOut = 10000;
            toastr.error("{{Session::get('message')}}");
            var audio = new Audio('audio.mp3');
            audio.play();

            break;
    }
    @endif
</script>


<script type="text/javascript" charset="utf8" src="{{url('admin/js')}}/check.js"></script>


<script>
    function check_all()
    {
        $('input[class="item_checkbox"]:checkbox').each(function(){
            if ( $('input[class="check_all"]:checkbox:checked').length == 0 ) {
                $(this).prop('checked', false);
            }else {
                $(this).prop('checked', true);
            }
        });
    }
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.0.18/sweetalert2.min.js"></script>


<script>
    $(document).on('click','.delete_element',function (e) {
        var id = $(this).attr('data_id')
        var td = $(this)
        var routeAction = $(this).attr('data_delete')
        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: 'btn btn-success',
                cancelButton: 'btn btn-danger'
            },
            buttonsStyling: false
        })

        swalWithBootstrapButtons.fire({
            title: 'هل انت متأكد من الحذف ؟',
            text: "سيتم حذف المحدد!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'حذف !',
            cancelButtonText: 'الغاء !',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: 'POST',
                    url: routeAction,
                    data: {'id':id},
                    success:function(data){
                        td.parent().parent().remove();
                        swalWithBootstrapButtons.fire(
                            'تم الحذف !',
                            'تم حذف العنصر بنجاح .',
                            'success'
                        )
                    }
                });
            } else if (
                /* Read more about handling dismissals below */
                result.dismiss === Swal.DismissReason.cancel
            ) {
                swalWithBootstrapButtons.fire(
                    'تم الغاء الحذف ',
                    'العنصر المحدد موجود بامان ',
                    'error'
                )
            }
        });
    })
    $(document).on('click','.multicheck',function (e) {
        var id = $(this).attr('data_id')
        var td = $(this)
        var routeAction = $(this).attr('data_delete')
        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: 'btn btn-success',
                cancelButton: 'btn btn-danger'
            },
            buttonsStyling: false
        })

        swalWithBootstrapButtons.fire({
            title: 'هل انت متأكد من الحذف ؟',
            text: "سيتم حذف المحدد!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'حذف !',
            cancelButtonText: 'الغاء !',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: 'POST',
                    url: routeAction,
                    data: {'id':id},
                    success:function(data){
                        td.parent().parent().remove();
                        swalWithBootstrapButtons.fire(
                            'تم الحذف !',
                            'تم حذف العنصر بنجاح .',
                            'success'
                        )
                    }
                });
            } else if (
                /* Read more about handling dismissals below */
                result.dismiss === Swal.DismissReason.cancel
            ) {
                swalWithBootstrapButtons.fire(
                    'تم الغاء الحذف ',
                    'العنصر المحدد موجود بامان ',
                    'error'
                )
            }
        });
    })
</script>
<script>
    jQuery('.numbersOnly').keyup(function () {
        this.value = this.value.replace(/[^0-9\.]/g,'');
    });
</script>


{{--//===========================    data table  =========================--}}

<script src="{{url('admin')}}/assets/plugins/custom/datatables/datatables.bundle.js"></script>
<script src="{{url('admin')}}/assets/plugins/custom/prismjs/prismjs.bundle.js"></script>
<!--end::Page Vendors Javascript-->
<!--begin::Page Custom Javascript(used by this page)-->
{{--<script src="{{url('admin')}}/assets/js/custom/documentation/general/datatables/advanced.js"></script>--}}

<script>
    $("#kt_datatable_example_5").DataTable({
        "language": {
            "lengthMenu": "اظهار _MENU_",
        },
        "dom":
            "<'row'" +
            "<'col-sm-6 d-flex align-items-center justify-conten-start'l>" +
            "<'col-sm-6 d-flex align-items-center justify-content-end'f>" +
            ">" +

            "<'table-responsive'tr>" +

            "<'row'" +
            "<'col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start'i>" +
            "<'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>" +
            ">"
    });
</script>
<script>
    @toastr_css
    @toastr_js
    @toastr_render
</script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>


@stack('admin_js')
