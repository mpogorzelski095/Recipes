var postId = 0;
jQuery(document).ready(function() {
    jQuery(".like").click(function(event) {
        // console.log(event);
        event.preventDefault();
        postId =
            event.target.parentNode.parentNode.parentNode.dataset["postid"];
        var isLike = event.target.previousElementSibling == null;
        console.log(postId, isLike);
        $.ajax({
            method: "POST",
            url: urlLike,
            data: { isLike: isLike, postId: postId, _token: token }
        }).done(function() {
            event.target.innerText = isLike
                ? event.target.innerText === "Like"
                    ? "Unfollow"
                    : "Follow"
                : event.target.innerText === "Dislike"
                    ? "You don't like this post"
                    : "Dislike";
            if (isLike) {
                event.target.nextElementSibling.innerText = "Dislike";
            } else {
                event.target.previousElementSibling.innerText = "Like";
            }
            // tutaj pierdolij to odswiezanie tych lajkow
        });
    });
});



