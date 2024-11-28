function showLastLesson(ID_curso) {
    fetch('/clasesVistas', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({ ID_curso: ID_curso })
    }).then(response => response.json())
        .then(data => {
            if (data.length == 0) {
                return;
            }
            data.forEach(clase => {
                let id = clase.ID_clase + '_' + clase.ID_nivel;
                let checkbox = document.getElementById(id);
                checkbox.checked = true;
            });
        })
        .catch((error) => {
            console.error('Error:', error);
        });
}

function showLesson(ID_clase, ID_nivel, ID_curso){
    fetch('/clase', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({ ID_clase: ID_clase, ID_nivel: ID_nivel, ID_curso: ID_curso })
    }).then(response => response.json())
        .then(data => {
            const titulo = document.getElementById('titulo');
            titulo.innerHTML = data.titulo;
            const descripcion = document.getElementById('descripcion');
            descripcion.innerHTML = data.descripcion;

            const contenedorRecursosLinks = document.getElementById('recursos_links');
            contenedorRecursosLinks.innerHTML = '<p>Para complementar tu aprendizaje, el maestro ha decidido compartir contenido de alta calidad</p>';

            data.links.forEach(link => {
                let div = document.createElement('div');
                div.className = 'download-item';
                let input = document.createElement('input');
                input.type = 'text';
                input.value = link.link;
                input.readOnly = true;
                div.appendChild(input);
                let button = document.createElement('button');
                button.className = 'btn main-btn';
                button.innerHTML = 'Ir al link';
                button.onclick = function() {
                    window.open(link.link, '_blank');
                };
                div.appendChild(button);
                contenedorRecursosLinks.appendChild(div);
            });

            data.recursos.forEach(recurso => {
                fetch('/recurso', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify({ ID_recurso: recurso.ID_recurso })
                })
                    .then(response => {
                        // Retrieve the Content-Type header
                        const contentType = response.headers.get('Content-Type');
                        // Map MIME type to file extension
                        const mimeToExtension = {
                            'image/jpeg': 'jpg',
                            'image/png': 'png',
                            'application/pdf': 'pdf',
                            'image/gif': 'gif',
                            'text/plain': 'txt',
                            'application/msword': 'doc',
                            'application/vnd.openxmlformats-officedocument.wordprocessingml.document': 'docx',
                            'application/vnd.ms-excel': 'xls',
                            'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet': 'xlsx',
                            'application/zip': 'zip',
                            'application/x-rar-compressed': 'rar',
                            'video/mp4' : 'mp4',
                            'audio/mpeg' : 'mp3',
                            'application/vnd.ms-powerpoint' : 'ppt',
                            'application/vnd.openxmlformats-officedocument.presentationml.presentation' : 'pptx',
                            'application/octet-stream': 'mp4',
                        };
                        const extension = mimeToExtension[contentType] || 'bin'; // Default to 'bin' for unknown types
            
                        return response.blob().then(blob => ({ blob, extension }));
                    })
                    .then(({ blob, extension }) => {
                        let div = document.createElement('div');
                        div.className = 'download-item';
            
                        let input = document.createElement('input');
                        input.type = 'text';
                        input.value = "Archivo";
                        input.readOnly = true;
                        div.appendChild(input);
            
                        let button = document.createElement('button');
                        button.className = 'btn main-btn';
                        button.innerHTML = 'Descargar';
                        button.onclick = function () {
                            const url = window.URL.createObjectURL(blob);
                            const link = document.createElement('a');
                            link.href = url;
                            link.download = `downloaded_file.${extension}`; // Set the file extension dynamically
                            document.body.appendChild(link);
                            link.click();
                            link.parentNode.removeChild(link);
                            window.URL.revokeObjectURL(url);
                        };
                        div.appendChild(button);
            
                        contenedorRecursosLinks.appendChild(div);
                    })
                    .catch(error => {
                        console.error("Error fetching the resource:", error);
                    });
            });
            

            /*
                                <div class="download-item">
                                    <input type="text" id="videoLink" value="https://www.youtube.com/watch?v=2U6H3CWpaWQ" readonly>
                                    <button class="btn main-btn" onclick="goToLink()">Ir al link</button>
                                </div>

                                <div class="download-item">
                                    <input type="text" value="Doc.pdf" readonly>
                                    <button class="btn main-btn" onclick="downloadFile('Doc.pdf')">Descargar</button>
                                </div>
                                <div class="download-item">
                                    <input type="text" value="Doc2.pdf" readonly>
                                    <button class="btn main-btn" onclick="downloadFile('Doc2.pdf')">Descargar</button>
                                </div>
                                <button style="width: 20%;" class="btn main-btn" onclick="downloadAll()">Descargar todo</button> */

            let id = ID_clase + '_' + ID_nivel;
            let checkbox = document.getElementById(id);
            checkbox.checked = true;
        })
        .catch((error) => {
            console.error('Error:', error);
        });

        
        fetch('/video', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({ ID_clase: ID_clase, ID_nivel: ID_nivel, ID_curso: ID_curso })
        })
        .then(response => response.blob())  // Get the video data as a Blob
        .then(videoBlob => {
            const videoElement = document.getElementById('video');
            
            // Check if videoElement is correctly selected
            if (videoElement instanceof HTMLVideoElement) {
                // Create a URL for the Blob
                const videoUrl = URL.createObjectURL(videoBlob);
                
                // Set the video URL as the source
                videoElement.src = videoUrl;
                
                // Optional: Play the video immediately
                videoElement.play()
                    .then(() => {
                        console.log('Video is playing!');
                    })
                    .catch((error) => {
                        console.error('Error playing the video:', error);
                    });
            } else {
                console.error('The element with id "video" is not a valid HTMLVideoElement');
            }
        })
        .catch((error) => {
            console.error('Error fetching video:', error);
        });
        
        
        
}

//checked disabled
/*
<div class="header p-0 bd-highlight">
    <p class="p-2 bd-highlight">Nivel 1. HTML</p>
</div>
<div class="lesson">
    <label class="d-flex p-2 bulgy-checkboxes justify-content-start align-items-center">
        <input type="checkbox" name="options" checked disabled/>
        <span class="checkbox"></span>
        Clase 1: Fundamentos y clases
    </label>
    <label class="d-flex p-2 bulgy-checkboxes justify-content-start align-items-center">
        <input type="checkbox" name="options"/>
        <span class="checkbox"></span>
        Clase 2: Aplicación de las etiquetas de HTML
    </label>
</div>
<div class="header p-0 bd-highlight">
    <p class="p-2 bd-highlight">Nivel 2. CSS, formato y diseño</p>
</div>
<div class="lesson">
    <label class="d-flex p-2 bulgy-checkboxes justify-content-start align-items-center">
        <input type="checkbox" name="options"/>
        <span class="checkbox"></span>
        Clase 1: Creación de un formato para nuestra página web
    </label>
    <label class="d-flex p-2 bulgy-checkboxes justify-content-start align-items-center">
        <input type="checkbox" name="options"/>
        <span class="checkbox"></span>
        Clase 2: Bootstrap y el flexbox
    </label>
</div>
<div class="header p-0 bd-highlight">
    <p class="p-2 bd-highlight">Nivel 3. JavaScript</p>
</div>
<div class="lesson">
    <label class="d-flex p-2 bulgy-checkboxes justify-content-start align-items-center">
        <input type="checkbox" name="options"/>
        <span class="checkbox"></span>
        Clase 1: Uso y manejo de JavaScript
    </label>
</div>
<div class="header p-0 bd-highlight">
    <p class="p-2 bd-highlight">Nivel 4. Proyecto final y manejo de hosting</p>
</div>
<div class="lesson">
    <label class="d-flex p-2 bulgy-checkboxes justify-content-start align-items-center">
        <input type="checkbox" name="options"/>
        <span class="checkbox"></span>
        Clase 1: Hosteo de una página web
    </label>
</div>

*/