<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/home.css">
    <title>Punchi theatre</title>
</head>

<body>
<div class="container" id="topic">
    <div class="container1" id="topic">
        <div class="items">1. Books</div>
        <div class="items">2 Pens</div>
        <div class="items">3. Bottles</div>
        <div class="items">4. Bags</div>

        <!-- <input type="text" id="name" placeholder="Enter your name"><br>
        <input type="text" id="age" placeholder="Enter your age"><br> -->
        <input type="text" id="email" placeholder="Enter your email"><br>
        <input type="text" id="phone" placeholder="Enter your phone number"><br>

        <button id="btn">send Ajax data</button>
    </div> 

    <div class="container1" id="topic">
        <div class="get_not" id="get_not"></div>
        <div class="get_id" id="get_id"></div>
        <div class="get_name" id="get_name"></div>
        <div class="get_age" id="get_age"></div>
        <div class="get_email" id="get_email"></div>
        <div class="get_phone" id="get_phone"></div>
    </div>
</div>
</body>


<script src="assets/js/home.js"></script>
<script src="assets/js/jquery.js"></script>
</html>

<!-- ______________________JS_______________________ -->
<script>
    var email =document.getElementById('email');
    var phone =document.getElementById('phone');

    var btn1 = document.getElementById('btn');
    btn1.addEventListener("click",hit1);
    function hit1()
    {
        var details = 
        {
            // Aname:names.value, 
            // Aage:age.value, 
            Aemail:email.value, 
            Aphone:phone.value
        };

        jQuery.ajax
        ({
            url:'temp',
            data: details,
            type:'POST',
            success:function(x)
            {
                console.log(x);
                if(x=='data Not Found')
                {
                    // alert('Data Not Found');
                    var not =document.getElementById("get_not");
                    not.innerHTML = 'Data Not Found';

                    $("#get_id").empty();
                    $("#get_name").empty();
                    $("#get_age").empty();
                    $("#get_email").empty();
                    $("#get_phone").empty();
                }
                else
                {
                    $("#get_not").empty();

                    var data =JSON.parse(x);
                    // var data = x.split(",");

                    var set_id = data.id;
                    var set_name = data.name;
                    var set_age = data.age;
                    var set_email = data.email;
                    var set_phone = data.phone;

                    console.log("Name: " + set_name);
                    console.log("Age: " + set_age);
                    console.log("Email: " + set_email);
                    console.log("Phone: " + set_phone);

                    // alert(set_name);

                    // var get_name =document.getElementById('get_name');
                    // var get_age =document.getElementById('get_age');
                    // var get_email =document.getElementById('get_email');
                    // var get_phone =document.getElementById('get_phone');

                    get_id.innerHTML = 'Id:'+set_id;
                    get_name.innerHTML = 'Name:'+set_name;
                    $('#get_age').html('Age: '+set_age);
                    $('#get_email').text('Email: '+set_email);
                    $('#get_phone').text('Phone: '+set_phone);
                }
            }
        });
    }
</script>







<script>
    var input_userid =document.getElementById('userid');
    var input_name =document.getElementById('name');
    var input_address =document.getElementById('address');

    var btn1 = document.getElementById('btn1');
    btn1.addEventListener("click",hit1);

    function saveUser()
    {
        var details = 
        {
            id:input_userid.value,
            name:input_name.value,
            address:input_address.value
        };

        jQuery.ajax
        ({
            url:'api/v1/user/saveUser',
            data: details,
            type:'POST',
            success:function(x)
            {
                    var data =JSON.parse(x);

                    var set_id = data.id;
                    var set_name = data.name;
                    var set_address = data.address;

                    get_id.innerHTML = 'Id:'+set_id;
                    get_name.innerHTML = 'Name:'+set_name;
                    $('#get_address').text('Addess: '+set_address);
            }
        });
    }
</script>