//BODY CLASSIC EDITOR
ClassicEditor.create(document.querySelector('#editor'), {
  // height: 400,
  ckfinder: {
    uploadUrl:
      betaU +
      '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files&responseType=json',
  },

  toolbar: {
    items: [
      'ckfinder',
      'heading',
      '|',
      'bold',
      'italic',
      'link',
      'bulletedList',
      'numberedList',
      '|',
      'outdent',
      'indent',
      '|',
      'uploadImage',
      'blockQuote',
      'insertTable',
      'mediaEmbed',
      'undo',
      'redo',
    ],
  },
  image: {
    toolbar: [
      'imageStyle:inline',
      'imageStyle:block',
      'imageStyle:side',
      '|',
      'toggleImageCaption',
      'imageTextAlternative',
    ],
  },
  table: {
    contentToolbar: ['tableColumn', 'tableRow', 'mergeTableCells'],
  },
  // This value must be kept in sync with the language defined in webpack.config.js.
  language: 'en',
}).then((editor) => {
  window.editor = editor
}).catch((error) => {
  console.error('There was a problem initializing the editor.', error)
})

