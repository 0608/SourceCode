<!DOCTYPE phpl PUBLIC "-//W3C//DTD XphpL 1.0 Transitional//EN" "http://www.w3.org/TR/xphpl1/DTD/xphpl1-transitional.dtd">
<phpl xmlns="http://www.w3.org/1999/xphpl">
<head>
<meta http-equiv="content-type" Content="text/phpl;charset=utf-8">
<title>Book Store</title>
<link rel="stylesheet" type="text/css" href="style.css" />
<script type="text/javascript" src="jquery-1.7.2.min.js"></script>
<script>
    function allbook() {
      document.getElementById('book').style.display='block';
      document.getElementById('undeal').style.display='none';
    }
    function undo() {
      document.getElementById('book').style.display='none';
      document.getElementById('undeal').style.display='block';
    }
</script>
</head>
<body>
<div id="wrap">
  <div class="header">
    <div class="logo"><a href="index.php"><img src="images/logo.gif" alt="" title="" border="0" /></a></div>
    <div id="menu">
     <ul>
        <li class="selected"><a href="index.php">主页</a></li>
        <li><a href="view.php">库存信息</a></li>
        <li><a href="#">书籍信息</a></li>
        <li><a href="#">特殊书籍</a></li>
        <li><a href="myaccount.php">待处理订单</a></li>
        <li><a href="#">购买</a></li>
        <li><a href="#">书籍价格</a></li>
        <li><a href="#">联系</a></li>
      </ul>
    </div>
  </div>
  <div class="center_content">
    <div class="left_content">
      <div class="title"><span class="title_icon"><img src="images/bullet1.gif" alt="" title="" /></span>Featured books</div>
      <div class="feat_prod_box">
        <div class="prod_img"><a href="details.php"><img src="images/prod1.gif" alt="" title="" border="0" /></a></div>
        <div class="prod_det_box">
          <div class="box_top"></div>
          <div class="box_center">
            <div class="prod_title">Product name</div>
            <p class="details">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation.</p>
            <a href="details.php" class="more">- more details -</a>
            <div class="clear"></div>
          </div>
          <div class="box_bottom"></div>
        </div>
        <div class="clear"></div>
      </div>
      <div class="feat_prod_box">
        <div class="prod_img"><a href="details.php"><img src="images/prod2.gif" alt="" title="" border="0" /></a></div>
        <div class="prod_det_box">
          <div class="box_top"></div>
          <div class="box_center">
            <div class="prod_title">Product name</div>
            <p class="details">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation.</p>
            <a href="details.php" class="more">- more details -</a>
            <div class="clear"></div>
          </div>
          <div class="box_bottom"></div>
        </div>
        <div class="clear"></div>
      </div>
      <div class="title"><span class="title_icon"><img src="images/bullet2.gif" alt="" title="" /></span>New books</div>
      <div class="new_products">
        <div class="new_prod_box"> <a href="details.php">product name</a>
          <div class="new_prod_bg"> <span class="new_icon"><img src="images/new_icon.gif" alt="" title="" /></span> <a href="details.php"><img src="images/thumb1.gif" alt="" title="" class="thumb" border="0" /></a> </div>
        </div>
        <div class="new_prod_box"> <a href="details.php">product name</a>
          <div class="new_prod_bg"> <span class="new_icon"><img src="images/new_icon.gif" alt="" title="" /></span> <a href="details.php"><img src="images/thumb2.gif" alt="" title="" class="thumb" border="0" /></a> </div>
        </div>
        <div class="new_prod_box"> <a href="details.php">product name</a>
          <div class="new_prod_bg"> <span class="new_icon"><img src="images/new_icon.gif" alt="" title="" /></span> <a href="details.php"><img src="images/thumb3.gif" alt="" title="" class="thumb" border="0" /></a> </div>
        </div>
      </div>
      <div class="clear"></div>
    </div>
    <!--end of left content-->
    <div class="right_content">
      <div class="languages_box"> <span class="red">Languages:</span> <a href="#" class="selected"><img src="images/gb.gif" alt="" title="" border="0" /></a> <a href="#"><img src="images/fr.gif" alt="" title="" border="0" /></a> <a href="#"><img src="images/de.gif" alt="" title="" border="0" /></a> </div>
      <div class="currency"> <span class="red">Currency: </span> <a href="#">GBP</a> <a href="#">EUR</a> <a href="#" class="selected">USD</a> </div>
      <div class="cart">
        <div class="title"><span class="title_icon"><img src="images/cart.gif" alt="" title="" /></span>My cart</div>
        <div class="home_cart_content"> 3 x items | <span class="red">TOTAL: 100$</span> </div>
        <a href="cart.php" class="view_cart">view cart</a> </div>
      <div class="title"><span class="title_icon"><img src="images/bullet3.gif" alt="" title="" /></span>About Our Store</div>
      <div class="about">
        <p> <img src="images/about.gif" alt="" title="" class="right" /> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud. </p>
      </div>
      <div class="right_box">
        <div class="title"><span class="title_icon"><img src="images/bullet4.gif" alt="" title="" /></span>Promotions</div>
        <div class="new_prod_box"><a href="details.php">product name</a>
        <div class="new_prod_bg"> <span class="new_icon"><img src="images/promo_icon.gif" alt="" title="" /></span> <a href="details.php"><img src="images/thumb1.gif" alt="" title="" class="thumb" border="0" /></a> </div>
        </div>
        <div class="new_prod_box"> <a href="details.php">product name</a>
          <div class="new_prod_bg"> <span class="new_icon"><img src="images/promo_icon.gif" alt="" title="" /></span> <a href="details.php"><img src="images/thumb2.gif" alt="" title="" class="thumb" border="0" /></a> </div>
        </div>
        <div class="new_prod_box"> <a href="details.php">product name</a>
          <div class="new_prod_bg"> <span class="new_icon"><img src="images/promo_icon.gif" alt="" title="" /></span> <a href="details.php"><img src="images/thumb3.gif" alt="" title="" class="thumb" border="0" /></a> </div>
        </div>
      </div>
      <div class="right_box">
        <div class="title"><span class="title_icon"><img src="images/bullet5.gif" alt="" title="" /></span>Categories</div>
        <ul class="list">
          <li><a href="#">accesories</a></li>
          <li><a href="#">books gifts</a></li>
          <li><a href="#">specials</a></li>
          <li><a href="#">hollidays gifts</a></li>
          <li><a href="#">accesories</a></li>
          <li><a href="#">books gifts</a></li>
          <li><a href="#">specials</a></li>
          <li><a href="#">hollidays gifts</a></li>
          <li><a href="#">accesories</a></li>
          <li><a href="#">books gifts</a></li>
          <li><a href="#">specials</a></li>
        </ul>
        <div class="title"><span class="title_icon"><img src="images/bullet6.gif" alt="" title="" /></span>Partners</div>
        <ul class="list">
          <li><a href="#">accesories</a></li>
          <li><a href="#">books gifts</a></li>
          <li><a href="#">specials</a></li>
          <li><a href="#">hollidays gifts</a></li>
          <li><a href="#">accesories</a></li>
          <li><a href="#">books gifts</a></li>
          <li><a href="#">specials</a></li>
          <li><a href="#">hollidays gifts</a></li>
          <li><a href="#">accesories</a></li>
        </ul>
      </div>
    </div>
    <!--end of right content-->
    <div class="clear"></div>
  </div>
  <!--end of center content-->
  <div class="footer">
    <div class="left_footer"><img src="images/footer_logo.gif" alt="" title="" /><br />
      </div>
    <div class="right_footer"> <a href="#">home</a> <a href="#">about us</a> <a href="#">services</a> <a href="#">privacy policy</a> <a href="#">contact us</a> </div>
  </div>
</div>
<div style="text-align:center;">
<p>&#26469;&#28304;:<a href="http://www.mycodes.net/" target="_blank">&#28304;&#30721;&#20043;&#23478;</a></p>
</div>
</body>
</phpl>
