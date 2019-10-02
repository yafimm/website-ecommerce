$('.detail-transaksi').click(function(e){
  let dataProduk = '';
  let totalBelanja = 0;

  e.preventDefault();

  id  = $(this).data('id');
  tanggalTransaksi = $(this).data('tanggal');
  statusTransaksi = $(this).data('status');
  ongkirTransaksi = parseInt($(this).data('ongkir'));
  usernameTransaksi = ($(this).data('user'));

  $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
  });

  $.ajax({
    type:'POST',
    url: 'http://localhost/portofoliorangerid/public/transaksi/detail',
    data : {id : id},
    success: function(response)
    {
      produk = response['produk'];
      alamat = response['alamat'];
      for(var data in response['produk']){
        totalBelanja += response['produk'][data].pivot.jumlah * response['produk'][data].pivot.harga;
        let index = parseInt(data) + 1;
        dataProduk += '<tr>' +
                            '<td>'+ index +'.   '+ response['produk'][data].nama +'</td>' +
                            '<td>'+ response['produk'][data].pivot.warna +'</td>' +
                            '<td>'+ response['produk'][data].pivot.size +'</td>' +
                            '<td>'+ response['produk'][data].pivot.jumlah +' Pcs </td>' +
                            '<td>Rp. '+ response['produk'][data].harga +'</td>' +

                        '</tr>';
      }
      // Baris total Belanja
      dataProduk +=  '<tr>' +
                      '<td class="font-weight-bold">Ongkos Kirim :</td>' +
                      '<td colspan="4" id="total-belanja">Rp. '+ ongkirTransaksi +'</td>' +
                    '</tr>' +
                    '<tr>' +
                      '<td class="font-weight-bold">Total :</td>' +
                      '<td colspan="4" id="total-belanja">Rp. '+ (totalBelanja + ongkirTransaksi) +'</td>' +
                    '</tr>';

      // Untuk mengganti warna status
      if(statusTransaksi == 'Sedang Dikirim'){
        $('#status-transaksi').attr('class', 'text-primary');
      }else if(statusTransaksi == 'Transaksi Selesai'){
        $('#status-transaksi').attr('class', 'text-success');
      }


      $('#id-transaksi').html(id);
      $('#status-transaksi').html(statusTransaksi);
      $('#user-transaksi').html(usernameTransaksi);
      $('#tanggal-transaksi').html(tanggalTransaksi);
      $('#data-produk').html(dataProduk);
      $('#alamat-transaksi').html(alamat.alamat_detail+', '+alamat.kota+', '+alamat.provinsi);
      $('.change-status-transaksi').attr('data-id', id);
      $("#detailModalTransaksi").modal('show');

    },
    error: function(jqXHR, textStatus, errorThrown) { // What to do if we fail
         console.log(JSON.stringify(jqXHR));
         console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
       }
  });

});


$('.change-status-transaksi').click(function(e){

    e.preventDefault();

    let id = $(this).data('id');
    let statusTransaksi = $(this).html();

    $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
      type:'POST',
      url: 'http://localhost/portofoliorangerid/public/transaksi/update_status',
      data : {id : id,
              newStatus : statusTransaksi},
      success: function(response){
        alert('Data Transaksi id '+ id +'   berhasil update status');
        if(response.status == 'Sedang Dikirim'){
            $('#row-'+id > '#status-'+id).attr('class', 'text-primary');
            $('#row-'+id > '#status-'+id).html(response['status']);
        }else if(response.status == 'Transaksi Selesai'){
            $('#row-'+id).remove();
        }
      },
      error: function(jqXHR, textStatus, errorThrown) { // What to do if we fail
           console.log(JSON.stringify(jqXHR));
           console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
     }
   });

});

$(document).on('change','#city_id',function(){
        let postalcode = $(this).find(':selected').attr('data-postal');
        let administrative = $(this).find(':selected').attr('data-administrative');
        $("input[name='postalcode']").val(postalcode);
        $("input[name='administrative']").val(administrative);
        let idkota =  $("#city_id").children("option:selected").val();
        let subtotal = convertToAngka($("#subtotal").html());
        if(idkota){
          $.ajaxSetup({
              headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
          });

          $.ajax({
            type:'POST',
            url: APP_URL + '/shipping',
            data: {
                   idkota:idkota
                  },
            success: function(response)
            {
              // console.log(response.costs[0].cost[0].value);
              let ongkir = response.costs[0].cost[0].value;
              // ongkir = ongkir.toString();
              let total = subtotal + ongkir;
              $('#ongkir').html(convertToRupiah(ongkir));
              $('#total').html(convertToRupiah(total));

            },
            error: function(jqXHR, textStatus, errorThrown) { // What to do if we fail
                 console.log(JSON.stringify(jqXHR));
                 console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
            }
          });
        }else{
          alert('Alamat Tujuan Kosong');
        }
});
