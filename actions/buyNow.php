<?php

	return '<form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">
					<!-- Identify your business so that you can collect the payments. -->
					<input type="hidden" name="business" value="merchant_mum@gmail.com">

					<!-- Specify a Buy Now button. -->
					<input type="hidden" name="cmd" value="_xclick">
					<!-- <a href="OnlinePayment.Html"><input type="button" value="Buy Now" id="AddTocart"></a> -->
					<input type="hidden" name="item_name" value="test">
					<input type="hidden" name="item_number" value="1">
					<input type="hidden" name="currency_code" value="USD">
					<!-- Specify URLs -->
					<input type="hidden" name="cancel_return" value="http://www.mumarket.us/actions/payment.php">
					<input type="hidden" name="return" value="http://www.mumarket.us/actions/payment.php">
					<input type="hidden" name="amount" value="100">
					
					<input type="submit" value="Buy Now" id="AddTocart" class="pull-left">
				</form>';

?>