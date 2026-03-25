document.addEventListener("DOMContentLoaded", function () {
    loaddashPosts();
});
document.addEventListener("click", function (e) {
    
    if(e.target.classList.contains("deletePost")) {
        value = {id :  e.target.getAttribute("data-id")};
        fetch(`/Project/AjaxCMS/php/api.php?action=delete_post`, {
                method: 'POST',
                body: JSON.stringify(value)
            })
            .then(res => res.text())
            .then(data => {

                loaddashPosts();
            }).catch(err => console.error(err));
    }
});
function loaddashPosts() {
    fetch('/Project/AjaxCMS/php/api.php?action=get_dashposts')
        .then(res => res.text())
        .then(data => {
            document.getElementById("tblpost").innerHTML = data;
        });
    fetch('/Project/AjaxCMS/php/api.php?action=get_count')
        .then(res => res.text())
        .then(data => {
            document.getElementById("postCount").innerHTML = data;
        });
    fetch('/Project/AjaxCMS/php/api.php?action=get_userCount')
        .then(res => res.text())
        .then(data => {
            document.getElementById("userCount").innerHTML = data;
        });
}