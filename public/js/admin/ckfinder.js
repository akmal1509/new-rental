function selectFinder() {
    CKFinder.modal({
        chooseFiles: true,
        width: 800,
        height: 600,
        // lang: 'fr',
        onInit: function (finder) {
            finder.on('files:choose', function (evt) {
                var file = evt.data.files.first()
                var output = $('#featured-image-input')
                var imgPreview = $('.featured-image-preview')
                output.val(file.getUrl())

                imgPreview.removeClass('d-none')

                imgPreview.attr('src', betaP + file.getUrl())

                // img.setAttribute(
                //   'style',
                //   "background:url('" +
                //     betaP +
                //     file.getUrl() +
                //     "');background-position:center;background-size:cover;backgroun-repeat:no-repeat",
                // )

                console.log(file.attributes.name)
                console.log(file.getUrl())
                console.log(betaP)
            })

            finder.on('file:choose:resizedImage', function (evt) {
                var output = $('#featured-image-input')
                output.value = evt.data.resizedUrl
            })
        },
    })
}

function selectFinder2(input, preview) {
    CKFinder.modal({
        chooseFiles: true,
        width: 800,
        height: 600,
        onInit: function (finder) {
            finder.on('files:choose', function (evt) {
                var file = evt.data.files.first()
                var output = $('#' + input)
                var imgPreview = $('#' + preview)
                output.val(file.getUrl())

                imgPreview.removeClass('d-none')

                imgPreview.attr('src', betaP + file.getUrl())

                console.log(file.attributes.name)
                console.log(file.getUrl())
            })

            finder.on('file:choose:resizedImage', function (evt) {
                var output = $('#' + input)
                output.value = evt.data.resizedUrl
            })
        },
    })
}
