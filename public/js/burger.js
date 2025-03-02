function Nav() {
    document.querySelector('.mobile-rectangle-black').style.display='block'

}

document.querySelector('.mobile-rectangle-black').addEventListener('click', CloseNav)


function CloseNav(event) {
    if (event.target==this) {
        document.querySelector('.mobile-rectangle-black').style.display='none'
    }
}
