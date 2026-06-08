function previewImage(event) {
    const file = event.target.files[0];
    const preview = document.getElementById('preview-img');
    if (!file) {
        preview.style.display = 'none';
        return;
    }
    preview.src = URL.createObjectURL(file);
    preview.style.display = 'block';
}