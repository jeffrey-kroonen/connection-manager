window.onload = () => {

    let loginForm = document.getElementById("login-form");
    if (loginForm != null) {
        loginForm.addEventListener("submit", (e) => {
            e.preventDefault();

           fetch(URL + "/login", {
               method: "post",
               headers: {
                   "Content-Type": "application/json"
               },
               body: JSON.stringify({
                   email: loginForm.email.value,
                   password: loginForm.password.value,
               })
           })
           .then(res => res.json())
           .then(data => {
               console.log("TODO: create message an fail and redirect on success.");
           })
           .catch((error) => {
               console.lerror(error);
           }) 
        });
    }   

};