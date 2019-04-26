
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

    function printDiv(divname) {    

     window.print();

    }

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
  $('.subtotal').val(sub_total);
  $('#total').val(total);
  
  update_balance();
}

function update_balance() {
  var due = $("#total").val().replace("₹","") - $("#paid").val().replace("₹","") - $("#advance").val().replace("₹","") ;
  due = roundNumber(due,2);
  $('.due').val(due);
  //$('.due').html(due);
}

function update_price() {
  var row = $(this).parents('.item-row ');
  console.log(counter);
  var len = $(this)
    .parents( ".item-row " )
      //.css( "border", "2px red solid" )
      .length;
   console.log("name=.cost-"+counter+"parent length="+len+"::"+row.find('.cost').val());
  var price = row.find('.cost').val().replace("₹","") * row.find('.qty').val();
  price = roundNumber(price,2);
  isNaN(price) ? row.find('.price').val("N/A") : row.find('.price').val(price);
  update_total();
}

function bind() {
  //$(".cost").blur(update_price);
  $(".qty").blur(update_price);
} 
$(document).ready(function() {
if ($(".delete").length < 2) $(".delete").hide();
  $('input').click(function(){
    $(this).select();
  });

  $("#paid").blur(update_balance);
 
 
$(".discount").on("keyup",function(){
	update_total()
})
$("#paid").on("keyup",function(){
	update_balance()
})
$("#items")/* .on("input",".role-input-select",function(){ *//* focus blur change */
    // Add button click handler
    .on('keyup blur input', 'input[id^="role-input-select"]', function() {
		update_total()
	});

$("#items")/* .on("input",".role-input-select",function(){ *//* focus blur change */
    // Add button click handler
    .on('input', 'input[id^="role-input-select"]', function() {
    
        var description = $(this).val();
        var product = $('#role > option[value="' + description + '"]').data('test_amount');
		console.log("product : "+product);
        $(this).attr("value",description);
        $('input[name=cost-'+ $(this).attr("name").replace("role-input-select-", "") + ']').attr("value",product+".00");
        $('input[name=price-'+ $(this).attr("name").replace("role-input-select-", "") + ']').attr("value",product+".00");
		console.log("name=cost-"+$(this).attr("name").replace("role-input-select-", "")+":: product="+product+":: description="+description);
	var val = this.value;
	console.log("value in on input role input select"+val);
	//alert(description);
	update_price();
	update_total();
});

	$("#addrow").on("click",function(){
		 if ($(".delete").length < 5){
	  counter++;
        var $template = $('#table_row_template'),
            $clone    = $template
                            .clone()
                            /* .removeClass('hide') */
                            .removeAttr('id')
                            .removeAttr('hidden')
							.val("")
                            .attr('data-book-index', counter)
                            .insertBefore($template);

        // Update the name attributes
        $clone
            .find('[name="role-input-select"]').attr('name', 'role-input-select-' + counter).end()
            .find('[name="cost"]').attr('name', 'cost-' + counter).end()
            .find('[name="price"]').attr('name', 'price-' + counter).end();
   /*  })
    $(".item-row:last").after("<tr class=\"item-row\" ><td class=\"item-name\" colspan=\"2\"><div class=\"delete-wpr\"><div id=\"sex-input\" class=\"form-input col-12\"><input name=\"role\" list=\"role\" class=\"form-control\" id=\"role-input-select\" /><datalist id=\"role\"> \<?php $con=mysqli_connect(\"localhost\",\"root\",\"\",\"hmsdb\");if (mysqli_connect_errno()){echo \"Failed to connect to MySQL: \" . mysqli_connect_error();}$result = mysqli_query($con,\"SELECT pscm.PathologySubCategoryName,pscm.PathologySubCategoryID,pscm.PathologyTestCharges,pcm.PathologyCategoryName FROM pathologysubcategorymaster as pscm left join pathologycategorymaster  as pcm on pscm.PathologyCategoryID = pcm.PathologyCategoryID\");while($row = mysqli_fetch_array($result)){		echo \"<option value='\".$row['PathologySubCategoryName'].\"'>\".$row['PathologyCategoryName'].\"&nbsp;&nbsp;&nbsp;\".$row['PathologyTestCharges'].\"</option>\";}mysqli_close($con);?></datalist></div><a class=\"delete\" href=\"javascript:;\" title=\"Remove row\">X</a></div></td><td><textarea class=\"cost\">₹00.00</textarea></td><td><textarea class=\"qty\">1</textarea></td>		      <td><span class=\"price\">₹00.00</span></td> </tr>"); */
	if ($(".delete").length > 0) $(".delete").show();  bind(); 
	  update_total();
	}else{alert("Creat new Bill")}
	});
	bind();

  
/*   $(".delete").on('click',function(){
    $(this).parents('.item-row').remove();
    update_total();
    if ($(".delete").length < 2) $(".delete").hide();
  }); */
   $( document ).on( "click", ".delete", function(){$(this).parents('.item-row').remove();
    update_total();
    if ($(".delete").length < 2) $(".delete").hide(); });
/*   
  $("#cancel-logo").click(function(){
    $("#logo").removeClass('edit');
  });
  $("#delete-logo").click(function(){
    $("#logo").remove();
  });
  $("#change-logo").click(function(){
    $("#logo").addClass('edit');
    $("#imageloc").val($("#image").attr('src'));
    $("#image").select();
  });
  $("#save-logo").click(function(){
    $("#image").attr('src',$("#imageloc").val());
    $("#logo").removeClass('edit');
  }); */
  
  $("#date").val(print_today());
  
});