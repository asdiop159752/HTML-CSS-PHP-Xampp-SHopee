<?php
 session_start();

 if($_SESSION['user_id'] == null) {
       echo '<script>';
       echo 'alert("You must login with admin role");';
       echo 'window.location.href= "/login.php"';
       echo '</script>';
 }
?> 
<?php


if (isset($_SESSION["user_id"])) {
    
    $mysqli = require __DIR__ . "/database.php";
    
    $sql = "SELECT * FROM user
            WHERE id = {$_SESSION["user_id"]}";
            
    $result = $mysqli->query($sql);
    
    $user = $result->fetch_assoc();
}

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MSW</title>
    <link rel="icon" type="image/x-icon" href="data:image/png;base64,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">
    <link rel="stylesheet" href="./assets/css/home.css">
    <link rel="stylesheet" href="./assets/css/home-responsive.css">
<link rel="stylesheet" href="./assets/fonts/themify-icons/themify-icons.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="">

</head>
<body>
<div id="main">
        <div id="header">
            <!-- Begin:Navigation -->
            <ul id="nav">
                <a class="nav-link" href="./home-product.php"><button> Product</button></a>
                <li ><a  href="#band ">Content</a></li>
                <li ><a  href="#tour ">Discount code</a></li>
                <li ><a href="#contact ">Contact</a></li>
                <li ><a href=" #"> More <i class="ti-angle-down"></i> </a>


                    <ul class="subnav">
                        <li><a href="https://themify.me/themify-icons">Change </a></li>
                        <li><a href="https://f8.vercel.app/learning/html-css">Exchange</a></li>
                        <li><a href="https://www.w3schools.com/w3css/tryw3css_templates_band.htm#band">Co-operate</a></li>
                    </ul>
                </li>
            </ul>
    <!-- End:Navigation -->
    <!-- <div id="mobile-menu" class="mobile-menu-btn">
        <i class=" menu-icon ti-menu-alt"></i>
    </div> -->
    <!-- <div class="mobile-search__menu header mobile-menu-btn header search-button">
        <i class="menu-icon__search ti-search"></i>
    </div> -->
        
    <div class="search-button">
    <div class="logout-edit">
    <?php if (isset($user)): ?>
        
      <p class="introduce-hello" >Hello <?= htmlspecialchars($user["name"]) ?></p> 
    
      <li class="header__navbar-item header__navbar-user">
            <img src="https://cf.shopee.vn/file/72b7d70d6c27c0144182616780b17845_tn" alt="" class="header__navbar-user-img">
            <span class="header__navbar-user-name">Xuan Truong</span>

            <ul class="header__navbar-user-menu">
                <li class="header__navbar-user-item">
                    <a href="">My account</a>
                </li>
                <li class="header__navbar-user-item">
                    <a href="">Address </a>
                </li>
                <li class="header__navbar-user-item">
                    <a href="">Cart </a>
                </li>
                <li class="header__navbar-user-item header__navbar-user-item--sesparate">
                <a href="/logout.php">Log out <i class="ti-shift-right"></i></a>
                </li> 
            </ul>

       
  
    <?php else: ?>
       
        <p><a href="login.php">Log in</a> or <a href="signup.html">sign up</a></p>
        
    <?php endif; ?>
    </div>
    </div>
</div>
<!-- <div id="slider">
    <div class="text-decoration">123</div>
    <div class="text-content">123</div>
    <div class="text-heading">123</div>
</div> -->
        <div class="reccoment-slider hidden-phone-tablet ">
            <div id="slider">
                <div class="slider-wrap-run">
                    <div class="slider-wrap__motive"> 
                        <div class="slider-run-img">
                            <img src="./assets/img/slider/11111111.jpg"  alt="">
                        </div>
                        
                        <div class="slider-run-img">
                            <img src="./assets/img/slider/222.jpg"  alt="">
                        </div>
                        <div class="slider-run-img">
                            <img src="./assets/img/slider/1111.jpg"  alt="">
                        </div>
                        <div class="slider-run-img">
                            <img src="./assets/img/slider/333333.jpg"  alt="">
                        </div>
                    </div>
                </div>
                        </div>
                        <div class="reccoment-img">
                        <img  src="./assets/img/slider/blackfriday.png" alt="">
                        </div>
                        <div class="reccoment-img-last-child">
                            <img  src="./assets/img/slider/Screenshot 2022-11-28 162813.png" alt="">
                            </div>
        </div>

            <div id="content">
                <!-- About section -->
<div id="band" class="content-section"> 
    <h2 class="section-heading"> BUY GENUINE PRODUCTS FROM MSW </h2>
    <p class="section-slogan">Like don't like force like </p>
    <p class="about-content"> 
    Buying on EXtended Technology is always an impressive experience. Whether you are in need of buying any men's fashion, women's fashion, watches, phones, hand sanitizer or N95 masks, EXtended Technology will also ensure to provide you with satisfactory products. Besides, EXtended Technology also has the participation of the world's leading brands in various fields. Among them can be mentioned Samsung, OPPO, Xiaomi, Innisfree, Unilever, P&G, Biti's,... These brands also now have official stores on Shopee Mall with hundreds of genuine and updated items. customary. As a reputable sales channel, EXtended Technology is always committed to providing customers with cheap, safe and reliable online shopping experiences. All information about the seller and the buyer is absolutely confidential. Payment transactions at EXtended Technology are always guaranteed to be fast and safe. Another issue that makes customers always interested is whether buying on EXtended Technology is guaranteed.   </p>

    <div class="row member-list">
        <div class=" col col-third text-center s-full-width margin-t16 margin-t32 "> 
            <p class="member-name"> Case SamSung</p>
            <img src="assets/img/slider/images (2).jfif" alt="Schools" class="member-img">
        </div>

        <div class=" col col-third text-center s-full-width margin-t16 margin-t32"> 
            <p class="member-name"> samsung s22 plus</p>
            <img src="assets/img/slider/images (3).jfif" alt="Schools" class="member-img">
        </div>

        <div class=" col col-third text-center s-full-width margin-t16 margin-t32"> 
            <p class="member-name"> Case SamSung</p>
            <img src="assets/img/slider/images (4).jfif" alt="Schools" class="member-img">
        </div>
        <!-- clear dung de khac phuc loi float -->
        <div class="clear"></div>
    </div>
</div>
    <!-- Tour section -->
    <div id="tour" class="tour-section">
        <div class="content-section"> 
        <h2 class="section-heading text-white"> Discount</h2>
        <p class="section-slogan text-white"> Track every hour, every minute, every second </p>
<!-- Ticket -->
        <ul class="ticket-list">
            <li> Voucher sale Samsung  <span class="sold-out"> SOLD</span></li>
            <li>Voucher sale Iphone  <span class="sold-out">SOLD</span></li>
            <li>Voucher sale Nike <span class="quantity">15</span></li>
        </ul>
        <!-- place -->
        <div class="row place-list  ">
            <div class="col col-third s-full-width margin-t16 ">
                <img src="assets/img/slider/iphone13.jfif" alt="NewYork" class="place-img">
                <div class="place-body">
                    <h3 class="place-heading">Case Iphone Wood</h3>
                    <p class="place-time">105.000</p>
                    <p class="place-desc">
                    Wooden iPhone 12 Pro Max Case, Solid Wood iPhone 12 Mini Case Cover from Wood</p>
                    <!-- <button href="#" class="btn s-full-width t-center js-buy-tickets  ">Mua hàng </button> -->
                <button  href="#" class="palace-desc-push">
                     <a class="fancy s-full-width t-center js-buy-tickets" >
                    <span class="top-key"></span>
                    <span class="text">Buy Tickets</span>
                    <span class="bottom-key-1"></span>
                    <span class="bottom-key-2"></span>
                  </a> 
                </button>
                </div>
                
            </div>
        </div>
                <div class="row place-list  ">
                    <div class="col col-third s-full-width margin-t16">
                        <img src="assets/img/slider/iphone 2.jfif" alt="Paris" class="place-img">
                        <div class="place-body">
                            <h3 class="place-heading">Case Iphone</h3>
                            <p class="place-time">100.000</p>
                            <p class="place-desc">Apple iPhone 13 Silicone Case with MagSafe – Pink Pomelo - MM253FE/A</p>
                            <!-- <button href="#" class="btn s-full-width t-center js-buy-tickets ">Mua hàng  </button> -->
                            <button  href="#" class="palace-desc-push">
                                <a class="fancy s-full-width t-center js-buy-tickets" >
                               <span class="top-key"></span>
                               <span class="text">Buy Tickets</span>
                               <span class="bottom-key-1"></span>
                               <span class="bottom-key-2"></span>
                             </a> 
                           </button>
                        </div>
                    </div>
        </div>
                            
                        <div class="row place-list   ">
                            <div class="col col-third s-full-width margin-t16">
                                <img src="assets/img/slider/iphone 3.jfif" alt="San Francisco"class="place-img">
                                <div class="place-body">
                                    <h3 class="place-heading"> Case iPhone 13 Pro Max</h3>
                                    <p class="place-time">150.000</p>
                                    <p class="place-desc">iPhone 12 Pro Max Silicone Case with MagSafe - Cloud Blue </p>
                                    <!-- <button href="#" class="btn s-full-width t-center js-buy-tickets ">Mua hàng  </button> -->
                                    <button  href="#" class="palace-desc-push">
                                        <a class="fancy s-full-width t-center js-buy-tickets" >
                                       <span class="top-key"></span>
                                       <span class="text">Buy Tickets</span>
                                       <span class="bottom-key-1"></span>
                                       <span class="bottom-key-2"></span>
                                     </a> 
                                   </button>
                                </div>                                
                            </div>
                        </div>                       
<div class="clear"></div>
            </div>
        </div>
    </div>

<!-- Begin contact-section -->
<div id="contact" class="contact-section"> 
    <h2 class="section-heading"> CONTACT </h2>
    <p class="section-slogan">Connect me</p>

    <div class="row ">
        <div class="col col-half s-full-width contact-info  ">
<p> <i class="ti-location-pin"></i>  Viet Nam </p>
<p> <i class="ti-mobile"></i>  Phone: <a href="tel:+00 151515">090 ba không  không biết</a></p>
<p><i class="ti-email"></i>   Email: <a href="mailtonxt159753@gmail.com">nxt159753@gmail.com</a></p>
        </div>
        <div class="col col-half s-full-width contact-from">
<form action="">
    <div class="row">
        <div class="col s-full-width  col-half ">
<input type="text" name="" placeholder="Name" required id=""  class="form-control">
    </div>
        <div class="col s-full-width mt8 col-half">
    <input type="text" name="" placeholder="Email" required id=""  class="form-control">
</div>
</div>
<div class="clear"></div>

    <div class="row margin-top">
        <div class="col col-full">
            <input type="text" name="" placeholder="Message" required id=""  class="form-control">
        </div>
    </div>
    <input class=" contact-submit-btn btn margin-t16 pull-right s-full-width " type="submit" value="Send">
</form>
        </div>
    </div>
            </div>
<!-- End contact-section -->
<div class="map-section"> 
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d18678.17527887992!2d106.5937773!3d10.784113399999999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752bf5f26a2eed%3A0xc0e0af7c2b24176c!2zxJDhu5FpIERp4buHbiDhu6Z5IEJhbiBOaMOibiBEw6JuIFBoxrDhu51uZyBCw6xuaCBIxrBuZyBIw7JhIFTDom4gS-G7syBUw6JuIFF1w70!5e1!3m2!1sen!2s!4v1669386238392!5m2!1sen!2s" width="1920" height="800" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
</div>
        <div id="footer">
<div class="social">
    <a href="" class="ti-facebook"></a>
    <a href="" class="ti-instagram"></a>
    <a href="" class="ti-youtube"></a>
    <a href="" class="ti-pinterest"></a>
    <a href="" class="ti-twitter"></a>
    <a href="" class="ti-linkedin"></a>
</div>
<p class="copyright"> Written by <a href="https://f8.vercel.app/learning/html-css"> xuân trường</a> </p>
        </div>
    </div>

<div class="modal js-modal"> 
<div class="modal-container js-modal-container">
    <div class="modal-close js-modal-close">
    <i class="ti-close"></i>
    </div>

    <header class="modal-header"> 
        <i class="modal-header-icons ti-bag"></i>
        Information

    </header>
<div class="modal-body">
        <label for="ticket-quantity" class="modal-label">
            <i class="ti-shopping-cart"></i>
            Customer name
        </label>
        <input id="ticket-quantity" type="text" class="modal-input" placeholder="Enter Name.....">

        <label for="ticket-email" class="modal-label">
            <i class="ti-user"></i>
            Phone number
        </label>
        <input id="ticket-email" type="email" class="modal-input"placeholder="Enter Phone....">
<button id="buy-tickets-btn">
    Pay
        <i class="ti-check"></i>
</button>
</div>
<footer class="modal-footer">
    <p class="modal-help">
        Need <a href="https://f8.vercel.app/learning/html-css">help?</a>
    </p>
</footer>
</div>
</div>

<script> 
var header = document.getElementById('header');
var mobileMenu = document.getElementById('mobile-menu');
var headerHeight = header.clientHeight;
//open/close movile menu
mobileMenu.onclick = function(){
var isClose  = header.clientHeight === headerHeight;
if (isClose) {
    header.style.height = 'auto';
}else{
    header.style.height = null;
}
}
//auto close mobile mobileMenu
var menuItems =document.querySelectorAll('#nav li a[href*="#"]');

for (var i=0; i<menuItems.length; i++) {
    var menuItem = menuItems[i];
    
    menuItem.onclick = function(event) {
        var isParentMenu = this.nextElementSibling && this.nextElementSibling.classList.contains('subnav');
        if (isParentMenu) {
        event.preventDefault();
        } else {
            header.style.height = null;
    }
}
}
</script>

<script>
    const buyBtns = document.querySelectorAll('.js-buy-tickets')
const modal = document.querySelector('.modal')
const modalContainer = document.querySelector('.js-modal-container')
const modalClose = document.querySelector('.js-modal-close')
//hàm hiển thị modal mua vé (thêm clas open vào modlal)
function showBuyTickets(){
    modal.classList.add('open')
}
//hàm ẩn modal mua vé (gỡ bỏ clas open của modlal)
function hideBuyTicKets(){
    modal.classList.remove('open')
}
//Lặp qua từng thẻ button và nghe hành vi click 
    for (const buyBtn of buyBtns) {
        buyBtn.addEventListener('click', showBuyTickets)
    }
    //Nghe hành vi click vào button cloé 
    modalClose.addEventListener('click',hideBuyTicKets)
    modal.addEventListener('click',hideBuyTicKets )
    modalContainer.addEventListener('click',function (event) {
        event.stopPropagation()

    })
</script>
    
  
    
</body>
</html>
    
    
    
    
    
    
    
    
    
    
    