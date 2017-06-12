<style>
    .companyinfo .contact-details li{
        font-size: 15px;
    }
    ul.companyinfo li:first-child{
        padding-right: 127px;
        font-size: 19px;
        color: #fe9b1e;
    }
</style>
<footer id="footer"><!--Footer-->
    <div class="footer-top">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="companyinfo">
                        <img src="/MA_Images/essamjumea.jpg">
                        <h2><span>Essam</span> Jumea</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit,sed do eiusmod tempor</p>
                    </div>
                </div>
                <div class="col-sm-6">
                    <ul class="companyinfo contact-details">
                        <li style="padding-left: 10px">معلومات عنا</li>
                        <li>
                            <span><i class="fa fa-location-arrow"></i> العنوان :  </span>
                            <span>العنوان هنا للمصنع</span>
                        </li>
                        <li>
                            <span> <i class="fa fa-envelope"></i> البريد الإلكترونى :  </span>
                            <span><a href="mailto:abuabdojoker22@gmail.com"> abuabdojoker22@gmail.com</a></span>
                        </li>
                        <li>
                            <span><i class="fa fa-phone"></i> رقم الهاتف :  </span>
                            <span><a href="callto:0100862177"> 01008662177</a></span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <p class="pull-right"> جميع الحقوق محفوظة لدى <p class="company">
                    <?php
                    echo  "<a href='/'>".\MAAlMOSTAQBAL\MA_Models\MA_MainModel::MA_getAll()[0]["ma_title"] . "</a>";
                    ?>
                </p> &copy;  <?php echo date("Y") ?>  .
                </p>
                 <p class="pull-right"> تطوير وتصميم بواسطة <span><a target="_blank" href="https://www.facebook.com/mabdulalmonem"> Mohamed Abdul ALmonem </a></span></p>
            </div>
        </div>
    </div>

</footer><!--/Footer-->
</div> <!-- ./Content-wrapper  -->
<!-- jQuery first, then Tether, then Bootstrap JS. -->
<script src="/MA_Js/jquery-3.2.1.min.js" type="text/javascript"></script>
<!-- Tether File  -->
<script src="/MA_Js/tether.min.js" type="text/javascript"></script>
<!-- BootStrap File  -->
<script src="/MA_Js/bootstrap.min.js" type="text/javascript"></script>
<!-- NiceScroll Pligin  -->
<script src="/MA_Js/jquery.nicescroll.min.js" type="text/javascript"></script>
<!-- Shuffle Plugin -->
<!--<script src="/MA_Js/jquery.quicksand.js"></script>-->
<!-- MA_JavaScript File -->
<script src="/MA_Js/MA_JavaScript.js" type="text/javascript"></script>
</body>
</html>