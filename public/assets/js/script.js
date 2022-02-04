(function(){

    let posts = document.querySelectorAll('.posts_item')
    
    posts.forEach(post => {
        post.addEventListener('click', (event) => { toggleModal(event, post) })
    })

    function toggleModal(event, post)
    {
        post.classList.add('modal')

        if (event.target.classList.contains('posts_item'))
        {
            post.classList.remove('modal')
        }

    }

    let show_menu_button = document.querySelector('#show_menu')
    let menu = document.querySelector('.main_header_nav')

    show_menu_button.addEventListener('click', () => {

        menu.style.display = 'flex'

    })

    let hide_menu_button = document.querySelector('#hide_menu')

    hide_menu_button.addEventListener('click', () => {

        menu.style.display = 'none'

    })

})()
