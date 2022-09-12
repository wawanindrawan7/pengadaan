<script>
    $(document).on('click', '.btn-submit', function(e) {
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
                    url: "{{ url('pengadaan/submit') }}",
                    data: {
                        id: "{{ $pengadaan->id }}"
                    },
                    success: function(r) {
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
                            }).then(function() {
                                window.location = "{!! url('pengadaan/detail?id=' . $pengadaan->id . '&tab=inisiasi') !!}"
                            });
                        }
                    }
                })

            } else {
                swal.close();
            }
        });
    })

    $('#pengadaan_file').on('submit', function(e) {
        e.preventDefault()
        $.ajax({
            type: 'POST',
            url: "{!! url('pengadaan/file/create') !!}",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            success: function(r) {
                console.log(r)
                if (r == 'success') {
                    swal("Good job!", "Simpan data berhasil !", {
                        icon: "success",
                        buttons: {
                            confirm: {
                                className: 'btn btn-success'
                            }
                        },
                    }).then(function() {
                        window.location = "{!! url('pengadaan/detail?id=' . $pengadaan->id . '&tab=inisiasi') !!}"
                    });
                }
            }
        })
    });

    $(document).on('click', '.btn-update', function(e) {
        $('#e_id').val($(this).data('id'))
        $('#e_nama').val($(this).data('nama'))
        $('#e_lokasi').val($(this).data('lokasi'))
        $('#e_sumber_anggaran').val($(this).data('sumber_anggaran'))
        $('#e_nilai_anggaran').val($(this).data('nilai_anggaran'))
        $('#e_jenis').val($(this).data('jenis'))
        $('#e_volume').val($(this).data('volume'))
        $('#e_no_nota_dinas').val($(this).data('no_nota_dinas'))
        $('#e_tgl_nota_dinas').val($(this).data('tgl_nota_dinas'))
        $('#update-pengadaan-modal').modal('show')
    })

    $('#form_update_pengadaan').on('submit', function(e) {
        e.preventDefault()
        $.ajax({
            type: 'post',
            url: "{!! url('pengadaan/update') !!}",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            success: function(r) {
                console.log(r)
                if (r == 'success') {
                    swal("Good job!", "Simpan data berhasil !", {
                        icon: "success",
                        buttons: {
                            confirm: {
                                className: 'btn btn-success'
                            }
                        },
                    }).then(function() {
                        location.reload()
                    });
                }
            }
        })
    });
</script>
