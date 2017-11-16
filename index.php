<!DOCTYPE html>
<html lang="en">

<?php include 'head.php'; ?>

<body>
  <?php include 'header.php'; ?>

  <section class="banner col-lg-12" style="padding-top:30px">

  <div class="col-md-10 col-md-offset-1">
     <div class="carousel slide" data-ride="carousel" data-type="multi" data-interval="2000" id="myCarousel">
       <div class="carousel-inner">
         <div class="item active">
           <div class="col-md-3 col-sm-6 col-xs-12">
              <a href="products.php"><img class="img-slider img-responsive" src="img/Angular.jpg"/></a>
           </div>
         </div>
         <div class="item">
           <div class="col-md-3 col-sm-6 col-xs-12">
              <a href="products.php"><img class="img-slider img-responsive" src="img/shopping.jpeg"/></a>
           </div>
         </div>
         <div class="item">
           <div class="col-md-3 col-sm-6 col-xs-12">
              <a href="products.php"><img class="img-slider img-responsive" src="img/StorageTable.JPG"/></a>
           </div>
         </div>
         <div class="item">
           <div class="col-md-3 col-sm-6 col-xs-12">
              <a href="products.php"><img class="img-slider img-responsive" src="img/Bookshelf.jpg"/></a>
           </div>
         </div>
         <div class="item">
           <div class="col-md-3 col-sm-6 col-xs-12">
              <a href="products.php"><img class="img-slider img-responsive" src="img/Core-Java.jpeg"/></a>
           </div>
         </div>
         <div class="item">
           <div class="col-md-3 col-sm-6 col-xs-12">
              <a href="products.php"><img class="img-slider img-responsive" src="img/pouch.jpeg"/></a>
           </div>
         </div>
         <div class="item">
           <div class="col-md-3 col-sm-6 col-xs-12">
              <a href="products.php"><img class="img-slider img-responsive" src="img/tab.jpg"/></a>
           </div>
         </div>
         <div class="item">
           <div class="col-md-3 col-sm-6 col-xs-12">
              <a href="products.php"><img class="img-slider img-responsive" src="img/laptop.png"/></a>
           </div>
         </div>
         <div class="item">
           <div class="col-md-3 col-sm-6 col-xs-12">
              <a href="products.php"><img class="img-slider img-responsive" src="img/mcsharp.jpg"/></a>
           </div>
         </div>
       </div>
       <a class="left carousel-control" href="#myCarousel" data-slide="prev"><i class="glyphicon glyphicon-chevron-left"></i></a>
       <a class="right carousel-control" href="#myCarousel" data-slide="next"><i class="glyphicon glyphicon-chevron-right"></i></a>
	   <h2 class="pull-right" style="color:#fff;">"A place to buy, sell and request the products you like"</h2> 
     </div>

 </div>
  </section>
  
  <section class="home-inner" id="homeFirst">
    <a href="Register.php">
    <span class="imgCenter">
      <img src="img/003-thumb-up-sign.png" style="Margin-top:50px"/>

    </span>
    Sign Up today
    </a>
  </section>

  <section class="home-inner" id="homeSecond">
  <?php if(isset($_SESSION['email']) && $_SESSION['email'] != ''){ ?>
    <a href="PostAdd.php">
  <?php } else{?>
	<a href='Login.php'>
  <?php } ?>
    <span class="imgCenter">
      <img src="img/002-plus-button.png" style="Margin-top:50px"/>
    </span>
Want to sell a product?<br>
    Sell it here!
	</a>
  </section>

  <section class="home-inner" id="homeThree">
  <?php if(isset($_SESSION['email']) && $_SESSION['email'] != ''){ ?>
    <a href="myOrders.php">
  <?php } else{?>
	<a href='Login.php'>
  <?php } ?>
		<span class="imgCenter">
		  <img src="img/004-business-deal.png" style="Margin-top:50px"/>
		</span>
		<p style="color:#fff">My Orders</p>
	</a>
  </section>

  <section class="home-inner" id="homeFour">
  <?php if(isset($_SESSION['email']) && $_SESSION['email'] != ''){ ?>
    <a href="PostRequestProduct.php">
  <?php } else{?>
	<a href='Login.php'>
  <?php } ?>
    <span class="imgCenter">
      <img src="img/001-percentage.png" style="Margin-top:50px"/>
    </span>
    Did not find the product you need?<br>
    Request here for it!
	</a>
  </section>
<br>
  <div class="col-lg-12">

    <div class="panel-footer"> Copyright &copy; 2017 Monmouth University.<span class="pull-right"><a href="Helpdoc.php">Help<a/></span></div>
	
  </div>
  <script type="text/javascript">
    $(document).ready(function() {
      var substringMatcher = function(titles) {
        return function findMatches(q, cb) {
          var matches, substringRegex;

                // an array that will be populated with substring matches
                matches = [];

                // regex used to determine if a string contains the substring `q`
                substrRegex = new RegExp(q, 'i');

                // iterate through the pool of strings and for any string that
                // contains the substring `q`, add it to the `matches` array
                $.each(titles, function(i, str) {
                  if (substrRegex.test(str)) {
                    matches.push(str);
                  }
                });

                cb(matches);
              };
            };
            var titles = <?php include('actions/getPostAdTitle.php'); ?>;
            $('#the-basics .typeahead').typeahead({
              hint: true,
              highlight: true,
              minLength: 1
            },
            {
              name: 'titles',
              source: substringMatcher(titles)
            });
          });
    document.onkeydown=function(evt){
      var keyCode = evt ? (evt.which ? evt.which : evt.keyCode) : event.keyCode;
      if(keyCode == 13)
      {
                //your function call here
                document.search_form.submit();
              }
            }
          </script>
          <?php
          $conn->close();
          ?>
    <script>

    $('.carousel[data-type="multi"] .item').each(function(){
  var next = $(this).next();
  if (!next.length) {
    next = $(this).siblings(':first');
  }
  next.children(':first-child').clone().appendTo($(this));

  for (var i=0;i<2;i++) {
    next=next.next();
    if (!next.length) {
    	next = $(this).siblings(':first');
  	}

    next.children(':first-child').clone().appendTo($(this));
  }
});
    /*
            var myIndex = 0;
            carousel();

            function carousel() {
              var i;
              var x = document.getElementsByClassName("mySlides");
              for (i = 0; i < x.length; i++) {
               x[i].style.display = "none";
             }
             myIndex++;
             if (myIndex > x.length) {myIndex = 1}
              x[myIndex-1].style.display = "block";
    setTimeout(carousel, 2400); // Change image every 2 seconds
  }*/

 </script>
</body>
