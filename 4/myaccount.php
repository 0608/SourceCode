<?php require_once('sql.class.php');

  $sql = "SELECT * FROM bookinfo";  
  $query = $dsql->execute($sql);
  $row = $dsql->num_rows($query);
  //$res= $dsql->fetch_array($query);
  
?>
<!DOCTYPE phpl PUBLIC "-//W3C//DTD XphpL 1.0 Transitional//EN" "http://www.w3.org/TR/xphpl1/DTD/xphpl1-transitional.dtd">
<phpl xmlns="http://www.w3.org/1999/xphpl">
<head>
<meta http-equiv="content-type" Content="text/html;charset=utf-8">
<title>Book Store</title>
<link rel="stylesheet" type="text/css" href="style.css" />
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
      <div class="title"><span class="title_icon"><img src="images/bullet1.gif" alt="" title="" /></span>My account</div>
      <div class="feat_prod_box_details">
        <p class="details"> 书籍是人类进步的阶梯.   ---高尔基 </p>
        <div class="contact_form">
          <div class="form_subtitle">未处理的订单</div>
         <!--  <form name="register" action="#">
            <div class="form_row">
              <label class="contact"><strong>用户名:</strong></label>
              <input type="text" class="contact_input" />
            </div>
            <div class="form_row">
              <label class="contact"><strong>密码:</strong></label>
              <input type="text" class="contact_input" />
            </div>
            <div class="form_row">
              <div class="terms">
                <input type="checkbox" name="terms" />
                记住</div>
            </div>
            <div class="form_row">
              <input type="submit" class="register" value="login" />
            </div>
          </form> -->
           <?php 
                $sql1 ="SELECT * FROM dingdan WHERE state =0";
                $query1= $dsql->execute($sql1);
              ?>
              <table border ='1' width='300px'>
                <tr>
                  <td>书号</td>
                  <td>订单数量</td>
                  <td>地址</td>
                </tr>
                <?php   while($rres = $dsql->fetch_array($query1)){ ?>
                <tr>
                  <td><?php echo $rres['bookid'];?></td>
                  <td><?php echo $rres['num'];   ?></td>
                  <td><?php echo $rres['address']?></td>
                </tr>
                <?php } ?>
               </table>
        </div>
      </div>
      <div class="clear"></div>
    </div>
    <!--end of left content-->
    <div class="right_content">
      <div class="languages_box"> <span class="red">Languages:</span> <a href="#"><img src="images/gb.gif" alt="" title="" border="0" /></a> <a href="#"><img src="images/fr.gif" alt="" title="" border="0" /></a> <a href="#"><img src="images/de.gif" alt="" title="" border="0" /></a> </div>
      <div class="currency"> <span class="red">Currency: </span> <a href="#">GBP</a> <a href="#">EUR</a> <a href="#"><strong>USD</strong></a> </div>
      <div class="cart">
        <div class="title"><span class="title_icon"><img src="images/cart.gif" alt="" title="" /></span>My cart</div>
        <div class="home_cart_content"> 3 x items | <span class="red">TOTAL: 100$</span> </div>
        <a href="cart.php" class="view_cart">view cart</a> </div>
      <div class="title"><span class="title_icon"><img src="images/bullet3.gif" alt="" title="" /></span>About our store</div>
      <div class="about">
       
      </div>
      <div class="right_box">
        <div class="title"><span class="title_icon"><img src="images/bullet4.gif" alt="" title="" /></span>Promotions</div>
        <div class="new_prod_box"> <a href="details.php">product name</a>
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
</body>
</phpl>
