<script>
    $('#e_users_komite').select2({
        theme: "bootstrap"
    });

    $(document).on('input','#e_nilai_hpe', function(){
        var nilai_anggaran = "{{ $pengadaan->nilai_anggaran }}"

        var nilai_hpe = $('#e_nilai_hpe').val()
        $('.f_nilai_hpe').text(nf.format(nilai_hpe))

        if(nilai_hpe > nilai_anggaran){
            swal("Oops!", "Nilai HPE tidak boleh melebihi Nilai Anggaran !", {
                icon: "error",
                buttons: {
                    confirm: {
                        className: 'btn btn-warning'
                    }
                },
            })

            $(this).val(0)
            $('.f_nilai_hpe').text(0)
        }

    })

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

    function countJumlah(){
        var vol_1 = $('#hpe_vol_1').val()
        var vol_2 = $('#hpe_vol_2').val()
        var harga_satuan = $('#hpe_harga_satuan').val()

        var jumlah = 0

        if(vol_2 == '' || vol_2 == 0){
            jumlah = vol_1 * harga_satuan
        }else{
            jumlah = vol_1 * vol_2 * harga_satuan
        }
        $('#hpe_jumlah').val(jumlah)
        $('#f_hpe_jumlah').val(nf.format(jumlah))

    }

    $(document).on('input','#hpe_vol_1', function(){
        countJumlah()
    })
    $(document).on('input','#hpe_vol_2', function(){
        countJumlah()
    })
    $(document).on('input','#hpe_harga_satuan', function(){
        countJumlah()
    })

    $(document).on('click', '.btn-edit-hpe', function(e) {
        e.preventDefault()
        $('#hpe_id').val($(this).data('id'))
        $('#hpe_item').val($(this).data('item'))
        $('#hpe_satuan').val($(this).data('satuan'))
        $('#hpe_vol_1').val($(this).data('vol_1'))
        $('#hpe_vol_2').val($(this).data('vol_2'))
        $('#hpe_harga_satuan').val($(this).data('harga_satuan'))
        $('#hpe_jumlah').val($(this).data('jumlah'))
        $('#f_hpe_jumlah').val(nf.format($(this).data('jumlah')))
        $('#edit-hpe-modal').modal('show')
    })

    $(document).on('click', '.btn-update-perencanaan', function(e) {
        
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
        $('#epr_kebutuhan').val($(this).data('kebutuhan'))
        $('#epr_volume').val($(this).data('volume'))
        $('#epr_jumlah_pengguna').val($(this).data('jumlah_pengguna'))
        $('#epr_penyedia').val($(this).data('penyedia'))
        $('#epr_jumlah_vendor').val($(this).data('jumlah_vendor'))

        var users_vfm = $(this).data('vfm')
        var ids = []
        $.each(users_vfm, function(i, d){
            ids.push(d.users_id)
        })

        $('#e_users_komite').val(ids).trigger('change')
        console.log(ids)
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

    $('#form_edit_hpe').on('submit', function(e) {
        e.preventDefault()
        $.ajax({
            type: 'post',
            url: "{!! url('perencana-pengadaan/edit-hpe') !!}",
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

    $(document).on('click', '.btn-update-nodin-perencanaan', function(e) {
        console.log($(this).data('no_nota_dinas'))
        $('#nodin_pp_id').val($(this).data('id'))
        
        $('#pp_no_nota_dinas').val($(this).data('no_nota_dinas'))
        $('#pp_tgl_nota_dinas').val($(this).data('tgl_nota_dinas'))
        $('#update-nodin-perencanaan-modal').modal('show')
    })

    $('#form_update_nodin_perencanaan').on('submit', function(e) {
        e.preventDefault()
        $.ajax({
            type: 'post',
            url: "{!! url('perencana-pengadaan/update-nodin') !!}",
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
