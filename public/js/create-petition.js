DecoupledDocumentEditor
  .create(document.querySelector('.editor'), {
    toolbar: {
      items: [
        'heading', '|',
        'fontSize', 'fontFamily', '|',
        'bold', 'italic', 'underline', 'strikethrough', 'highlight', '|',
        'alignment', '|',
        'numberedList', 'bulletedList', '|',
        'indent', 'outdent', '|',
        'todoList', 'link', 'blockQuote', 'imageUpload', 'insertTable', 'mediaEmbed', '|',
        'undo', 'redo'
      ]
    },
    language: 'pl',
    image: {
      toolbar: ['imageTextAlternative', 'imageStyle:full', 'imageStyle:side']
    },
    table: {
      contentToolbar: ['tableColumn', 'tableRow', 'mergeTableCells']
    },
    licenseKey: '',

  })
  .then(editor => {
    editor.model.document.on('change:data', () => {
      console.log('The data has changed!', editor.getData());
      element('textarea#description').valid = editor.getData();
    });
    window.editor = editor;
    // Set a custom container for the toolbar.
    document.querySelector('.document-editor__toolbar').appendChild(editor.ui.view.toolbar.element);
    document.querySelector('.ck-toolbar').classList.add('ck-reset_all');
  })
  .catch(error => {
    console.error('Oops, something went wrong!');
    console.error('Please, report the following error on https://github.com/ckeditor/ckeditor5/issues with the build id and the error stack trace:');
    console.warn('Build id: tkh5pjbsptev-ucn1dsls94e0');
    console.error(error);
  });
