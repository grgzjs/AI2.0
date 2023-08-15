window.onload = () => {
    var valid_for_admin = [
        "dashboard.php",
        "menuprofile.php",
        "hello.php",
        "hellolist.php",
        "crmregistro.php",
        "crm.php",
        "aircraft_setup.php",
        "admin_panel.php",
        "opsmain.php",
        "opsmain2.php",
        "opsmain3.php",
        "ops_calendar.php",
    ];
    var valid_for_seller = [
        "dashboard.php",
        "menuprofile.php",
        "hello.php",
        "hellolist.php",
        "crmregistro.php",
        "crm.php",
        // "aircraft_setup.php",
        "ops_calendar.php",
    ];
    var valid_for_dispatcher = [
        "dashboard.php",
        "menuprofile.php",
        "hello.php",
        "hellolist.php",
        "crmregistro.php",
        "crm.php",
        // "aircraft_setup.php",
        "opsmain.php",
        "opsmain2.php",
        "opsmain3.php",
    ];
    var valid_for_owner = [
        "dashboard.php",
        "menuprofile.php",
        "aircraft_setup.php",
    ];

    async function auto_redirect() {
        let token_in_storage = localStorage.getItem("token");
        let validLogIn = token_in_storage != null ? true : false;

        // console.log("token_in_storage: " + token_in_storage);
        // console.log("validLogIn: " + validLogIn);

        if (!validLogIn && location.pathname !== "/login.php") {
            if (
                location.pathname !== "/loginsignup.php" &&
                location.pathname !== "/loginforgot.php"
            ) {
                window.location.href = "/login.php";
            }
        }

        if (
            validLogIn &&
            (location.pathname === "/login.php" ||
                location.pathname === "/loginsignup.php" ||
                location.pathname === "/loginforgot.php")
        ) {
            window.location.href = "/dashboard.php";
        }
    }

    async function check_user_validity() {
        let usertype_in_storage = localStorage.getItem("user_type");

        let valid_list = [];

        switch (usertype_in_storage) {
            case "admin":
                valid_list = valid_for_admin;
                break;
            case "sales":
                valid_list = valid_for_seller;
                break;
            case "dispatch":
                valid_list = valid_for_dispatcher;
                break;
            case "owner":
                valid_list = valid_for_owner;
                break;
            default:
                valid_list = ["dashboard.php", "menuprofile.php"];
                break;
        }

        let valid_user = false;
        for (let i = 0; i < valid_list.length; i++) {
            let valid_location = valid_list[i];
            if (valid_location.includes(location.pathname.substring(1))) {
                valid_user = true;
                break;
            }
        }

        // send to dashboard if web is forbidden
        if (!valid_user && location.pathname != "/dashboard.php") {
            window.location.href = "/dashboard.php";
        }
    }

    // let k = "Do not touch!";
    // let encrypted = CryptoJS.AES.encrypt(signature, key);
    // console.log(encrypted.toString());

    // let d = CryptoJS.AES.decrypt(
    //     "U2FsdGVkX1+bPE4EiavYngPyBBU0d0cxPgl/hOwFaFjSeJiFyLszDNVbHpGgyG8dcRJGSSxwrUL7dntLCcW4nYcsGT+re/P+0PnFn1ldgnQ=",
    //     k
    // );
    // let t = d.toString(CryptoJS.enc.Utf8);
    // console.log(t);

    // let h = document.createElement("span");
    // h.setAttribute("hidden", "hidden");
    // h.innerHTML = t;
    // // document.body.appendChild(h);
    // document.body.prepend(h);

    // insert into
    auto_redirect();

    if (localStorage.getItem("token") == null) return;

    // redirects if user_type cannot see location
    check_user_validity();
};