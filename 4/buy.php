<?php
 require_once('sql.class.php');
if($_GET['id']){
  $id=$_GET['id'];
  $num=$_GET['stock'];  
?>
<!DOCTYPE phpl PUBLIC "-//W3C//DTD XphpL 1.0 Transitional//EN" "http://www.w3.org/TR/xphpl1/DTD/xphpl1-transitional.dtd">
<phpl xmlns="http://www.w3.org/1999/xphpl">
<head>
<meta http-equiv="content-type" Content="text/html;charset=utf-8">
<title>Book Store</title>
<link rel="stylesheet" type="text/css" href="style.css" />
<script type="text/javascript" src="jquery-1.7.2.min.js"></script>
<script>
  $(function(){

    $("#tijiao").on("click",function() {
          var value = <?php echo $id; ?>;
           var selectvalue =document.getElementById("a").value;
           //alert(selectvalue);
           var address = document.getElementById("address").value;
          //验证用户
          $.ajax({
            url:'deal.php',
            type:'post',
            data:{id:value,num:selectvalue,address:address},
            async:true,//是否同步刷新
            datatype:'text',
            error:function() {
              alert('error');
            },
            success:function(result) {
                if(result == 1){
                  alert('订单提交成功');
                }else{
                  alert('提交失败');
                }
            }
          })
        })
      })
  
  </script>
</head>
<body>
<div id="wrap">
  <div class="header">
    <div class="logo"><a href="index.php"><img src="images/logo.gif" alt="" title="" border="0" /></a></div>
    <div id="menu">
 	  <ul>
        <li><a href="index.php">主页</a></li>
        <li class="selected"><a href="view.php">库存信息</a></li>
        <li><a href="#">书籍</a></li>
        <li><a href="#">特殊书籍</a></li>
        <li><a href="myaccount.php">待处理订单</a></li>
        <li><a href="#">注册</a></li>
        <li><a href="#">书籍价格</a></li>
        <li><a href="#">联系</a></li>
      </ul>
    </div>
  </div>
  <div class="center_content">
    <div class="left_content">
      <div class="title"><span class="title_icon"><img src="images/bullet1.gif" alt="" title="" /></span>订单管理</div>
      <div class="feat_prod_box_details">
        <div class="contact_form">
          <div class="form_subtitle">create new account</div>
         <!--  <form name="register" action="#">
            <div class="form_row">
              <label class="contact"><strong>Username:</strong></label>
              <input type="text" class="contact_input" />
            </div>
            <div class="form_row">
              <label class="contact"><strong>Password:</strong></label>
              <input type="text" class="contact_input" />
            </div>
            <div class="form_row">
              <label class="contact"><strong>Email:</strong></label>
              <input type="text" class="contact_input" />
            </div>
            <div class="form_row">
              <label class="contact"><strong>Phone:</strong></label>
              <input type="text" class="contact_input" />
            </div>
            <div class="form_row">
              <label class="contact"><strong>Company:</strong></label>
              <input type="text" class="contact_input" />
            </div>
            <div class="form_row">
              <label class="contact"><strong>Adrres:</strong></label>
              <input type="text" class="contact_input" />
            </div>
            <div class="form_row">
              <div class="terms">
                <input type="checkbox" name="terms" />
                I agree to the <a href="#">terms &amp; conditions</a> </div>
            </div>
            <div class="form_row">
              <input type="submit" class="register" value="register" />
            </div>
          </form> -->
          <form>
    <tr>
      <td>书号:</td>
      <td><?php echo $id;?> </td>
    </tr>
    <tr>
      <td>购买数量</td>
      <td>
        <select id ="a">
          <?php for($i=0;$i<$num;$i++){?>
            <option value = '<?php  echo $i;?>'><?php  echo $i;?>
            </option>
            <?php }?>
        </select>
      </td>
    </tr>
    <tr>
      <td>送货地址:</td>
    </tr>
    <tr>
      <td>
        <textarea type="text" name="address" id ="address"></textarea>
      </td>
    </tr>
    <tr>
      <td><button type="button" id="tijiao">提交</button></td>
      <a href="view.php">返回继续购买</a>
    </tr>
  </form>
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
      <div class="title"><span class="title_icon"><img src="images/bullet3.gif" alt="" title="" /></span>About Our Store</div>
      <div class="about">
        <p> <img src="images/about.gif" alt="" title="" class="right" /> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud. </p>
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
<?php } ?>
</phpl>
