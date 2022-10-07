<script>
    // $('#e_direksi_pk_id').select2({
    //     theme: "bootstrap"
    // });
    // $('#pengawas_pk_id').select2({
    //     theme: "bootstrap"
    // });
    // $('#pengawas_k3_id').select2({
    //     theme: "bootstrap"
    // });
    
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
        $('#e_metode_pengadaan').val($(this).data('metode_pengadaan'))
        
        $('#e_direksi_pk_id').val($(this).data('dpu_id'))
        $('#e_direksi_pk_id').select2({
            theme : 'bootstrap'
        }).trigger('change');
        
        $('#e_pengawas_pk_id').val($(this).data('ppku_id'))
        $('#e_pengawas_pk_id').select2({
            theme : 'bootstrap'
        }).trigger('change');
        
        $('#e_pengawas_k3_id').val($(this).data('ppk3u_id'))
        $('#e_pengawas_k3_id').select2({
            theme : 'bootstrap'
        }).trigger('change');
        
        $('#update-pengadaan-modal').modal('show')
        
        var metode_pengadaan = $(this).data('metode_pengadaan')
        if(metode_pengadaan === 'Kontrak Rinci'){
            $('.no-kontrak-blok').empty()
            $('.no-kontrak-blok').append(
            '<div class="form-group form-group-default">\
                <label>No. Kontrak KHS</label>\
                <select class="form-control" id="khs_pid" name="khs_pid" style="width:100%"></select>\
            </div>'
            )
            
            
            var khs_pid = $(this).data('khs_pid')
            loadKhsKontrak(khs_pid)
            console.log(khs_pid)

            // $('#khs_pid').val(khs_pid)
            // $('#khs_pid').select2({
            //     theme : 'bootstrap'
            // }).trigger('change');
            
            
        }else{
            $('.no-kontrak-blok').empty()
        }
    })

    function loadKhsKontrak(khs_pid) {
        $.ajax({
            type: 'GET',
            url: "{{ url('perencana-pengadaan/load-khs-kontrak') }}",
            success: function (r) {
                console.log(r)
                $('#khs_pid').empty()
                $('#khs_pid').append('<option value=""></option>')

                $.each(r.kontrak, function (i, d) {
                    $('#khs_pid').append('<option value="'+ d.id +'">' + d.pelaksanaan.nomor_kontrak + ' / ' + d.nama + ' / ' + d.pelaksanaan.mitra.nama + '</option>')
                })

                $('#khs_pid').val(khs_pid)
                $('#khs_pid').select2({
                    theme : 'bootstrap'
                }).trigger('change');

                // $('#khs_pid').select2({
                //     theme: "bootstrap"
                // });
            }
        })
    }
    
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
