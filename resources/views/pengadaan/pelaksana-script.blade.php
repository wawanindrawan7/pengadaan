<script>
    $('#mitra_id').select2({
        theme: "bootstrap"
    });

    $('#e_mitra_id').select2({
        theme: "bootstrap"
    });

    $(document).on('input', '#nilai_kontrak', function() {
        var nilai_anggaran = "{{ $pengadaan->nilai_anggaran }}"

        var nilai_kontrak = $('#nilai_kontrak').val()
        $('.f_nilai_kontrak').text(nf.format(nilai_kontrak))

        if (nilai_kontrak > nilai_anggaran) {
            swal("Oops!", "Nilai Kontrak tidak boleh melebihi Nilai Anggaran !", {
                icon: "error",
                buttons: {
                    confirm: {
                        className: 'btn btn-warning'
                    }
                },
            })

            $(this).val('')
            $('.f_nilai_kontrak').text('')
        }

    })

    $('#form_pelaksanaan').on('submit', function(e) {
        e.preventDefault()
        $.ajax({
            type: 'POST',
            url: "{!! url('pelaksanaan/create') !!}",
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
                        window.location = "{!! url('pengadaan/detail?id=' . $pengadaan->id . '&tab=pelaksana') !!}"
                    });
                }
            }
        })
    });

    $('#form_idd').on('submit', function(e) {
        e.preventDefault()
        $.ajax({
            type: 'POST',
            url: "{!! url('pelaksanaan/create-idd') !!}",
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
                        window.location = "{!! url('pengadaan/detail?id=' . $pengadaan->id . '&tab=pelaksana') !!}"
                    });
                }
            }
        })
    });

    $(document).on('click', '.btn-submit-pelaksanaan', function(e) {
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

    $('#idd_file').on('submit', function(e) {
        e.preventDefault()
        $.ajax({
            type: 'POST',
            url: "{!! url('pelaksana-idd/file/create') !!}",
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
                        window.location = "{!! url('pengadaan/detail?id=' . $pengadaan->id . '&tab=pelaksana') !!}"
                    });
                }
            }
        })
    });

    $('#pelaksanaan_file').on('submit', function(e) {
        e.preventDefault()
        $.ajax({
            type: 'POST',
            url: "{!! url('pelaksana-pengadaan/file/create') !!}",
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
                        window.location = "{!! url('pengadaan/detail?id=' . $pengadaan->id . '&tab=pelaksana') !!}"
                    });
                }
            }
        })
    });

    $(document).on('click', '.btn-update-pelaksanaan', function(e) {
        $('#fe_id').val($(this).data('id'))
        $('#fe_nomor_kontrak').val($(this).data('nomor_kontrak'))
        $('#e_tgl_kontrak').val($(this).data('tgl_kontrak'))
        $('#e_tgl_efektif').val($(this).data('tgl_efektif'))
        $('#e_tgl_akhir').val($(this).data('tgl_akhir'))
        $('#e_nilai_kontrak').val($(this).data('nilai_kontrak'))

        $('#e_mitra_id').val($(this).data('mitra_id'))
        $('#e_mitra_id').select2().trigger('change');

        $('#update-pelaksanaan').modal('show')
    })

    $('#form_update_pelaksanaan').on('submit', function(e) {
        e.preventDefault()
        $.ajax({
            type: 'post',
            url: "{!! url('pelaksanaan/update') !!}",
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

    $(document).on('click', '.btn-update-tgl-idd', function(e) {
        $('#fe_id').val($(this).data('id'))
        $('#fe_nomor_kontrak').val($(this).data('nomor_kontrak'))
        $('#e_tgl_kontrak').val($(this).data('tgl_kontrak'))
        $('#e_tgl_efektif').val($(this).data('tgl_efektif'))
        $('#e_tgl_akhir').val($(this).data('tgl_akhir'))
        $('#e_nilai_kontrak').val($(this).data('nilai_kontrak'))

        

        $('#update-idd-modal').modal('show')
    })

    $('#form_update_idd').on('submit', function(e) {
        e.preventDefault()
        $.ajax({
            type: 'post',
            url: "{!! url('pelaksanaan/update') !!}",
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
