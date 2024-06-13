$(document).ready(function() {
  $('#file-upload').on('click', function() {
      $('#file-input').click();
  });

  $('#file-input').on('change', function(event) {
      const files = event.target.files;
      handleFiles(files);
  });

  // Handle files dropped onto the file-upload div
  $('#file-upload').on('dragover', function(event) {
      event.preventDefault();
      $(this).addClass('dragover');
  });

  $('#file-upload').on('dragleave', function(event) {
      event.preventDefault();
      $(this).removeClass('dragover');
  });

  $('#file-upload').on('drop', function(event) {
      event.preventDefault();
      $(this).removeClass('dragover');
      const files = event.originalEvent.dataTransfer.files;
      handleFiles(files);
  });

  $('#preview-container').on('click', '.remove-file', function() {
      $(this).closest('.file-preview-item').remove();
  });
});

function handleFiles(files) {
  $('#preview-container').show();
  $('#file-preview').empty();

  for (let i = 0; i < files.length; i++) {
      const file = files[i];
      const fileName = file.name;
      const fileSize = (file.size / 1024).toFixed(2) + ' KB';

      const filePreviewItem = $('<div>', {
          class: 'file-preview-item'
      });

      const fileInfoContainer = $('<div>', {
          class: 'd-flex align-items-center mb-2'
      });

      const fileInfo = $('<p>').html(`<strong>${fileName}</strong><br>Size: ${fileSize}`);
      const icon = getFileIcon(file.type);

      fileInfoContainer.append(icon, fileInfo);
      filePreviewItem.append(fileInfoContainer);

      const removeButton = $('<button>', {
          class: 'btn btn-outline-danger btn-sm remove-file',
          text: 'Remove'
      });

      filePreviewItem.append(removeButton);
      $('#file-preview').append(filePreviewItem);
  }
}

function getFileIcon(fileType) {
  const iconClass = getFileIconClass(fileType);
  return $('<i>', {
      class: 'fas ' + iconClass + ' fs-2 me-2'
  });
}

function getFileIconClass(fileType) {
  const fileTypeIcons = {
      'image/jpeg': 'ri-image-fill',
      'image/png': 'ri-image-fill',
      'application/pdf': ' ri-file-pdf-line',
      'application/msword': ' ri-file-word-2-line',
      'application/vnd.openxmlformats-officedocument.wordprocessingml.document': 'ri-file-word-2-line',
      'application/vnd.ms-excel': 'ri-file-excel-2-line',
      'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet': 'ri-file-excel-2-line',
      'application/vnd.ms-powerpoint': 'ri-file-ppt-2-line',
      'application/vnd.openxmlformats-officedocument.presentationml.presentation': 'ri-file-ppt-2-line',
      'application/zip': 'ri-inbox-archive-line',
      'application/x-rar-compressed': 'ri-inbox-archive-line',
      'application/x-tar': 'ri-inbox-archive-line',
      'application/vnd.android.package-archive': 'ri-inbox-archive-line',
      'text/plain': 'ri-table-alt-line',
      'application/json': 'ri-file-code-line',
      'text/html': 'ri-file-code-line',
      'application/javascript': 'ri-file-code-line',
      'text/css': 'ri-file-code-line',
      'text/csv': 'ri-file-3-line',
      'application/xml': 'ri-file-code-line',
      'application/vnd.oasis.opendocument.text': 'ri-file-word-2-line',
      'application/vnd.oasis.opendocument.spreadsheet': 'ri-file-excel-2-line',
      'application/vnd.oasis.opendocument.presentation': 'ri-file-ppt-2-line'
      
  };
  return fileTypeIcons[fileType] || 'ri-file-3-line';
}
