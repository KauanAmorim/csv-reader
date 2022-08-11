document.getElementById("upload").addEventListener("click", function(event) {
    event.preventDefault();

    const loader = document.querySelector(".c-loader");
    loader.style.display = "block"

    const filesToUpload = document.getElementsByName('upload[]')[0];
    for (let i = 0; i < filesToUpload.files.length; i++) {
        const file = filesToUpload.files[i];

        let formData = new FormData();
        formData.append('file', file);
        sendRequest(formData)
    }

    loader.style.display = 'none';
    alert('Upload concluido');
});

function sendRequest(formData) {
    const route = document.getElementById("uploadRoute").value
    fetch(route, {
        method: 'POST',
        body: formData
    }).then(response => {
        console.log(response)
        if (response.status !== 200) {
            throw new Error("HTTP response code != 200");
        }
    })
}