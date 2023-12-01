function previewImages(event) {
    var imagePreview = document.getElementById("imagePreview");
    var fileInput = event.target;

    // Bersihkan pratinjau sebelum menambah yang baru
    imagePreview.innerHTML = "";

    if (fileInput.files.length > 0) {
        for (var i = 0; i < fileInput.files.length; i++) {
            var reader = new FileReader();
            var imageElement = document.createElement("img");
            imageElement.style.maxWidth = "100%";
            imageElement.style.maxHeight = "100%";

            reader.onload = function (event) {
                imageElement.src = event.target.result;
            };

            reader.readAsDataURL(fileInput.files[i]);
            imagePreview.appendChild(imageElement);
        }
    } else {
        // Jika tidak ada file yang dipilih, tampilkan placeholder
        imagePreview.innerHTML =
            '<svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" /></svg>';
    }
}
