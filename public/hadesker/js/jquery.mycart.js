﻿(function ($) {

  var OptionManager = (function () {
    var objToReturn = {};

    var defaultOptions = {
      classCartIcon: 'my-cart-icon',
      classCartBadge: 'my-cart-badge',
      classProductQuantity: 'my-product-quantity',
      classProductRemove: 'my-product-remove',
      classCheckoutCart: 'my-cart-checkout',

        linkdathang: 'dat-hang',

      affixCartIcon: true,
      showCheckoutModal: true,
      clickOnAddToCart: function($addTocart) { },
      clickOnCartIcon: function($cartIcon, products, totalPrice, totalQuantity) { },
      checkoutCart: function(products, totalPrice, totalQuantity) { },
      //getDiscountPrice: function(products, totalPrice, totalQuantity) { return null; }
    };


    var getOptions = function (customOptions) {
      var options = $.extend({}, defaultOptions);
      if (typeof customOptions === 'object') {
        $.extend(options, customOptions);
      }
      return options;
    }

    objToReturn.getOptions = getOptions;
    return objToReturn;
  }());


  var ProductManager = (function(){
    var objToReturn = {};

    /*
    PRIVATE
    */
    localStorage.products = localStorage.products ? localStorage.products : "";
    var getIndexOfProduct = function(id){
      var productIndex = -1;
      var products = getAllProducts();
      $.each(products, function(index, value){
        if(value.id == id){
          productIndex = index;
          return;
        }
      });
      return productIndex;
    }
    var setAllProducts = function(products){
      localStorage.products = JSON.stringify(products);
    }
    var addProduct = function(id, name, summary, price, quantity, image) {
      var products = getAllProducts();
      products.push({
        id: id,
        name: name,
        summary: summary,
        price: price,
        quantity: quantity,
        image: image
      });
      setAllProducts(products);
    }

    /*
    PUBLIC
    */


    var getAllProducts = function(){
      try {
        var products = JSON.parse(localStorage.products);
        return products;
      } catch (e) {
        return [];
      }
    }
    var updatePoduct = function(id, quantity) {
      var productIndex = getIndexOfProduct(id);
      if(productIndex < 0){
        return false;
      }
      else{
        $('#tontaitronggiohang').modal('show');
        return true;
      }


      var products = getAllProducts();
      products[productIndex].quantity = typeof quantity === "undefined" ? products[productIndex].quantity * 1 + 1 : quantity;
      setAllProducts(products);
      return true;
    }
    var setProduct = function(id, name, summary, price, quantity, image) {
      if(typeof id === "undefined") {
          console.error("id required");
        return false;
      }
      if(typeof name === "undefined") {
          console.error("name required");
        return false;
      }
      if(typeof image === "undefined") {
          console.error("image required");
        return false;
      }
      if(!$.isNumeric(price)) {
          console.error("price is not a number");
        return false;
      }
      if(!$.isNumeric(quantity)) {
        console.error("quantity is not a number");
        return false;
      }
      summary = typeof summary === "undefined" ? "" : summary;

      if(!updatePoduct(id)){
        addProduct(id, name, summary, price, quantity, image);
      }
    }
    var clearProduct = function(){
      setAllProducts([]);
    }
    var removeProduct = function(id){
      var products = getAllProducts();
      products = $.grep(products, function(value, index) {
        return value.id != id;
      });
      setAllProducts(products);
    }
    var getTotalQuantity = function(){
      var total = 0;
      var products = getAllProducts();
      $.each(products, function(index, value){
        total += value.quantity * 1;
      });
      return total;
    }
    var getTotalPrice = function(){
      var products = getAllProducts();
      var total = 0;
      $.each(products, function(index, value){
        total += value.quantity * value.price;
      });
      return total;
    }

    objToReturn.getAllProducts = getAllProducts;
    objToReturn.updatePoduct = updatePoduct;
    objToReturn.setProduct = setProduct;
    objToReturn.clearProduct = clearProduct;
    objToReturn.removeProduct = removeProduct;
    objToReturn.getTotalQuantity = getTotalQuantity;
    objToReturn.getTotalPrice = getTotalPrice;
    return objToReturn;
  }());


    var st= 'dadfdsfdsf';

  var loadMyCartEvent = function(userOptions){

    var options = OptionManager.getOptions(userOptions);
    var $cartIcon = $("." + options.classCartIcon);
    var $cartBadge = $("." + options.classCartBadge);
    var classProductQuantity = options.classProductQuantity;
    var classProductRemove = options.classProductRemove;
    var classCheckoutCart = options.classCheckoutCart;

    var idCartModal = 'my-cart-modal';
    var idCartTable = 'my-cart-table';
    var idEmptyCartMessage = 'my-cart-empty-message';
    var classProductTotal = 'my-product-total';

    

    $cartBadge.text(ProductManager.getTotalQuantity());

    if(!$("#" + idCartModal).length) {
      $('body').append(
        '<div class="modal fade" id="' + idCartModal + '" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">' +
        '<div class="modal-dialog" role="document">' +
        '<div class="modal-content">' +
        '<div class="modal-header">' +
        '<button type="button" class="close" data-dismiss="modal" aria-label="Đóng"><span aria-hidden="true">&times;</span></button>' +
        '<h4 class="modal-title" id="myModalLabel"><span class="glyphicon glyphicon-shopping-cart"></span> '+options.title+'</h4>' +
        '</div>' +
        '<div class="modal-body">' +
        '<table class="table table-hover table-responsive" >'+
        '<thead>'+
        '<tr>'+
        '<th style="text-align: center; vertical-align: middle;width: 20%">'+options.masp+'</th>'+
        '<th style="text-align: center; vertical-align: middle;width: 15%">'+options.hinhanh+'</th>'+
        '<th style="text-align: left; vertical-align: middle;width: 60%;">'+options.tensp+'</th>'+
        '<th style="text-align: center; vertical-align: middle;width: 5%"></th>'+
        '</tr>'+
        '</thead>'+
        '<tbody id="' + idCartTable + '"></tbody>'+
        '</table>' +
        '</div>' +
        '<div class="modal-footer">' +
        '<a href="'+options.linkdathang+'"><button type="button" class="btn btn-primary" style="font-weight:bold; margin-right:2%" >'+options.dathang+'</button></a>'+
        '<button type="button" class="btn btn-warning" data-dismiss="modal">'+options.dong+'</button>' +
        '</div>' +
        '</div>' +
        '</div>' +
        '</div>'
      );
    }

    var drawTable = function(){
      var $cartTable = $("#" + idCartTable);
      $cartTable.empty();

      var products = ProductManager.getAllProducts();
      $.each(products, function(){
        //var total = this.quantity * this.price;
        $cartTable.append(

          '<tr title="' + this.summary + '" data-id="' + this.id + '" data-price="' + this.price + '">' +
          '<td style="text-align: center; vertical-align: middle;width: 20%;font-weight: bold;">' + this.summary + '</td>' +
          '<td style="text-align: center; vertical-align: middle;width: 15%"><img class="img-thumbnail" width="95px" height="50px" src="' + this.image + '"/></td>' +
          '<td style="text-align: left; vertical-align: middle;width: 60%;">' + this.name + '</td>' +
          '<td title="'+options.xoasanphamnaykhoidonhang+'" class="text-center" style="text-align: center; vertical-align: middle;width: 5%;"><a href="javascript:void(0);" class="btn btn-sm btn-danger ' + classProductRemove + '"><i class="fa fa-trash-o"></i></a></td>' +
          '</tr>'

        );
      });

      $cartTable.append(products.length ?
          ""
        : '<tr><td colspan="4" class="alert alert-danger" role="alert" id="' + idEmptyCartMessage + '">'+options.emptycart+'</td></tr>'
      );

    }
    var showModal = function(){
      drawTable();
      $("#" + idCartModal).modal('show');
    }
    var updateCart = function(){
      $.each($("." + classProductQuantity), function(){
        var id = $(this).closest("tr").data("id");
        ProductManager.updatePoduct(id, $(this).val());
      });
    }


    $cartIcon.click(function(){
      options.showCheckoutModal ? showModal() : options.clickOnCartIcon($cartIcon, ProductManager.getAllProducts(), ProductManager.getTotalPrice(), ProductManager.getTotalQuantity());
    });

    $(document).on("input", "." + classProductQuantity, function () {
      var price = $(this).closest("tr").data("price");
      var id = $(this).closest("tr").data("id");
      var quantity = $(this).val();

      $(this).parent("td").next("." + classProductTotal).text(dauphancach(price * quantity));
      //$(this).parent("td").next(".my-product-total1").text('1');
      ProductManager.updatePoduct(id, quantity);

      $cartBadge.text(ProductManager.getTotalQuantity());
      // showGrandTotal();
      // showDiscountPrice();
    });

    $(document).on('keypress', "." + classProductQuantity, function(evt){
      if(evt.keyCode == 38 || evt.keyCode == 40){
        return ;
      }
      evt.preventDefault();
    });

    $(document).on('click', "." + classProductRemove, function(){
      var $tr = $(this).closest("tr");
      var id = $tr.data("id");
      $tr.hide(500, function(){
        ProductManager.removeProduct(id);
        drawTable();
        $cartBadge.text(ProductManager.getTotalQuantity());
      });
    });

    $("." + classCheckoutCart).click(function(){
      var products = ProductManager.getAllProducts();
      if(!products.length) {
        $("#" + idEmptyCartMessage).fadeTo('fast', 0.5).fadeTo('fast', 1.0);
        return ;
      }
      updateCart();
      options.checkoutCart(ProductManager.getAllProducts(), ProductManager.getTotalPrice(), ProductManager.getTotalQuantity());
      ProductManager.clearProduct();
      $cartBadge.text(ProductManager.getTotalQuantity());
      $("#" + idCartModal).modal("hide");
    });

  }


  var MyCart = function (target, userOptions) {
    /*
    PRIVATE
    */
    var $target = $(target);
    var options = OptionManager.getOptions(userOptions);
    // var $cartIcon = $("." + options.classCartIcon);
    var $cartBadge = $("." + options.classCartBadge);

    /*
    EVENT
    */
    $target.click(function(){
      options.clickOnAddToCart($target);

      var id = $target.data('id');
      var name = $target.data('name');
      var summary = $target.data('summary');
      var price = $target.data('price');
      var quantity = $target.data('quantity');
      var image = $target.data('image');

      ProductManager.setProduct(id, name, summary, price, quantity, image);
      $cartBadge.text(ProductManager.getTotalQuantity());
    });

  }


  $.fn.myCart = function (userOptions) {
    loadMyCartEvent(userOptions);
    return $.each(this, function () {
      new MyCart(this, userOptions);
    });
  }

})(jQuery);
