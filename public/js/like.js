$('.like').on('click', function (event) {
    propertyId = event.target.parentNode.parentNode.dataset['propertyid'];
    var isLike = event.target.previousElementSibling == null;

    $.ajax({
        method: 'GET',
        url: urlLike,
        data: {
            isLike: isLike,
            propertyId: propertyId,
            _token: token
        }
    })
        .done(function () {
            event.target.innerText = isLike ? event.target.innerText == 'Like' ? 'You like this post' : 'Like' : event.target.innerText == 'Dislike' ? 'You Dont like this post' : 'Dislike';
            if (isLike) {
                event.target.nextElementSibling.innerText = 'Dislike';
            } else {
                event.target.nextElementSibling.innerText = 'Like';
            }
    })
});