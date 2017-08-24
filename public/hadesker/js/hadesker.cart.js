$(document).ready(function () {
    var kq = false;
    function updateCart(rowId,isRemove,id,qty,size,color) {
        var d = $.Deferred();
        $.ajax({
            async:false,
            url:'cart/add-to-cart',
            type:"POST",
            dataType:'json',
            data:{
                rowId:rowId,
                isRemove:isRemove,
                id:id,
                qty:qty,
                size:size,
                color:color
            }
        }).done(function(re){
            if(re.status)
            {
                $('.cart-icon').html(re.total);
                kq = true;
            }
            else
                kq = false;
            d.resolve();
        }).fail(function(e){
            alert(e.statusText);
        });
        return d.promise();
    }
   $('.btn-add-to-cart').click(function (e) {
       e.preventDefault();
       var id = $(this).data('id');
       var qty = $('.input-quantity').val();
       var size = $('.select-size').find('.active').find('input').val();
       var color = $('.select-color').find('.active').css('background-color');
       updateCart(0,0,id,qty,size,color);
   });

   $('.btn-remove-cart').click(function () {
       var id = $(this).data('rowid');
       updateCart(id,1,null,null,null,null).done(function () {
           if(kq)
           {
               $('tr#'+id).fadeOut( "slow" );
               window.location.reload();
           }
       });
   });

    $('input[name="quantity"]').change(function () {
        var id = $(this).parent().parent().attr('id');
        var qty = $(this).val();
        updateCart(id,0,null,qty,null,null).done(function () {
            if(kq)
            {
                $('tr#'+id).fadeOut( "slow" );
                window.location.reload();
            }
        });
    });

    // Get thông tin tỉnh, quận, huyện
    $("#province_id").change(function() {
        var province_id = $(this).find(":selected").val();
        if(province_id.length < 2)
            province_id = '0'+province_id;
        var request = $.ajax({
            type: 'GET',
            dataType:'json',
            url: 'cart/district/' + province_id,
        });
        request.done(function(data){
            $("#district_id").empty();
            $.each(data,function (key,value) {
                $("#district_id").append(
                    $("<option></option>").attr(
                        "value", value.districtid).text(value.type+' '+value.name)
                );
            });
            $('#district_id').selectpicker('refresh');
            $("#district_id").trigger('change');
            setAddress();
        });
    });
    $("#district_id").change(function() {
        var district_id = $(this).find(":selected").val();
        console.log(district_id.length);
        while(district_id.length < 3)
            district_id = '0'+district_id;
        var request = $.ajax({
            type: 'GET',
            dataType:'json',
            url: 'cart/ward/' + district_id,
        });
        request.done(function(data){
            $("#ward_id").empty();
            $.each(data,function (key,value) {
                $("#ward_id").append(
                    $("<option></option>").attr(
                        "value", value.wardid).text(value.type+' '+value.name)
                );
            });
            $('#ward_id').selectpicker('refresh');
            setAddress();
        });
    });
    $("#province_id").trigger('change');

    $("#ward_id").change(function() {
        setAddress();
    });
    
    //Next///
    $('.custom-form').submit(function (e) {
        var soluong = $('.cart-icon').html();
        if(soluong < 1)
        {
            e.preventDefault();
            alert('Giỏ hàng của bạn chưa có sản phẩm nào, vui lòng thêm sản phẩm vào giỏ hàng để tiếp tục');
        }
    });

    function setAddress() {
        var ward = $("#ward_id option:selected").text();
        var district = $("#district_id option:selected").text();
        var province = $("#province_id option:selected").text();
        var address = ward + ', '+district+', '+province;
        $('#address').val(address);
    }

});