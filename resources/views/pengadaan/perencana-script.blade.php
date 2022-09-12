<script>
    $(document).on('click', '.btn-submit-perencanaan', function(e) {
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
                        id: "{{ $pengadaan->perencanaan != null ? $pengadaan->perencanaan->id : '' }}"
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
                                window.location = "{!! url('pengadaan/detail?id=' . $pengadaan->id . '&tab=perencana') !!}"
                            });
                        }
                    }
                })

            } else {
                swal.close();
            }
        });
    })

    $('#perencanaan_file').on('submit', function(e) {
        e.preventDefault()
        $.ajax({
            type: 'POST',
            url: "{!! url('perencana-pengadaan/file/create') !!}",
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
                        window.location = "{!! url('pengadaan/detail?id=' . $pengadaan->id . '&tab=perencana') !!}"
                    });
                }
            }
        })
    });

    $(document).on('click', '.btn-update', function(e) {
        console.log($(this).data('no_nota_dinas'))
        $('#pp_id').val($(this).data('id'))
        $('#e_kategori_kebutuhan').val($(this).data('kategori_kebutuhan'))
        $('#e_tgl_penggunaan').val($(this).data('tgl_penggunaan'))
        $('#e_waktu_pelaksanaan').val($(this).data('waktu_pelaksanaan'))
        $('#e_strategi_pengadaan').val($(this).data('strategi_pengadaan'))
        $('#e_jenis_kontrak').val($(this).data('jenis_kontrak'))
        $('#e_nilai_hpe').val($(this).data('nilai_hpe'))
        $('#e_tgl_hpe').val($(this).data('tgl_hpe'))
        $('#e_nomor_rks').val($(this).data('nomor_rks'))
        $('#e_tgl_rks').val($(this).data('tgl_rks'))
        $('#pp_no_nota_dinas').val($(this).data('no_nota_dinas'))
        $('#pp_tgl_nota_dinas').val($(this).data('tgl_nota_dinas'))
        $('#update-perencanaan-modal').modal('show')
    })

    $('#form_update_perencanaan').on('submit', function(e) {
        e.preventDefault()
        $.ajax({
            type: 'post',
            url: "{!! url('perencana-pengadaan/update') !!}",
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
                        window.location = "{!! url('pengadaan/detail?id=' . $pengadaan->id . '&tab=perencana') !!}"
                    });
                }
            }
        })
    });
</script>
