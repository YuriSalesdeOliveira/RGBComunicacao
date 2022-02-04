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

})()
