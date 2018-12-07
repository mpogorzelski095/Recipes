$(document).ready(function() {
    $("#follow-btn").click(function(event) {
        event.preventDefault();
        var followButton = event.target;
        var followersCount = document.getElementById("followers-count");
        var userId = followButton.dataset.userid;

        $.ajax({
            method: "POST",
            url: urlFollow,
            data: { userId: userId, _token: token }
        })
            .done(function(res) {
                if (followButton.innerText === "Follow") {
                    followButton.innerText = "Unfollow";
                    followButton.className = "btn btn-danger";
                } else {
                    followButton.innerText = "Follow";
                    followButton.className = "btn btn-success";
                }
                followersCount.innerText = res.currentNumberOfFollowers;
            })
            .catch(function(err) {
                console.error(
                    `coś się zjebało, spróbuj ponownie później, masz stack trace, chociaż i tak chuja zrozumiesz\n${
                        err.responseText
                        }`
                );
            });
    });
});
