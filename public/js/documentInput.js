function documentInput(event) {
    var filePreview = document.getElementById("paper-preview");
    filePreview.innerHTML = "";

    if (event.target.files.length > 0) {
        var reader = new FileReader();

        reader.onload = function (event) {
            // Tampilkan preview file berdasarkan tipe file
            var extension = event.target.result.split(";")[0].split("/")[1];
            if (extension === "pdf") {
                // Jika file PDF, tampilkan ikon PDF
                filePreview.innerHTML =
                    '<i class="far fa-file-pdf text-5xl text-red-500"></i><p class="mt-2">Preview PDF</p>';
            } else {
                // Jika tipe file lain, tampilkan ikon placeholder
                filePreview.innerHTML =
                    '<svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" /></svg>';
            }
        };

        reader.readAsDataURL(event.target.files[0]);
    } else {
        // Jika tidak ada file yang dipilih, tampilkan placeholder
        filePreview.innerHTML =
            '<svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" /></svg>';
    }
}
