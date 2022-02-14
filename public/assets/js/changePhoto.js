(function(){

    const photo = document.querySelector('input[name="photo"]')

    photo.addEventListener('change', function() {
    
        const newPhoto = document.querySelector('input[name="photo"]').files[0]
        const photoPreview = document.querySelector('#form-photo-preview')

        const reader = new FileReader()

        reader.onloadend = function() {
            photoPreview.src = reader.result
        }

        if (newPhoto) { reader.readAsDataURL(newPhoto) }

    })

})()