let photo_review_modal = document.getElementById("photo-review-modal");

document.addEventListener('click', (e) => {
    if (e.target.classList.contains('enlarge-photo')) {
        let url = e.target.src;
        let img = document.createElement('img');
        img.setAttribute('src', url);
        img.classList.add('modal-image');
        photo_review_modal.appendChild(img);
        photo_review_modal.style.display = 'flex';
        photo_review_modal.classList.add('modal-enabled');

    } else if 
        (e.target.classList.contains('enlarge-photo-new')) {
        let hidden_input_value = e.target.firstElementChild.value;
        console.log(hidden_input_value);
        let img = document.createElement('img');
        img.setAttribute('src', hidden_input_value);
        img.classList.add('modal-image');
        photo_review_modal.appendChild(img);
        photo_review_modal.style.display = 'flex';
        photo_review_modal.classList.add('modal-enabled');
    }

})

document.addEventListener('click', (e) => {
    if (e.target.classList.contains('modal-enabled') || e.target.classList.contains('modal-image')) {
        photo_review_modal.style.display = 'none';
        photo_review_modal.innerHTML = '';
    }
})