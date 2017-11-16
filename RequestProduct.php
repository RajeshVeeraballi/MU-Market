<?php include 'db.php';?>
<?php include 'head.php'; ?>
<!DOCTYPE html>
<html lang="en">

<body>
    <?php include 'header.php'; ?>
    <div class="container-fluid">
        <div class="row">
            <br>
            <form action="RequestProduct.php" method="POST" name="search_form">
                <div id="the-basics" >
                  <input id='searchbox' name="search" class="typeahead form-control" type="text" placeholder="Search Requested Products">
                  <input type="hidden" name="type" value="post_add">
                </div>
            </form>
        </div>
		</div>
		<div class="searchbar_rp row" style="padding-left:0px">
	<div class="col-sm-offset-2">
	<div>
	<h2>Did not find the product you are looking for? Don't worry! Request here for it. Someone can sell it for you.</h2>
	</div>
	<?php 
          if(isset($_SESSION['email']) && $_SESSION['email'] != ''){ ?>
		  <div style="margin-left:40px">
			  <a href='PostRequestProduct.php' class="btn btn-success btn-md col-sm-5 col-sm-offset-4">
                <span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span>&nbsp;
                Post Request Product
            </a>
        
        <?php }else { ?>
			<a href='Login.php' class="btn btn-success btn-md col-sm-5 col-sm-offset-4">
                <span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span>&nbsp;
                Post Request Product
            </a>
        <?php } ?>
	
	</div>
	</div>
	</div>
        
            <h2>Requested Products by customers</h2> 
		
		<br>
  <br>
  <div class="row">
    <div>
           <?php
              if(isset($_REQUEST['search']) && $_REQUEST['search'] != ''){
                $sql = "SELECT * FROM request_product WHERE status = 1 AND product_title LIKE '%".$_REQUEST['search']."%'";
              } else{
               $sql = "SELECT * FROM request_product  WHERE status = 1";
             }
               $result = $conn->query($sql);
                 if ($result->num_rows > 0) {
                   // output data of each row
                   while($row = $result->fetch_assoc()) { ?>
                       <div class="col-xs-7 col-lg-4 well well-sm" style="min-height: 200px; max-height: 200px; overflow-y:scroll;">
                           <h3><?php echo $row['product_title']; ?></h3>
                           <p><?php echo $row['product_description']; ?></p>
                           <p>Contact: <b><?php echo $row['contact_details']; ?></b></p>
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
            var titles = <?php include('actions/getReqProductTitle.php'); ?>;
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
</body>

<script>
    $(".alert").alert()
</script>
