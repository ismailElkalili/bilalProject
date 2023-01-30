function getUploadName() {
    var fullPath = document.getElementById('customFile').value;
    if (fullPath) {
        var startIndex = (fullPath.indexOf('\\') >= 0 ? fullPath.lastIndexOf('\\') : fullPath.lastIndexOf('/'));
        var filename = fullPath.substring(startIndex);
        if (filename.indexOf('\\') === 0 || filename.indexOf('/') === 0) {
            filename = filename.substring(1);
        }
        // alert(filename);
        document.getElementById('file_name').innerHTML = filename;
        document.getElementById('upload_file_btn').disabled = false;
    }
}