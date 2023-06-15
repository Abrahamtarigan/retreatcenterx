
<!DOCTYPE html>
<html>
<head>
    <title>Thanks for Order</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Cairo&display=swap" rel="stylesheet"> 
<style>
    .__area {
  font-family: 'Cairo', sans-serif;
  color: #7c7671;
  margin-top: 10px
}
.__bayar {
    font-family: 'Cairo', sans-serif;
    color: black;
}
.__bayar_proses {
    font-family: 'Cairo', sans-serif;
    color: black;
    font-weight:bold;
}

.__card {
  max-width: 350px;
  margin: auto;
  cursor: pointer;
  position: relative;
  display: inline-block;
  color: unset;
}
.__card:hover {
  color: unset;
  text-decoration: none;
}
.__img {
  border-radius: 10px;
}

.__favorit {
  background-color: #fff;
  border-radius: 8px;
  color: #fc9d52;
  position: absolute;
  right: 15px;
  top: 8px;
  padding: 3px 4px; 
  font-size: 22px;
  line-height: 100%;
  box-shadow: 0 0 5px rgba(0,0,0,0.3);
  z-index: 1;
  border: 0;
}
.__favorit:hover {
  background-color: #fc9d52;
  color: #fff;
  text-decoration: none;
}
.__card_detail {
  box-shadow: 0 4px 15px rgba(175,77,0,0.13);
  padding: 13px;
  border-radius: 8px;
  margin: -30px 10px 0;
  position: relative;
  z-index: 2;
  background-color: #fff; 
}
.__card_detail h4 {
  color: #474340;
  line-height: 100%;
  font-weight: bold;
}
.__card_detail p {
  font-size: 13px;
  font-weight: bold;
  margin-bottom: 0.4rem;
}
.__type span {
  background-color: #feefe3;
  padding: 5px 10px 7px;
  border-radius: 5px;
  display: inline-block;
  margin-right: 10px;
  font-size: 12px;
  color: #fc9d52;
  font-weight: bold;
  line-height: 100%;
}
.__detail {
  margin-top: 5px;
}
.__detail i {
  font-size: 21px;
  display: inline-block;
  vertical-align: middle;
}
.__detail i:nth-child(3) {
  margin-left: 15px;
}
.__detail span {
  font-size: 16px;
  display: inline-block;
  vertical-align: middle;
  margin-left: 2px;
}
</style>
</head>
<body>
    <div class="container mt-5 ">
        <div class="jumbotron text-center __bayar">
            <h1 class="display-4">Thanks for Your Order!</h1>
            <p class="lead">We appreciate your business and hope you enjoy your purchase.</p>
            <hr class="my-4">
            <p>Here are your order details:</p>
            <ul class="list-group">
                <li class="list-group-item">Order Number: 12345</li>
                <li class="list-group-item">Order Date: 2023-04-04</li>
                <li class="list-group-item">Total Amount: $50.00</li>
            </ul>
            <a class="btn btn-primary btn-lg mt-4" href="#" role="button">Continue Shopping</a>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script type="text/javascript">
    history.pushState(null, null, location.href);
    history.back();
    history.forward();
    window.onpopstate = function () { history.go(1); };
</script>
<script type="text/javascript">
    (function (global) {

if(typeof (global) === "undefined")
{
    throw new Error("window is undefined");
}

var _hash = "!";
var noBackPlease = function () {
    global.location.href += "#";

    // making sure we have the fruit available for juice....
    // 50 milliseconds for just once do not cost much (^__^)
    global.setTimeout(function () {
        global.location.href += "!";
    }, 50);
};

// Earlier we had setInerval here....
global.onhashchange = function () {
    if (global.location.hash !== _hash) {
        global.location.hash = _hash;
    }
};

global.onload = function () {
    
    noBackPlease();

    // disables backspace on page except on input fields and textarea..
    document.body.onkeydown = function (e) {
        var elm = e.target.nodeName.toLowerCase();
        if (e.which === 8 && (elm !== 'input' && elm  !== 'textarea')) {
            e.preventDefault();
        }
        // stopping event bubbling up the DOM tree..
        e.stopPropagation();
    };
    
};

})(window);
</script>
</body>
</html>
