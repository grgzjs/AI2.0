//  check if user can access the page
//  if yes, allow to enter
//  otherwise redirect to login

// log out
// localStorage.removeItem('token');

async function rand() {
	return Math.random().toString(36).substring(2);
}

async function token() {
	let token = "";
	for (let i = 0; i < 24; i++) {
		token += await rand();
	}
	return token;
}

async function GetTokenInStorage() {
	return localStorage.getItem("token");
}

async function autoRedirect() {
	let token_in_storage = await GetTokenInStorage();
	let validLogIn = token_in_storage ? true : false;

	localStorage.getItem("token");
	console.log("token in storage: " + localStorage.getItem("token"));

	let token_generated = "";
	if (validLogIn) {
		// check if token exists in db and if so
		$.ajax({
			url: "login_query.php?check_token=" + token_in_storage, // your php file
			type: "GET", // type of the HTTP request
			success: function (data) {
				token_generated = token().toString().substring(0, 250);
				localStorage.setItem("token", token_generated);

				console.log("token_generated: " + token_generated);
			},
		});
	}

	console.log(
		"token_in_storage: " +
			token_in_storage +
			" && location.pathname: " +
			location.pathname
	);

	if (!validLogIn && location.pathname !== "/login.php") {
		window.location.href = "/login.php";
	}

	if (validLogIn && (location.pathname === "/login.php" || location.pathname === "/loginsignup.php" || location.pathname === "/loginforgot.php")) {
		window.location.href = "/dashboard.php";
	}
}

autoRedirect();
