function addInput() {
    var dropdowns = document.querySelectorAll("#container_owner input");
    if (dropdowns.length < 3) {
        document.getElementById("warning_owners").style.display = "none";
        var originalDropdown = document.getElementById("name");
        var clonedDropdown = originalDropdown.cloneNode(true);
        document.querySelector("#container_owner").appendChild(clonedDropdown);
    } else {
        document.getElementById("warning_owners").style.display = "flex";
    }
}

function removeInput() {
    var dropdowns = document.querySelectorAll("#container_owner input");
    if (dropdowns.length > 1) {
        document.getElementById("warning_owners").style.display = "none";
        var lastDropdown = dropdowns[dropdowns.length - 1];
        lastDropdown.parentNode.removeChild(lastDropdown);
    }
}

function addDropdown() {
    var dropdowns = document.querySelectorAll("#container_tags select");
    if (dropdowns.length < 3) {
        document.getElementById("warning_tags").style.display = "none";
        var originalDropdown = document.getElementById("tag");
        var clonedDropdown = originalDropdown.cloneNode(true);
        document.querySelector("#container_tags").appendChild(clonedDropdown);
    } else {
        document.getElementById("warning_tags").style.display = "flex";
    }
}

function removeDropdown() {
    var dropdowns = document.querySelectorAll("#container_tags select");
    if (dropdowns.length > 1) {
        document.getElementById("warning_tags").style.display = "none";
        var lastDropdown = dropdowns[dropdowns.length - 1];
        lastDropdown.parentNode.removeChild(lastDropdown);
    }
}

function addImage() {
    var dropdowns = document.querySelectorAll("#container_image label");
    if (dropdowns.length < 3) {
        document.getElementById("warning_images").style.display = "none";
        var originalDropdown = document.getElementById("image_url");
        var clonedDropdown = originalDropdown.cloneNode(true);
        document.querySelector("#container_image").appendChild(clonedDropdown);
    } else {
        document.getElementById("warning_images").style.display = "flex";
    }
}

function removeImage() {
    var dropdowns = document.querySelectorAll("#container_image label");
    if (dropdowns.length > 1) {
        document.getElementById("warning_images").style.display = "none";
        var lastDropdown = dropdowns[dropdowns.length - 1];
        lastDropdown.parentNode.removeChild(lastDropdown);
    }
}
