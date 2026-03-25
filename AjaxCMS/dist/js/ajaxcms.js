document.addEventListener("DOMContentLoaded", function () {
    loadPosts();
    const btnPost = document.getElementById("btnpost");

    if (btnPost) {
        btnPost.addEventListener("click", function (e) {
            console.log("JS file loaded");
            e.preventDefault();
           
            const id = document.getElementById("postId")?.value || "";  
            let action = id ? "update_post" : "add_post";
             const postData = {
                userId: 1,
                id:id,
                title: document.getElementById("title").value,
                content: document.getElementById("content").value
            };

            fetch(`/Project/AjaxCMS/php/api.php?action=${action}`, {
                method: 'POST',
                body: JSON.stringify(postData)
            })
            .then(res => res.text())
            .then(data => {
                document.getElementById("postForm").reset();
                document.getElementById("postId").value = "";
                document.getElementById("btnpost").innerText = "Add Post";

                loadPosts();
            }).catch(err => console.error(err));
        });
    }

});
document.addEventListener("click", function (e) {

    if (e.target.classList.contains("editBtn")) {

        const id = e.target.getAttribute("data-id");
        const title = e.target.getAttribute("data-title");
        const content = e.target.getAttribute("data-content");

        document.getElementById("postId").value = id;
        document.getElementById("title").value = title;
        document.getElementById("content").value = content;
        document.getElementById("btnpost").innerText = "Update";
    }
    if(e.target.classList.contains("deleteBtn")) {
        value = {id :  e.target.getAttribute("data-id")};
        fetch(`/Project/AjaxCMS/php/api.php?action=delete_post`, {
                method: 'POST',
                body: JSON.stringify(value)
            })
            .then(res => res.text())
            .then(data => {
                document.getElementById("postForm").reset();
                document.getElementById("postId").value = "";

                loadPosts();
            }).catch(err => console.error(err));
    }

});
function loadPosts() {
    fetch('/Project/AjaxCMS/php/api.php?action=get_posts')
        .then(res => res.text())
        .then(data => {
            document.getElementById("postTable").innerHTML = data;
        });
}