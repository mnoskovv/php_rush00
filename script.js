  var bask = [];
  var len;
(function () {
    var order_nbr = 1000000;
  

    function turn_visibility(element, option) {
        if (option) {
            element.style.visibility = "visible";
            element.style.opacity = 1;
        }
        else {
            element.style.visibility = "hidden";
            element.style.opacity = 0;
        }
    }

    function init() {

        if (localStorage.getItem('order_nbr'))
            order_nbr = localStorage.getItem('order_nbr', order_nbr);
        
        if (document.getElementById("sign-in"))
        {

            document.getElementById("sign-in").addEventListener("click", function () {
                turn_visibility(document.getElementById("success-order-form"), false);            
                turn_visibility(document.getElementById("basket-page"), false);
                turn_visibility(document.getElementById("sign-up-form"), false);
                turn_visibility(document.getElementById("sign-in-form"), true);
    
            });
        }
        if (document.getElementById("sign-up"))
        {
            document.getElementById("sign-up").addEventListener("click", function () {
                turn_visibility(document.getElementById("success-order-form"), false);
                turn_visibility(document.getElementById("basket-page"), false);
                turn_visibility(document.getElementById("sign-in-form"), false);
                turn_visibility(document.getElementById("sign-up-form"), true);

            });
        }


      

        document.getElementById("basket-order").addEventListener("click", function () {
            turn_visibility(document.getElementById("basket-page"), false);
            turn_visibility(document.getElementById("success-order-form"), true);
            document.getElementById("order-nbr-str").innerHTML = order_nbr++;
            localStorage.setItem('order_nbr', order_nbr);
        });

        document.getElementById("close-sign-up-form").addEventListener("click", function () {
            turn_visibility(document.getElementById("sign-up-form"), false);
        });
        document.getElementById("close-sign-in-form").addEventListener("click", function () {
            turn_visibility(document.getElementById("sign-in-form"), false);

        });
        document.getElementById("close-basket-page").addEventListener("click", function () {
            turn_visibility(document.getElementById("basket-page"), false);

        });

        document.getElementById("close-success-order-form").addEventListener("click", function () {
            turn_visibility(document.getElementById("success-order-form"), false);

        });

   


    }
    window.onload = init;
}());
