<script>
    $(document).on('input', '#nilai_kontrak', function () {
        var nilai_kontrak = $('#nilai_kontrak').val()
        $('.f_nilai_kontrak').text(nf.format(nilai_kontrak))
    })

    $('#form_pelaksanaan').on('submit', function (e) {
        e.preventDefault()
        $.ajax({
            type: 'POST',
            url: "{!! url('pelaksanaan/create') !!}",
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
                        window.location = "{!! url('pengadaan/detail?id='.$pengadaan->id.'&tab=pelaksana') !!}"
                    });
                }
            }
        })
    });

    $(document).on('click', '.btn-submit-pelaksanaan', function (e) {
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
                    url: "{{ url('pelaksana-pengadaan/submit') }}",
                    data: {
                        id: "{{ $pengadaan->pelaksanaan != null ? $pengadaan->pelaksanaan->id : '' }}"
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
                                location.reload()
                            });
                        }
                    }
                })

            } else {
                swal.close();
            }
        });
    })

    $('#pelaksanaan_file').on('submit', function (e) {
        e.preventDefault()
        $.ajax({
            type: 'POST',
            url: "{!! url('pelaksana-pengadaan/file/create') !!}",
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
                        window.location = "{!! url('pengadaan/detail?id='.$pengadaan->id.'&tab=pelaksana') !!}"
                    });
                }
            }
        })
    });
</script>