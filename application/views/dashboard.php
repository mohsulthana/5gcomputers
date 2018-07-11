    <button class="btn btn-success glyphicon glyphicon-import" id="addNew">Add</button>
</div>

<div class="container">    
    <h1>Catatan Pemasukan</h1>
    <div class="alert alert-success" style="display: none;"></div>
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th>Data id</th>   
                <th>Nama</th>
                <th>Tanggal Masuk</th>
                <th>Tanggal Keluar</th>
                <th>Barang</th>
                <th>kerusakan</th>
                <th>Solusi</th>
                <th>Biaya</th>
                <th>Keterangan Biaya</th>
            </tr>
        </thead>
        <tbody id="tbody">
        </tbody> 
    </table>
</div>

<div id="myModal" class="modal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Add new data</h4>
      </div>
      <div class="modal-body">
        <form action="" method="POST" id=myForm class="form-horizontal">
            <input type="hidden" name="data_id" value="0">
            <div class="form-group">
                <label for="nama" class="control-label col-md-4" >Nama</label>
                    <div class="col-md-8">
                        <input id="nama" type="text" name="txtNama" class="form-control">
                    </div>
            </div>
            <!-- <div class="form-group">
                <label for="tgl_keluar" class="control-label col-md-4">Tanggal Keluar</label>
                    <div class="col-md-8">
                        <input type="date" name="tanggal_keluar">
                    </div>
            </div> -->
            <div class="form-group">
                <label class="control-label col-md-4">Barang service</label>
                    <div class="col-md-8">
                        <input id="barang" type="text" name="txtBarang" class="form-control">
                    </div>
            </div>
            <!-- <div class="form-group">
                <label for="kerusakan" class="control-label col-md-4">Komponen kerusakan</label>
                    <div class="col-md-8">
                        <input type="text" name="kerusakan" class="form-control">
                    </div>
            </div>
            <div class="form-group">
                <label for="solusi" class="control-label col-md-4">Cara Penyelesaian</label>
                    <div class="col-md-8">
                        <textarea name="solusi" id="#solusi" cols="50" rows="5"></textarea>
                    </div>
            </div>
            <div class="form-group">
                <label for="biaya" class="control-label col-md-4">Harga service</label>
                    <div class="col-md-8">
                        <input type="text" name="biaya" class="form-control">
                    </div>
            </div> -->
            <div class="form-group">
                <label for="ket_biaya" class="control-label col-md-4">Pelunasan harga</label>
                    <div class="col-md-8">
                        <select class="form-control" name="ket_biaya" id="">
                            <option value="Lunas">Lunas</option>
                            <option value="Belum Lunas">Belum Lunas</option>
                        </select>  
                    </div>
            </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" id="btnClose" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" id="btnSave" class="btn btn-primary">Save changes</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div id="myModalDelete" class="modal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Confirmation deletion</h4>
      </div>
      <div class="modal-body">
        Are you sure to delete this row?
      </div>
      <div class="modal-footer">
        <button type="button" id="btnClose" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" id="btnDelete" class="btn btn-danger">Delete</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<script>
$(document).ready(function() {
        showData();

        $('#addNew').click(function() {
            $('#myModal').modal('show');
            $('#myModal').find('.modal-title').text('Add new data');
            $('#myForm').attr('action', '<?php echo base_url();?>admin_c/addNewData')
        });

        $('#btnSave').click(function() {
            var url     = $('#myForm').attr('action');
            var data    = $('#myForm').serialize();
            var result  = "";

            //validate the form
            var nama        = $('input[name=txtNama]');
            var keluar      = $('input[name=tanggal_keluar]');
            var barang      = $('input[name=txtBarang]');
            var kerusakan   = $('input[name=kerusakan]');
            var solusi      = $('textarea[name=solusi]');
            var biaya       = $('input[name=biaya]');
            var ket_biaya   = $('input[name=ket_biaya]');

            if(nama.val() == "") nama.parent().parent().addClass('has-error');
            else{
                nama.parent().parent().removeClass('has-error');
                result += '1';
            }
            // if(keluar.val() == "") keluar.parent().parent().addClass('has-error');
            // else{
            //     keluar.parent().parent().removeClass('has-error');
            //     result += '2';
            // }
            if(barang.val() == "") barang.parent().parent().addClass('has-error');
            else{
                barang.parent().parent().removeClass('has-error');
                result += '3';
            }
            // if(kerusakan.val() == "") kerusakan.parent().parent().addClass('has-error');
            // else{
            //     kerusakan.parent().parent().removeClass('has-error');
            //     result += '4';
            // }
            // if(solusi.val() == "") solusi.parent().parent().addClass('has-error');
            // else{
            //     solusi.parent().parent().removeClass('has-error');
            //     result += '5';
            // }
            // if(biaya.val() == "") biaya.parent().parent().addClass('has-error');
            // else{
            //     biaya.parent().parent().removeClass('has-error');
            //     result += '6';
            // }

            if(result == '13'){
                $.ajax({
                    type        : 'ajax',
                    method      : 'POST',
                    dataType    : 'json',
                    url         : url,
                    data        : data,
                    async       : true,
                    success     : function(response) {
                        if(response.success == true) {
                            $('#myModal').modal('hide');
                            $('#myForm')[0].reset();
                                if(response.type == 'add') {
                                    $('.alert-success').html('Data is successfully added').fadeIn().delay(4000).fadeOut("slow");
                                } else if(response.type == 'update') {
                                    $('.alert-success').html('Data is successfully updated').fadeIn().delay(4000).fadeOut("slow");   
                                }
                            showData();
                        } else{
                            alert("Error");
                        }
                    },
                    error       : function() {
                        alert("Tidak dapat menambahkan data");
                    }
                })
            }
        });
        
        //edit
        $('#tbody').on('click', '.item-edit', function(){
            var id = $(this).attr('data');
            $('#myModal').modal('show');
            $('#myModal').find('.modal-title').text("Edit data");
            $('#myForm').attr('action', '<?php echo base_url();?>admin_c/updateData');
            $.ajax({
                type        : 'ajax',
                method      : 'GET',
                url         : '<?php echo base_url();?>admin_c/editData',
                data        : {id: id},
                async       : true,
                dataType    : 'json',
                success     : function(data) {
                        $('input[name=txtId]').val(data.data_id);
                        $('input[name=txtNama]').val(data.nama);
                        // $('input[name=tanggal_keluar]').val(data.tanggal_keluar);
                        $('input[name=txtBarang]').val(data.barang);
                        // $('input[name=kerusakan]').val(data.kerusakan);
                        // $('textarea[name=solusi]').val(data.solusi);
                        // $('input[name=biaya]').val(data.biaya);
                        $('input[name=ket_biaya]').val(data.ket_biaya);
                },
                error       : function() {
                    alert("Tidak bisa mengedit data");
                }
            });
        });

        //delete
        $('#tbody').on('click', '.item-delete', function(){
            var id = $(this).attr('data');
            $('#myModalDelete').modal('show');
            //prevent previous handler = unbind()
            $('#btnDelete').unbind().click(function() {
                $.ajax({
                    method      : 'GET',
                    type        : 'ajax',
                    dataType    : 'json',
                    data        : {id: id},
                    url         : '<?php echo base_url();?>admin_c/deleteData',
                    asyc        : true,
                    success     : function(response) {
                        $('.alert-success').html("Data is successfully deleted").fadeIn().delay(4000).fadeOut("slow");
                        $('#myModalDelete').modal('hide');
                        showData();
                    },
                    error       : function() {
                        alert("Cannot delete the data");
                    }
                });
            });
        });  
        
        function showData() {
            $.ajax({
                type        : 'ajax',
                url         : '<?php echo base_url();?>admin_c/showData',
                async       : true,
                dataType    : 'json',
                success     : function(data) {
                    var html = "";
                    var i;
                    for(i=0; i<data.length; i++) {
                        html += '<tr>' +
                                    '<td>' + data[i].data_id + '</td>' +
                                    '<td>' + data[i].nama + '</td>' +
                                    '<td>' + data[i].tanggal_masuk + '</td>' +
                                    '<td>' + data[i].tanggal_keluar + '</td>' +
                                    '<td>' + data[i].barang + '</td>' +
                                    '<td>' + data[i].kerusakan + '</td>' +
                                    '<td>' + data[i].solusi + '</td>' +
                                    '<td>' + data[i].biaya + '</td>' +
                                    '<td>' + data[i].ket_biaya + '</td>' +
                                    '<td>' +
                                        '<a href="javascript:;" class="btn btn-info item-edit" data="'+ data[i].data_id +'">Edit</a> ' +
                                        '<a href="javascript:;" class="btn btn-danger item-delete" data="'+ data[i].data_id +'">Delete</a>' +
                                    '</td>' +
                                '</tr>';
                    }
                    $("#tbody").html(html);
                },
                error       : function() {
                    alert("Tidak berhasil");
                }
            });
        }
    });
</script>