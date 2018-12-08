$(document).ready(function() {
    $(".like-btn").click(function(event) {
        event.preventDefault();

        var likeButton = event.target;
        var postId = likeButton.dataset.postid;
        var likesCount = document.getElementById(`likes-count-${postId}`);

        $.ajax({
            method: "POST",
            url: urlLike,
            data: { postId: postId, _token: token }
        })
            .done(function(res) {
                if (likeButton.innerText === "Like") {
                    likeButton.innerText = "DisLike";
                    likeButton.className = "btn btn-danger";
                } else {
                    likeButton.innerText = "Like";
                    likeButton.className = "btn btn-success";
                }
                likesCount.innerText = res.currentNumberOfLikes;
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

//         var isLike = event.target.previousElementSibling == null;
//
// //         $.ajax({
// //             method: "POST",
// //             url: urlLike,
// //             data: { isLike: isLike, postId: postId, _token: token }
// //         }).done(function(res) {
// //             event.target.innerText = isLike
// //                 ? event.target.innerText === "Like"
// //                     ? "You like this post"
// //                     : "Like"
// //                 : event.target.innerText === "Dislike"
// //                     ? "You don't like this post"
// //                     : "Dislike";
// //             if (isLike) {
// //                 event.target.nextElementSibling.innerText = "Dislike";
// //             } else {
// //                 event.target.previousElementSibling.innerText = "Like";
// //             }
// //             console.log(res);
// //             likesCount.innerText = res.currentNumberOfLikes;
// //         })
// //     .catch(function(err) {
// //             console.error(
// //                 `coś się zjebało, spróbuj ponownie później, masz stack trace, chociaż i tak chuja zrozumiesz\n${
// //                     err.responseText
// //                     }`
// //             );
// //         });
// //     });
// // });
