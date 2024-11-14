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