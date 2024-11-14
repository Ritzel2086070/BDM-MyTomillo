let chosen_rating = 0;

document.addEventListener('DOMContentLoaded', function() {
    const stars = document.querySelectorAll('.star');

    const filledStar = 'images/estrella.png';
    const emptyStar = 'images/estrellaMala.png';

    function setRating(rating) {
        stars.forEach(star => {
            const starValue = parseInt(star.getAttribute('data-star'));
            star.style.width = '20px';
            star.style.height = '20px';

            if (starValue <= rating) {
                star.src = filledStar;
            } else {
                star.src = emptyStar;
            }
        });
    }

    stars.forEach(star => {
        star.addEventListener('click', function() {
            const rating = parseInt(star.getAttribute('data-star'));
            setRating(rating);
            chosen_rating = rating;
        });
    });

    
});

function sendComment(ID_curso){
    const comment = document.getElementById('inputComment').value;

    const form = document.createElement('form');
    form.method = 'POST';
    form.action = '/comment';

    const inputComment = document.createElement('input');
    inputComment.type = 'hidden';
    inputComment.name = 'comment';
    inputComment.value = comment;
    form.appendChild(inputComment);

    const inputRating = document.createElement('input');
    inputRating.type = 'hidden';
    inputRating.name = 'rating';
    inputRating.value = chosen_rating;
    form.appendChild(inputRating);

    const inputID = document.createElement('input');
    inputID.type = 'hidden';
    inputID.name = 'ID_curso';
    inputID.value = ID_curso;
    form.appendChild(inputID);

    document.body.appendChild(form);
    form.submit();
}