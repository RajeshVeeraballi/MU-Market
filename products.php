<!DOCTYPE html>
<html lang="en">

<?php include 'head.php'; ?>

<body>
  <?php include 'header.php'; ?>
  <div class="container-fluid">
  
    <div class="row">
      <br/>
      <form action="products.php" method="POST" name="search_form">
        <div id="the-basics">
          <input id='searchbox' name="search" class="typeahead form-control" type="text" placeholder="Search Products">
          <input type="hidden" name="type" value="post_add">
        </div>
    </form>
    </div>
		<div class="searchbar row" style="padding-left:0px">
	<div class="col-sm-offset-2">
	<div>
	<h2>Want to sell a product and make some money?
	Then post it here and get relax!</h2>
	</div>
	<?php
    if(isset($_SESSION['email']) && $_SESSION['email'] != ''){
  ?>
<div style="margin-left:40px">
    <a href='PostAdd.php' class="btn btn-success btn-md col-sm-5 col-sm-offset-4">
      <span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span>&nbsp;
      Post Ad
    </a>


  <?php } else{ ?>
	<a href='Login.php' class="btn btn-success btn-md col-sm-5 col-sm-offset-4">
      <span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span>&nbsp;
      Post Ad
    </a>
  <?php } ?>
	</div>
	
  </div>
    </div>
  
  <h2>Shop for products here</h2>
  
  <br>
  <br>
  <div class="row">
    <div>
      <?php
      if(isset($_REQUEST['search']) && $_REQUEST['search'] != ''){
        $sql = "SELECT * FROM products WHERE status = 1 AND product_title LIKE '%".$_REQUEST['search']."%'";
      } else{
        $sql = "SELECT * FROM products WHERE status = 1 ORDER BY product_id DESC";
      }
      $result = $conn->query($sql);
      if ($result->num_rows > 0) {
                    // output data of each row
        while($row = $result->fetch_assoc()) { ?>
        <div class="col-sm-3" style="min-height: 320px;">
          <a href=<?php echo "AddToCart.php?product=".$row['product_id']; ?> > <img class="img-thumbnail" src=<?php echo 'img/'.$row['image']; ?> alt="Loding" class="img-responsive" style="height:200px; width:200px">
            <h3><?php echo $row['product_title'] .' - $'. $row['price']; ?> </h3></a>
          </div>
          <?php
        }
      } else{ ?>
      <div class="alert alert-info">
        <strong>Info!</strong> No Products Available.
      </div>
      <?php
    }
    ?>
  </div>
  </div>
  
  <div class="panel panel-default">

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
    setTimeout(carousel, 4000); // Change image every 2 seconds
  }

</script>
</body>
