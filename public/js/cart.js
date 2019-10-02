var size;


function totalCountCart(){
    $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        type:'GET',
        url: APP_URL + '/cart/basket',
        dataType: "JSON",
        async: false,
        cache: false,
        success: function(response)
        {
          $('#cart-number').html(response);
        },
        error: function(jqXHR, textStatus, errorThrown) { // What to do if we fail
             console.log(JSON.stringify(jqXHR));
             console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
         }
    });

}


function totalCart(){
  $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
  });

  $.ajax({
    type:'GET',
    url: 'http://localhost/portofoliorangerid/public/cart/total',
    success: function(response)
    {
      $('#totalhargaprodukinvoice').html(response);
      totalAll();
    },
    error: function(jqXHR, textStatus, errorThrown) { // What to do if we fail
         console.log(JSON.stringify(jqXHR));
         console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
     }
  });

}

function totalAll(){
  let totalCart = $('#totalhargaprodukinvoice').val();
  totalCart = parseInt(totalCart);
  let totalOngkir = $('#ongkir').html();
  // console.log(totalOngkir);
  totalOngkir = money_unformat(totalOngkir);
  let total = totalCart + totalOngkir;
  total = money_format(total);
  // console.log(totalCart);
  $('#totalAll').html(total);
}

  totalCountCart();


  $('#add-to-cart').click(function(e){
      e.preventDefault();

      $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });

      $.ajax({
        type:'POST',
        url: APP_URL + '/cart/add',
        data: {
               id: $('input[name="id"]').val(),
               jumlah: $('input[name="jumlah"]').val(),
              },
        success: function(response)
        {
          Swal.fire(response, "is added to cart !", "success");
          // loadCart();
        },
        error: function(jqXHR, textStatus, errorThrown) { // What to do if we fail
             console.log(JSON.stringify(jqXHR));
             console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
         }
      });

  });


  $('.add-to-cart').click(function(e){
      e.preventDefault();

      $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });

      $.ajax({
        type:'POST',
        url: APP_URL + '/cart/add',
        data: {
               id: $(this).data('id'),
               jumlah: 1,
              },
        success: function(response)
        {
          Swal.fire(response, "is added to cart !", "success");
          totalCountCart();
        },
        error: function(jqXHR, textStatus, errorThrown) { // What to do if we fail
             console.log(JSON.stringify(jqXHR));
             console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
         }
      });

  });

  $('.delete-cart').click(function(e){
    e.preventDefault();
    id  = $(this).data('id');
    $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
      type:'POST',
      url: APP_URL + '/cart/remove',
      data : {rowId : id},
      success: function(response)
      {
        Swal.fire(response, "Delete Item in Cart has been success");
        $('#row-'+id).remove();
        // totalCart();
        totalCountCart();
        // loadCart();

      },
      error: function(jqXHR, textStatus, errorThrown) { // What to do if we fail
           console.log(JSON.stringify(jqXHR));
           console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
         }
    });

  });

  $('.qty-cart').on('change', function() {
    let hargaawal = $(this).data('price');
    let hargasekarang = hargaawal * this.value;
    let subtotal = convertToAngka($('#subtotal-cart').html()) - hargaawal;
    $('#total-price-' +$(this).data('id')).html(convertToRupiah(hargasekarang));
    // $('#subtotal-cart').html(convertToRupiah(subtotal + hargasekarang));
    let hargaterakhir = subtotal + hargasekarang;
  });
