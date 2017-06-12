
<style>

    /*************************
    *******404 CSS******
    **************************/
    .text-center{
        text-align: center;
    }
    .logo-404 {
        margin-top: 60px;
    }

    .content-404 h1 {
        color: #363432;
        font-family: 'Roboto', sans-serif;
        font-size: 41px;
        font-weight: 300;
    }

    .content-404 img {

        margin:0 auto;
    }

    .content-404 p {
        color: #363432;
        font-family: 'Roboto', sans-serif;
        font-size: 18px;
    }

    .content-404  h2 {
        margin-top:50px;
    }

    .content-404 h2 a {
        background: #FE980F;
        color: #FFFFFF;
        font-family: 'Roboto', sans-serif;
        font-size: 44px;
        font-weight: 300;
        padding: 8px 40px;
    }
    /* XS Portrait */
    @media (max-width: 1102px) {
      .content-404 img{
          width: 100%;
      }
    }
    @media (max-width: 480px) {
        .content-404 h1{
            font-size: 30px;
        }

        .content-404 h2 a{
            font-size: 20px;
        }
    }
    a{
        text-decoration: none;
    }
</style>

<div class="container text-center">
    <div class="logo-404">
        <a href="/"><img src="/MA_Images/logo.png" alt="" /></a>
    </div>
    <div class="content-404">
        <img src="/MA_Images/404.png" class="img-responsive" alt="" />
        <h1><b>OPPS!</b> We Couldn’t Find this Page</h1>
        <p>Uh... So it looks like you brock something. The page you are looking for has up and Vanished.</p>
        <h2><a href="/">Bring me back Home</a></h2>
    </div>
</div>