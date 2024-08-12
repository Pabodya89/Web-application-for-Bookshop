<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/home.css">
    <link rel="stylesheet" href="assets/fontawesome/css/fontawesome.min.css">
    <link rel="javascript" href="assets/fontawesome/js/fontawesome.min.js">
    <title>Punchi theatre</title>
</head>

<body>
    <!--_____________nav bar_________ -->
    <div class="content">
        <header>
            <p><label for="menu"><span class="fa fa-bars"></span></label><span class="accueil">Accueil</span></p>

            <div class="search-wrapp">
                <span class="fa fa-search"></span>
                <input type="search" name="" placeholder="recherche">
            </div>

            <div id="dropdown" class="user-wrapp">
                <div>
                    <h4>Alassane</h4>
                    <small>Admin</small>
                </div>
                <img decoding="async" src="images/pp.jpg" width="30" height="30" class="logo-admin">
                <div class="dropdown-content">
                    <p>Profil</p>
                    <p>Deconnexion</p>
                </div>
            </div>
        </header>
    </div>
    <!--_______________________________-->


    <!-- ___________Side bar___________ -->
    <div class="sidebar">
        <div class="sidebar-brand">
            <h2><span class="fa fa-user-o"> </span> Suraksha Book Shop</h2>
        </div>

        <div class="sidebar-menu">
            <ul>
                <li><a href="#" class="active"><span class="fa fa-home"></span><span>Income & Expenses</span></a></li>
                <li><a href="#" ><span class="fa fa-tasks"></span><span>Sell</span></a></li>
                <li><a href="#"><span class="fa fa-th-large"></span><span>Buy</span></a></li>
                <li><a href="#"><span class="fa fa-line-chart"></span><span>Sell Details</span></a></li>
                <li><a href="#"><span class="fa fa-address-book"></span><span>Buy Details</span></a></li>
                <li><a href="#"><span class="fa fa-clipboard"></span><span>Additional Expences</span></a></li>
                <li><a href="#"><span class="fa fa-money"></span><span>Employee Manage</span></a></li>
                <li><a href="#"><span class="fa fa-registered"></span><span>Option</span></a></li>
            </ul>
        </div>
    </div>
    <!-- _______________________________ -->



<main>
<div class="cards">
	 <div class="card-single">
	 	<div>
	 		<h2>LKR <?php if($data['today_income']){ echo $data['today_income']; } ?></h2>
	 		<br><small><b>Today Total Income</b></small>
	 	</div>
	 	<div>
	 		<span class="fa fa-shopping-cart"></span>
	 	</div>
	 </div>

	 <div class="card-single">
	 	<div>
	 		<h2>LKR <?php if($data['today_discount']){ echo $data['today_discount']; } ?></h2>
             <br><small><b>Today Customers Discounts</b></small>

	 	</div>
	 	<div>
	 		<span class="fa fa-newspaper-o"></span>
	 	</div>
	 </div>

	 <div class="card-single">
	 	<div>
            <p>Monthly Income</p><br>
            <div class="price">LKR</div> 
            <h2><div id="t_price"></div></h2>
            <small>Monthly Income</small>  
	 	</div>

	 	<div class="dropdown-container">
            <select id="year-select">
                <!-- <option value="">Year</option> -->
            </select>
            <select id="month-select">
                <!-- <option value="">Month</option> -->
                <option value="01">January</option>
                <option value="02">February</option>
                <option value="03">March</option>
                <option value="04">April</option>
                <option value="05">May</option>
                <option value="06">June</option>
                <option value="07">July</option>
                <option value="08">August</option>
                <option value="09">September</option>
                <option value="10">October</option>
                <option value="11">November</option>
                <option value="12">December</option>
            </select>
	 	</div>

	 </div>

	 <div class="card-single">
	 	<div>
         <p>Daily Total Income</p>
	 	<h2>LKR </h2>
	 	<small>Communauté</small>
	 	</div>
	 	<div>
	 	<span class="fa fa-group"></span>
	 </div>
    </div>
</div>
<!-- ________________________________________________________________________ -->
<script>
    const currentYear = new Date().getFullYear();
    const startYear = 2023; // Adjust this range as needed
    const endYear = currentYear;

    const monthSelect = document.getElementById('month-select');
    const yearSelect = document.getElementById('year-select');

    for (let year = endYear; year >= startYear; year--) 
    {
        const option = document.createElement('option');
        option.value = year;
        option.textContent = year;
        yearSelect.appendChild(option);
    }


    function sendRequest() 
    {
            const selectedYear = yearSelect.value;
            const selectedMonth = monthSelect.value;

            if (selectedYear && selectedMonth) 
            {
                // Create an AJAX request
                const xhr = new XMLHttpRequest();
                xhr.open('POST', 'Admin', true);
                xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                xhr.onreadystatechange = function() 
                {
                    if(xhr.readyState == 4 && xhr.status == 200) 
                    {
                        result =JSON.parse(xhr.responseText);
                        console.log(result);
                        var t_price = document.getElementById('t_price');
                        t_price.innerHTML = result.total_price;
                    }
                };
                xhr.send(`year=${selectedYear}&month=${selectedMonth}`);
            }
        }
        yearSelect.value = currentYear;
        monthSelect.value = ("0" + (new Date().getMonth() + 1)).slice(-2);

        // Add event listeners to dropdowns
        yearSelect.addEventListener('change', sendRequest);
        monthSelect.addEventListener('change', sendRequest);

        window.onload = sendRequest;
</script>
<!-- _______________________________________________________________________ -->
<div class="composant">
	<div class="ventes">
		<div class="case">
			<div class="header-case">
				<h2>Listes produits</h2>
				<button class="button">voir plus <span class="fa fa-arrow-right"></span></button>
			</div>
			<div class="body-case">
				<div class="tableau">
					<table width="100%">
						<thead>
							<tr>
								<td>modou</td>
								<td>pathe</td>
								<td>demba</td>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>modou</td>
								<td>dmeba</td>
								<td><span class="status-produit color-one"></span>mass</td>
							</tr>
							<tr>
								<td>modou</td>
								<td>dmeba</td>
								<td><span class="status-produit color-two"></span>mass</td>
							</tr>
							<tr>
								<td>modou</td>
								<td>dmeba</td>
								<td><span class="status-produit color-three"></span>mass</td>
							</tr>
							<tr>
								<td>modou</td>
								<td>dmeba</td>
								<td><span class="status-produit color-four"></span>mass</td>
							</tr>
							<tr>
								<td>modou</td>
								<td>dmeba</td>
								<td><span class="status-produit color-five"></span>mass</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>


	<div class="stock">
		<div class="case">
			<div class="header-case">
				<h2>Clients fideles</h2>
			</div>

			<div class="body-case">
				<div class="all-users">
					<div class="infos">
						<img decoding="async" src="images/pp.jpg" width="30" height="30">
						<div>
							<h4>Omar</h4>
							<small>Embulant</small>
						</div>
					</div>

					<div class="user-contact">
						<span class="fa fa-facebook"></span>
						<span class="fa fa-whatsapp"></span>
						<span class="fa fa-phone"></span>
					</div>
				</div>
				<div class="all-users">
					<div class="infos">
						<img decoding="async" src="images/pp.jpg" width="30" height="30">
						<div>
							<h4>Omar</h4>
							<small>Embulant</small>
						</div>
					</div>

					<div class="user-contact">
						<span class="fa fa-facebook"></span>
						<span class="fa fa-whatsapp"></span>
						<span class="fa fa-phone"></span>
					</div>
				</div>
				<div class="all-users">
					<div class="infos">
						<img decoding="async" src="images/pp.jpg" width="30" height="30">
						<div>
							<h4>Omar</h4>
							<small>Embulant</small>
						</div>
					</div>

					<div class="user-contact">
						<span class="fa fa-facebook"></span>
						<span class="fa fa-whatsapp"></span>
						<span class="fa fa-phone"></span>
					</div>
				</div>
				<div class="all-users">
					<div class="infos">
						<img decoding="async" src="images/pp.jpg" width="30" height="30">
						<div>
							<h4>Omar</h4>
							<small>Embulant</small>
						</div>
					</div>

					<div class="user-contact">
						<span class="fa fa-facebook"></span>
						<span class="fa fa-whatsapp"></span>
						<span class="fa fa-phone"></span>
					</div>
				</div>
				<div class="all-users">
					<div class="infos">
						<img decoding="async" src="images/pp.jpg" width="30" height="30">
						<div>
							<h4>Omar</h4>
							<small>Embulant</small>
						</div>
					</div>

					<div class="user-contact">
						<span class="fa fa-facebook"></span>
						<span class="fa fa-whatsapp"></span>
						<span class="fa fa-phone"></span>
					</div>
				</div>


			</div>
			<button class="btn">voir plus <span class="fa fa-arrow-right"></span></button>
		</div>

	</div>


	<div class="statistiques">
		<div class="statistique-barre bar1"></div>
		<div class="statistique-barre bar2"></div>
		<div class="statistique-barre bar3"></div>
		<div class="statistique-barre bar4"></div>
		<div class="statistique-barre bar5"></div>
		<div class="statistique-barre bar6"></div>
		<div class="statistique-barre bar4"></div>
		<div class="statistique-barre bar5"></div>
		<div class="statistique-barre bar6"></div>
		<div class="statistique-barre bar4"></div>
		<div class="statistique-barre bar5"></div>
		<div class="statistique-barre bar6"></div>
	</div>


	<div class="legende">
		<h4>Legende</h4>
		<table>
			<tr>
				<td><span class="evolution color-one"></span>Riz</td>
			</tr>
			<tr>
				<td><span class="evolution color-two"></span>Mil</td>
			</tr>
		</table>
		<div class="txt-deco">
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
			tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
			quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
			</p>
		</div>
	</div>
</div>
		</main>

<input type="checkbox" name="" id="menu">

</body>
</html>
<!-- ______________________JS_______________________ -->
<script>
    
</script>