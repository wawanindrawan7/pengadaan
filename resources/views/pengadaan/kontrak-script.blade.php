<script>
    $(document).on('click','.btn-upload-file-nilai', function(){
        $('#pv_id').val($(this).data('id'))
    })

    $(document).on('click','.btn-edit-tgl', function(e){
        e.preventDefault()
        $('#e_tgl_id').val($(this).data('id'))
        $('#e_tgl_penilaian').val($(this).data('tgl_penilaian'))
        $('#e_dpt_non_dpt').val($(this).data('cat'))
        $('#edit-tgl-modal').modal('show')
    })
    $(document).on('click','.btn-edit-nilai-f1', function(e){
        e.preventDefault()
        $('#f1_id').val($(this).data('id'))
        $('#f1_nilai').val($(this).data('nilai'))
        $('#edit-nilai-f1-modal').modal('show')
    })
    $(document).on('click','.btn-edit-nilai-f2', function(e){
        e.preventDefault()
        $('#f2_id').val($(this).data('id'))
        $('#f2_nilai').val($(this).data('nilai'))
        $('#edit-nilai-f2-modal').modal('show')
    })

    $(document).on('click','.btn-edit-nilai-f3', function(e){
        e.preventDefault()
        $('#f3_id').val($(this).data('id'))
        $('#f3_nilai').val($(this).data('nilai'))
        $('#edit-nilai-f3-modal').modal('show')
    })

    $('#form_edit_nilai_f1').on('submit', function (e) {
        e.preventDefault()
        $.ajax({
            type: 'POST',
            url: "{!! url('manajemen-kontrak/edit-penilaian-f1') !!}",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            success: function (r) {
                console.log(r)
                if (r == 'success') {
                    swal("Good job!", "Simpan data berhasil !", {
                        icon: "success",
                        timer : 1500,
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
    });

    $('#form_edit_nilai_f3').on('submit', function (e) {
        e.preventDefault()
        $.ajax({
            type: 'POST',
            url: "{!! url('manajemen-kontrak/edit-penilaian-f3') !!}",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            success: function (r) {
                console.log(r)
                if (r == 'success') {
                    swal("Good job!", "Simpan data berhasil !", {
                        icon: "success",
                        timer : 1500,
                        buttons: {
                            confirm: {
                                className: 'btn btn-success'
                            }
                        },
                    }).then(function () {
                        location.reload()
                    });
                }else{
                    swal("Ops !", "Nilai melebihi 100 !", {
                        icon: "success",
                        timer : 1500,
                        buttons: {
                            confirm: {
                                className: 'btn btn-danger'
                            }
                        },
                    })
                }
            }
        })
    });
    $('#form_edit_nilai_f2').on('submit', function (e) {
        e.preventDefault()
        $.ajax({
            type: 'POST',
            url: "{!! url('manajemen-kontrak/edit-penilaian-f2') !!}",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            success: function (r) {
                console.log(r)
                if (r == 'success') {
                    swal("Good job!", "Simpan data berhasil !", {
                        icon: "success",
                        timer : 1500,
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
    });

    $('#form_edit_tgl').on('submit', function (e) {
        e.preventDefault()
        $.ajax({
            type: 'POST',
            url: "{!! url('manajemen-kontrak/edit-tgl-penilaian') !!}",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            success: function (r) {
                console.log(r)
                if (r == 'success') {
                    swal("Good job!", "Simpan data berhasil !", {
                        icon: "success",
                        timer : 1500,
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
    });

    $('#form_amandemen').on('submit', function (e) {
        e.preventDefault()
        $.ajax({
            type: 'POST',
            url: "{!! url('amandemen/create') !!}",
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
                        window.location = "{!! url('pengadaan/detail?id='.$pengadaan->id.'&tab=kontrak') !!}"
                    });
                }
            }
        })
    });

    $('#form_selesai').on('submit', function (e) {
        e.preventDefault()
        $.ajax({
            type: 'POST',
            url: "{!! url('pelaksanaan/selesai') !!}",
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
                        window.location = "{!! url('pengadaan/detail?id='.$pengadaan->id.'&tab=kontrak') !!}"
                    });
                }
            }
        })
    });
    $('#form_penilaian_file').on('submit', function (e) {
        e.preventDefault()
        $.ajax({
            type: 'POST',
            url: "{!! url('manajemen-kontrak/upload-penilaian') !!}",
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
                        window.location = "{!! url('pengadaan/detail?id='.$pengadaan->id.'&tab=kontrak') !!}"
                    });
                }
            }
        })
    });

    $(document).on('click', '.btn-reset', function(e) {
            var id = $(this).data('id')
            e.preventDefault()
            swal({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                type: 'warning',
                buttons: {
                    confirm: {
                        text: 'Yes, reset it!',
                        className: 'btn btn-success'
                    },
                    cancel: {
                        visible: true,
                        className: 'btn btn-danger'
                    }
                }
            }).then((Delete) => {
                if (Delete) {
                    $.ajax({
                        type: 'GET',
                        url: "{{ url('manajemen-kontrak/reset-penilaian?id=') }}" + id,
                        success: function(r) {
                            console.log(r)
                            if (r == 'success') {
                                swal({
                                    title: 'Reset !',
                                    text: 'Your file has been reset.',
                                    type: 'success',
                                    buttons: {
                                        confirm: {
                                            className: 'btn btn-success'
                                        }
                                    }
                                }).then(function() {
                                    window.location = "{!! url('pengadaan/detail?id='.$pengadaan->id.'&tab=kontrak') !!}"
                                });
                            }
                        }
                    })
                } else {
                    swal.close();
                }
            });
        })
</script>