var size;


function loadCart(){
    let html = '';
    let count = 0;
    let totalHarga = 0;
    let display = 0;
    let htmlMore='';

    $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        type:'GET',
        url: APP_URL + '/public/cart/basket',
        dataType: "JSON",
        async: false,
        cache: false,
        success: function(response)
        {
          for(var data in response){
            if(display < 4){
                html += '<li class="header-cart-item flex-w flex-t m-b-12">' +
                        '<div class="header-cart-item-img">' +
                          '<img src="http://localhost/portofoliorangerid/public/images/produk/'+response[data].options["image"]+'" alt="IMG">' +
                        '</div>' +

                        '<div class="header-cart-item-txt p-t-8">' +
                          '<a href="#" class="header-cart-item-name m-b-18 hov-cl1 trans-04">' +
                            response[data].name +
                          '</a>' +

                          '<span class="header-cart-item-info">' +
                             response[data].qty +' x Rp. '+response[data].price  +
                          '</span>' +
                        '</div>' +
                      '</li>';
                  display++;
            }else{
              let lebih = (count - display) + 1; // + 1 karena dimulai dari 0
              htmlMore = "<div>"+ lebih  +" More Item T in Cart</div>";
            }
              count++;
              totalHarga += response[data].price * response[data].qty;
          }
          html += htmlMore;
          $('#cart-number-mobile').attr('data-notify', count);
          $('#cart-number').attr('data-notify', count);
          $('#cart-list').html(html);
          $('#total-cart').html('Total: Rp. '+ totalHarga)
          totalAll();
          // console.log(response);
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

  // loadCart();

  $(document).on('change','#city_id',function(){
          let postalcode = $(this).find(':selected').attr('data-postal');
          $("input[name='postalcode']").val(postalcode);
          idkota =  $("#city_id").children("option:selected").val();

          if(idkota){
            $.ajaxSetup({
                headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
              type:'POST',
              url: 'http://localhost/portofoliorangerid/public/cart/cekongkos',
              data: {
                     idkota:idkota
                    },
              success: function(response)
              {
                let ongkir = response['results'][0].costs[0].cost[0].value;
                ongkir = money_format(ongkir);
                $('#ongkir').html(ongkir);
                totalAll();

                // console.log(response['results'][0].costs[0].cost[0].value);
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
          // loadCart();
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
        // loadCart();

      },
      error: function(jqXHR, textStatus, errorThrown) { // What to do if we fail
           console.log(JSON.stringify(jqXHR));
           console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
         }
    });

  });

  $('.qty-cart').on('change', function() {
    let harga = $(this).data('price') * this.value;
    $('#total-price-'+$(this).data('id')).html('Rp. '+ harga)
  });
