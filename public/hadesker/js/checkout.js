/**
 * Created by Hadesker on 10/02/2017.
 */
var getAllProductsx = function () {
    try {
        var products = JSON.parse(localStorage.products);
        return products;
    } catch (e) {
        return [];
    }
}
var products = getAllProductsx();

console.log(products);

if (products.length > 0) {
    //console.log(products);
    var html = '';
    var template = $('#data-template').html();
    var stt = 1;
    $.each(products, function (i, item) {
        html += Mustache.render(template, {
            ID: item.id,
            MaSP: item.summary,
            IMAGE: item.image,
            NAME: item.name,
            QUANTITY: item.quantity,
            THANHTIEN: item.price*item.quantity
        });
        stt++;
    });
    $('#productslist').html(html);
};

function idproducts(){
    var ids = [];
    $.each(products, function (i, item) {
        ids.push(item.id);
    });
    return ids;
};

$( document ).ready(function () {
    $('#yeucaudathang').click(function () {
        if(checkrequired()){
            var data = {
                HoTenKH: hoten.val(),
                DiaChiEmail: diachi.val(),
                DienThoai: dienthoai.val(),
                KhuVuc: khuvuc.val(),
                GhiChu : ghichu.val(),
                _token:token,
                SanPham:idproducts()
            };
            console.log(data);
            sendRequest(data);
        }
    });
});

var s = 15;
var timeout = null;
function start()
{
    if(s==0)
    {
        window.location.href = "#";
        $('#timer').html(0);
    }
    else {
        $('#timer').html(s.toString());
        timeout = setTimeout(function () {
            s--;
            start();
        }, 1000);
    }
};

function sendRequest(data) {
    $.ajax({
        url: 'dat-hang/process',
        type: 'POST',
        dataType: 'text',
        data: JSON.stringify(data),
        contentType: "application/json",
        success: function (response) {
            modaltitle.html(_titlesuccess);
            modalbody.html(bodysuccess);
            $('#thankyou').modal('show');
            start();
        },
        error:function (response) {
            modaltitle.html(_titleerror);
            modalbody.html(bodyerror);
            $('#thankyou').modal('show');
            console.log(response);
        }
    });
}


var token = setting.token;

var modalbody = $('.modal-body');
var modaltitle = $('.modal-title');

var hoten = $('#HoTenKH');
var diachi = $('#DiaChiEmail');
var dienthoai= $('#DienThoai');
var khuvuc = $('#KhuVuc');
var ghichu = $('#GhiChu');

var _titlesuccess = '<span style="color:#00DD00" class="glyphicon glyphicon-ok-circle"></span> '+setting.titlesuccess;
var _titleerror = '<span style="color:red" class="glyphicon glyphicon-remove-circle"></span> '+setting.titleerror;

var bodysuccess = setting.bodysuccess;
var bodyerror = setting.bodyerror;

function checkrequired() {
    if (products.length == 0) {
        modaltitle.html(_titleerror);
        modalbody.html(bodyerror);
        $('#thankyou').modal('show');
        start();
        return false;
    }
    $('.hiddentextg').css('display','none');
    if(hoten.val() == '')
    {
        hoten.parent('.form-group').find('.hiddentext').css('display', 'block');
        hoten.focus();
        return false;
    }
    if(diachi.val() == '' || !isEmail(diachi.val()))
    {
        diachi.parent('.form-group').find('.hiddentext').css('display', 'block');
        diachi.focus();
        return false;
    }
    if(dienthoai.val() == '' || isNaN(dienthoai.val()) == true)
    {
        dienthoai.parent('.form-group').find('.hiddentext').css('display', 'block');
        dienthoai.focus();
        return false;
    }

    var verified = grecaptcha.getResponse();
    if(verified.length === 0)
    {
        $('.hiddentextg').css('display','block');
        return false;
    }

    return true;
}
function isEmail(email) {
    var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    return regex.test(email);
}