document.addEventListener("DOMContentLoaded", function () {
    loadUsers();
    const btnUser = document.getElementById("btnuser");

    if (btnUser) {
        btnUser.addEventListener("click", function (e) {
            e.preventDefault();
            const id = document.getElementById("userId")?.value || ""; 
            let action = id ? "update_user" : "add_user";
            const postData = {
                id:id,
                name: document.getElementById("name").value,
                email: document.getElementById("email").value
            };

            fetch(`/Project/AjaxCMS/php/api.php?action=${action}`, {
                method: 'POST',
                body: JSON.stringify(postData)
            })
            .then(res => res.text())
            .then(data => {
                document.getElementById("userForm").reset();
                document.getElementById("userId").value = "";
                document.getElementById("btnuser").innerText = "Add User";
                loadUsers();
            })
            .catch(err => console.error(err));
        });
    }

});
document.addEventListener("click", function (e) {
    if (e.target.classList.contains("editUserBtn")) {

        const id = e.target.getAttribute("data-id");
        const email = e.target.getAttribute("data-email");
        const name = e.target.getAttribute("data-name");

        document.getElementById("userId").value = id;
        document.getElementById("name").value = name;
        document.getElementById("email").value = email;
        document.getElementById("btnuser").innerText = "Update";
    }
    if(e.target.classList.contains("deleteUserBtn")) {
        value = {id :  e.target.getAttribute("data-id")};
        fetch(`/Project/AjaxCMS/php/api.php?action=delete_user`, {
                method: 'POST',
                body: JSON.stringify(value)
            })
            .then(res => res.text())
            .then(data => {

                loadUsers();
            }).catch(err => console.error(err));
    }
});

function loadUsers() {
    fetch('/Project/AjaxCMS/php/api.php?action=get_users')
        .then(res => res.text())
        .then(data => {
            document.getElementById("tblUser").innerHTML = data;
        });
}