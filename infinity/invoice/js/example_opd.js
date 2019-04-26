var counter = 0;
function print_today() {
  // ***********************************************
  // AUTHOR: WWW.CGISCRIPT.NET, LLC
  // URL: http://www.cgiscript.net
  // Use the script, just leave this message intact.
  // Download your FREE CGI/Perl Scripts today!
  // ( http://www.cgiscript.net/scripts.htm )
  // ***********************************************
  var now = new Date();
  var months = new Array('January','February','March','April','May','June','July','August','September','October','November','December');
  var date = ((now.getDate()<10) ? "0" : "")+ now.getDate();
  function fourdigits(number) {
    return (number < 1000) ? number + 1900 : number;
  }
  var today =  months[now.getMonth()] + " " + date + ", " + (fourdigits(now.getYear()));
  return today;
}
$(".discount").on("keyup",function(){
	update_total()
})
$("#paid").on("keyup",function(){
	update_balance()
})
// from http://www.mediacollege.com/internet/javascript/number/round.html
function roundNumber(number,decimals) {
  var newString;// The new rounded number
  decimals = Number(decimals);
  if (decimals < 1) {
    newString = (Math.round(number)).toString();
  } else {
    var numString = number.toString();
    if (numString.lastIndexOf(".") == -1) {// If there is no decimal point
      numString += ".";// give it one at the end
    }
    var cutoff = numString.lastIndexOf(".") + decimals;// The point at which to truncate the number
    var d1 = Number(numString.substring(cutoff,cutoff+1));// The value of the last decimal place that we'll end up with
    var d2 = Number(numString.substring(cutoff+1,cutoff+2));// The next decimal, after the last one we want
    if (d2 >= 5) {// Do we need to round up at all? If not, the string will just be truncated
      if (d1 == 9 && cutoff > 0) {// If the last digit is 9, find a new cutoff point
        while (cutoff > 0 && (d1 == 9 || isNaN(d1))) {
          if (d1 != ".") {
            cutoff -= 1;
            d1 = Number(numString.substring(cutoff,cutoff+1));
          } else {
            cutoff -= 1;
          }
        }
      }
      d1 += 1;
    }
    if (d1 == 10) {
      numString = numString.substring(0, numString.lastIndexOf("."));
      var roundedNum = Number(numString) + 1;
      newString = roundedNum.toString() + '.';
    } else {
      newString = numString.substring(0,cutoff) + d1.toString();
    }
  }
  if (newString.lastIndexOf(".") == -1) {// Do this again, to the new string
    newString += ".";
  }
  var decs = (newString.substring(newString.lastIndexOf(".")+1)).length;
  for(var i=0;i<decimals-decs;i++) newString += "0";
  //var newNumber = Number(newString);// make it a number if you like
  return newString; // Output the result to the form field (change for your purposes)
}

function update_total() {
  var total = 0;
  debugger;
  var sub_total = 0;
  $('.price').each(function(i){
    price = $(this).val().replace("₹","");
    if (!isNaN(price)) total += Number(price);

    if (!isNaN(price)) sub_total += Number(price);
  });

  total = roundNumber(total,2);
	discount = $('.discount').val().replace("₹","");
	if (!isNaN(discount))total-=Number(discount);
	discount="0";
  /*advance = $('.advance').val().replace("₹","");
	if (!isNaN(advance))total-=Number(advance);
	advance="0";*/
  //$('#subtotal').html(sub_total);
  var due = $('#due').val();
    console.log(`due amount is ${due}`);
  if(due != 0.00 ){
		revoke_readonly("paid");
	  }
  $('#subtotal').val(sub_total);
  $('#total').val(total);
  	console.log("price total "+total);
  	console.log("price total 1"+sub_total);
  update_balance();
}

function update_balance() {
   var due = $("#subtotal").val().replace("₹","") - $("#paid").val().replace("₹","") - $("#advance").val().replace("₹","") - $("#discount").val().replace("₹","") ;
    //if (!isNaN(price)) sub_total += Number(price);
   var subtotal = $("#subtotal").val().replace("₹","") - $("#discount").val().replace("₹","") ;
  subtotal = roundNumber(subtotal,2);
  due = roundNumber(due,2);
  $('#subtotal').val(subtotal);
  $('.due').val(due);
  $(".due").attr("value", due);

  //$('.due').html(due);
}

function update_price() {

  var row = $(this).parents('.item-row');
  var price = row.find('.price').val()//.replace("₹",""); /* * row.find('.qty').val(); */
  price = roundNumber(price,2);
  isNaN(price) ? row.find('.price').val("N/A") : row.find('.price').val(price);

  update_total();
}

function bind() {
/*   $(".cost").blur(update_price);
  $(".qty").blur(update_price); */
}

$(document).ready(function() {

  $('input').click(function(){
    $(this).select();
  });
	$(".discount").on("keyup",function(){
		update_total();
		 $(".cost").blur(update_price);
	  $(".qty").blur(update_price);
	  $(".price[0]").blur(update_price);
	})
	$("#paid").on("keyup",function(){
		update_total();
		 $(".cost").blur(update_price);
	  $(".qty").blur(update_price);
	  $(".price[0]").blur(update_price);
	    //$("#paid").blur(update_balance);
	})

   	$("#addrow").on("click",function(){
		 if ($(".item-row").length < 6){
	  counter++;
        var $template = $('#table_row_template'),
            $clone    = $template
                            .clone()
                            /* .removeClass('hide') */
                            .removeAttr('id')
                            .removeAttr('hidden')
							.val('')
                            .attr('data-book-index', counter)
                            .insertBefore($template);

        // Update the name attributes
        $clone
					.find('[name="price"]').attr('name', 'price-' + counter).attr('id', 'price-' + counter).end()
            .find('[name="particulars"]').attr('name', 'particulars-' + counter).attr('id', 'particulars-' + counter).end();
            /* .find('[name="role-input-select"]').attr('name', 'role-input-select-' + counter).attr('id', 'role-input-select-' + counter).end() */

            /* .find('[name="cost"]').attr('name', 'cost-' + counter).attr('id', 'cost-' + counter).end() */

	if ($(".delete").length > 0) $(".delete").show();  bind();
	  update_total();
	}else{swal({
					  title: "Creat new Bill",
					  text: "maximum 5 entries per OPD invoice",
					  icon: "info",
					  timer: 2000,
					  button:false
				   });}
	});
	bind();
/*   $("#addrow").click(function(){  // old redundant
    $(".item-row:last").after('<tr class="item-row"><td class="item-name"><div class="delete-wpr"><textarea>Item Name</textarea><a class="delete" href="javascript:;" title="Remove row">X</a></div></td><td class="description"><textarea>Description</textarea></td><td><textarea class="cost">₹0</textarea></td><td><textarea class="qty">0</textarea></td><td><span class="price">₹0</span></td></tr>');
    if ($(".delete").length > 0) $(".delete").show();
    bind();
  }); */

  bind();

/*   $(".delete").on('click',function(){
    $(this).parents('.item-row').remove();
    update_total();
    if ($(".delete").length < 2) $(".delete").hide();
  }); */
   $( document ).on( "click", ".delete", function(){
     $(this).parents('.item-row').remove();
    update_total();
    if ($(".delete").length < 2) $(".delete").hide();
  });


  $("#date").val(print_today());

});
function printreport(divname) {
/*     var printContents = document.getElementById(divname).innerHTML;
    var originalContents = document.body.innerHTML;
     document.body.innerHTML = printContents; */
     //window.print();
	 var divname ="#"+divname;
	$(divname).printThis({
  debug: false,               // show the iframe for debugging
  importCSS: true,            // import page CSS
  importStyle: true,         // import style tags
  printContainer: true,       // grab outer container as well as the contents of the selector
  //loadCSS: "path/to/my.css",  // path to additional css file - use an array [] for multiple
  pageTitle: "Invoice",              // add title to print page
  removeInline: false,        // remove all inline styles from print elements
  //printDelay: 333,            // variable print delay
  //header: null,               // prefix to html
  //footer: null,               // postfix to html
  //base: false ,               // preserve the BASE tag, or accept a string for the URL
  //formValues:true,
  formValues: true,           // preserve input/form values
  //canvas: false,              // copy canvas elements (experimental)
  //doctypeString: "...",       // enter a different doctype for older markup
  removeScripts: false,       // remove script tags from print content
  copyTagClasses: false       // copy classes from the html & body tag
});
}
