<script>
    $(document).on('click', '.btn-submit-perencanaan', function (e) {
        e.preventDefault()
        swal({
            title: 'Yakin untuk submit ?',
            text: "Submit data pengadaan",
            type: 'warning',
            buttons: {
                confirm: {
                    text: 'Yes, submit it!',
                    className: 'btn btn-success'
                },
                cancel: {
                    visible: true,
                    className: 'btn btn-danger'
                }
            }
        }).then((Submit) => {
            if (Submit) {
                $.ajax({
                    type: 'GET',
                    url: "{{ url('perencana-pengadaan/submit') }}",
                    data: {
                        id: "{{ ($pengadaan->perencanaan != null) ? $pengadaan->perencanaan->id : '' }}"
                    },
                    success: function (r) {
                        console.log(r)
                        if (r == 'success') {
                            swal("Good job!", "Submit pengadaan berhasil !", {
                                icon: "success",
                                timer: 1000,
                                buttons: {
                                    confirm: {
                                        className: 'btn btn-success'
                                    }
                                },
                            }).then(function () {
                                window.location = "{!! url('pengadaan/detail?id='.$pengadaan->id.'&tab=perencana') !!}"
                            });
                        }
                    }
                })

            } else {
                swal.close();
            }
        });
    })

    $('#perencanaan_file').on('submit', function (e) {
        e.preventDefault()
        $.ajax({
            type: 'POST',
            url: "{!! url('perencana-pengadaan/file/create') !!}",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            success: function (r) {
                console.log(r)
                if (r == 'success') {
                    swal("Good job!", "Simpan data berhasil !", {
                        icon: "success",
                        buttons: {
                            confirm: {
                                className: 'btn btn-success'
                            }
                        },
                    }).then(function () {
                        window.location = "{!! url('pengadaan/detail?id='.$pengadaan->id.'&tab=perencana') !!}"
                    });
                }
            }
        })
    });
</script>