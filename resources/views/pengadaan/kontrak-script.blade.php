<script>
    $(document).on('click','.btn-upload-file-nilai', function(){
        $('#pv_id').val($(this).data('id'))
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
</script>