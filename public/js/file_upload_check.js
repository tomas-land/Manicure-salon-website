let inputas2 = document.getElementById('fileinput');
let submit = document.getElementById('submit');
let check = document.getElementById('check');

inputas2.addEventListener('change', () => {
    check.style.display = 'inline-block';
})

submit.addEventListener('click', (e) => {
    let inputas = document.getElementById('fileinput').files;
    if (inputas.length == 0){
        e.preventDefault();
        alert('Pasirinkite nuotrauką');
    }
})