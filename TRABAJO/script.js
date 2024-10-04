const fileUpload = document.getElementById('file-upload');
        const uploadBox = document.querySelector('.upload-box');

        uploadBox.addEventListener('click', () => fileUpload.click());

        uploadBox.addEventListener('dragover', (e) => {
            e.preventDefault();
            uploadBox.style.borderColor = "#f44336";
        });

        uploadBox.addEventListener('dragleave', () => {
            uploadBox.style.borderColor = "#ccc";
        });

        uploadBox.addEventListener('drop', (e) => {
            e.preventDefault();
            const files = e.dataTransfer.files;
            console.log("Archivos subidos:", files);
        });

        fileUpload.addEventListener('change', (e) => {
            const files = e.target.files;
            console.log("Archivos seleccionados:", files);
        });