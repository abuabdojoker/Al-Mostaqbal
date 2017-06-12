<style>
    .home{
        margin-bottom: 50px;
        position: relative;
    }
    .section-top{
        margin-top: 70px;
    }
    .section-title{

        width: auto;

    }
    .section-title:after{
        border-bottom: 2px solid #696763!important;
        min-width: 10px;
        max-width: 25px;
    }
    .section-content{
        padding-top:50px;
        position: relative;
    }
    .section-content .img img{
        border-radius:50%;
        width: auto;
        min-width: 250px;
        max-width: 250px;
        height: auto;
        min-height: 250px;
        max-height: 250px;
    }
    .description{
        position: relative;
        float: left;
        margin-left: 80px;
        margin-top: -175px;
    }

    .text-waite{
        color: #fff!important;
    }
    .more{
        float: left!important;
    }
    ul li{
        list-style: none;
    }
    /*
     * Our Products
     */
    .shuffle{
        padding:0;
    }
    ul.shuffle li{
        list-style: none;
        display: inline-box;
        display: -webkit-inline-box;
        background: #f0f0e9;
        padding: 10px;
        margin-left: 10px;
        border-radius: 4px;
        cursor: pointer;
    }
    .shuffle .liHover, ul.shuffle li:hover {
        color: #fe980f!important;
        transition: 0.5s;
    }
    .ma-shuffle .mix{
        display: inline-block;
        margin-left: 25px;
        margin-bottom: 25px;
        background: #f0f0e9;
        padding-bottom:10px;
        border-bottom-left-radius: 4px;
        border-bottom-right-radius: 4px;
    }
    .ma-shuffle .mix:hover .ma-btn{
        display: block;
    }
    .ma-shuffle .mix img{
        border-top-left-radius: 4px;
        border-top-right-radius: 4px;
    }
    .ma-shuffle .mix p{
        color: #696763!important;
        text-align: center;
        padding-top: 11px;
    }
    /*
     * Contact Form
     */
    .contactus .section-content{
        display: flex;
    }
    .contactus .section-content .contact-form{
        margin-top: -32px;
    }
    .contact-form .form-control{
        background: #f0f0e9;
    }
    .contactus .section-content .form-control, input[type=submit]{
        font-family:Cairo;
    }
    .contactus .section-content textarea{
        height:215px;
    }
    .contactus .map iframe{
        width: 53vw;
        height: 429px;
        margin-top: -31px;
    }
    /*
     * Footer
     */
    .footer .companyinfo , p{
        font-family: Cairo!important;
    }
    .footer .companyinfo img{
        border-radius: 50%;
    }
</style>
<div class="content-page">
    <div class="content">
        <div class="home slider">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner" role="listbox">
                    <div class="carousel-item active">
                        <img class="d-block img-fluid" src="/MA_Images/beautiful-sunset-images-196063.jpg" alt="First slide">
                        <div class="carousel-caption d-none d-md-block">
                            <h3>...</h3>
                            <p>...</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img class="d-block img-fluid" src="/MA_Images/images%20(1).jpg" alt="Second slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block img-fluid" src="..." alt="Third slide">
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
        <div class="container">
            <div class="home aboutus" id="aboutus">
                <div class="section-top">
                    <h2 class="section-title text-right">عنا</h2>
                </div>
                <div class="section-content">
                    <div class="img col-lg-4">
                        <img src="/MA_Images/1.jpg" alt="almostaqbal">
                    </div>
                    <div class="description col-lg-8">
                        <h3>This is The Title For About Us</h3>
                        <p>
                            <div>
                            This Is A Description For About Us.
                            Write AnyThing You Want To Write It Here.
                            AlMostaqbal Company For An Creative Flicker For Companies Or Houses Or Vials Or Architecture.
                            Mohamed Abdul Almonem Is a Developer For This Site.
                            </div>
                            <br /><a href="/page/aboutus" class="btn btn-primary text-waite more">معرفة المزيد</a>
                        </p>
                    </div>
                </div>
            </div>
            <div class="home ourprojects" id="ourprojects">
                <div class="section-top">
                    <h3 class="section-title">منتجاتنا</h3>
                    <div class="section-content ma-shuffle">
                        <ul class="shuffle">
                            <?php
                            if (!empty($MA_CATEGORY)){
                                foreach ($MA_CATEGORY as $ma_category){
                                    ?>
                                    <li class="liHover" data-filter=".<?php echo $ma_category['MA_Title'] ?>"><?php echo $ma_category['MA_Title'] ?></li>
                                    <?php
                                }
                            } else{
                                ?>
                                <li class="liHover" data-filter=".shu1">خزف</li>
                                <li data-filter=".shu2">جرانيت</li>
                                <li data-filter="shu3">رخام</li>
                                <?php
                            }
                            ?>
                        </ul>
                        <center>
                            <div class="container">
                                <?php
                                if (!empty($MA_PRODUCTS)) {

                                    foreach ($MA_PRODUCTS as $MA_PRODUCT) {
                                       $MA_Category =  \MAAlMOSTAQBAL\MA_Models\MA_CategoryModel::MA_getById($MA_PRODUCT['MA_Category'])
                                        ?>
                                        <div class="mix <?php echo $MA_Category['MA_Title'] ?>">
                                            <img src="<?php echo $MA_PRODUCT['MA_Picture'] ?>">
                                            <p><?php echo $MA_PRODUCT['MA_Title'] ?></p>
                                            <p><?php echo $MA_PRODUCT['MA_Description'] ?></p>
                                            <button algin="center" class="ma-btn btn btn-primary"
                                                    data-productID="<?php echo $MA_PRODUCT['MA_ID'] ?>">Learn More
                                            </button>
                                        </div>
                                        <?php
                                    }
                                }else{
                                ?>
                                <div class="mix shu1">
                                    <input type="hidden" value="this is the card two">
                                    <img src="/MA_Images/avatar04.png">
                                    <p>Product Name</p>
                                    <button algin="center" class="ma-btn btn btn-primary">Learn More</button>
                                </div>
                                <div class="mix sh2">
                                    <input type="hidden" value="this is the card two">
                                    <img src="/MA_Images/avatar04.png">
                                    <p>Product Name2</p>
                                    <button algin="center" class="ma-btn btn btn-primary">Learn More</button>
                                </div>
                                <div class="mix sh2">
                                    <input type="hidden" value="this is the card two">
                                    <img src="/MA_Images/avatar04.png">
                                    <p>Product Name2</p>
                                    <button algin="center" class="ma-btn btn btn-primary">Learn More</button>
                                </div>
                                <div class="mix sh2">
                                    <input type="hidden" value="this is the card two">
                                    <img src="/MA_Images/avatar04.png">
                                    <p>Product Name2</p>
                                    <button algin="center" class="ma-btn btn btn-primary">Learn More</button>
                                </div>
                                <div class="mix sh2">
                                    <input type="hidden" value="this is the card two">
                                    <img src="/MA_Images/avatar04.png">
                                    <p>Product Name2</p>
                                    <button algin="center" class="ma-btn btn btn-primary">Learn More</button>
                                </div>
                                <div class="mix sh2">
                                    <input type="hidden" value="this is the card two">
                                    <img src="/MA_Images/avatar04.png">
                                    <p>Product Name2</p>
                                    <button algin="center" class="ma-btn btn btn-primary">Learn More</button>
                                </div>
                            </div>
                            <?php
                            }
                            if ($MA_Count >= 6){
                                    ?>
                                <a href="/page/ourprojects" class="btn btn-primary text-waite">المزيد من المشاريع</a>
                                    <?php
                            }
                            ?>

                        </center>
                    </div>
                </div>
            </div>
            <div class="home contactus">
                <div class="section-top">
                    <h3 class="section-title">اﻹتصال بنا</h3>
                </div>
                <div class="section-content">
                    <div class="col-lg-4">
                        <div class="ma-msg">

                        </div>
                        <div class="contact-form">
                            <form>
                                <div class="form-group">
                                    <input type="text" class="form-control name" name="name" placeholder="الإسم كامل" required>
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control email" name="email" placeholder="البريد الإلكترونى" required>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control sub" name="subject" placeholder="موضوع الرسالة" required>
                                </div>
                                <div class="form-group">
                                    <textarea name="message" class="form-control msg" placeholder="محتوى الرسالة" required></textarea>
                                </div>
                                <div class="form-group">
                                    <input type="submit" class="btn btn-primary send" name="send" value="إرسال الرسالة">
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="map">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d110502.76983794852!2d31.18825199463881!3d30.05946979932545!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14583fa60b21beeb%3A0x79dfb296e8423bba!2sCairo%2C+Cairo+Governorate!5e0!3m2!1sen!2seg!4v1496861896998" frameborder="0" style="border:0" allowfullscreen></iframe>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">

                </div>
            </div>
        </div>
    </div>
</div>


