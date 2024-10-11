function generateBanner() {
    const boothNumber = document.getElementById('booth-number').value;
    const logoUpload = document.getElementById('logo-upload').files[0];

    if (!boothNumber || !logoUpload) {
        alert('Please enter your booth number and select a logo.');
        return;
    }

    const formData = new FormData();
    formData.append('booth-number', boothNumber);
    formData.append('logo-upload', logoUpload);

    fetch('upload.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            const bannerContainer = document.createElement('div');
            const bannerImage = document.createElement('img');
            bannerImage.src = data.bannerUrl;
            bannerContainer.appendChild(bannerImage);

            // Display the banner on the page
            document.querySelector('.banner-container').appendChild(bannerContainer);
            alert('Banner generated successfully!');
        } else {
            alert('Error: ' + data.message);
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('An error occurred while generating the banner. Please try again.');
    });
}

document.querySelector('.btn-green').addEventListener('click', function () {
    const bannerWrapper = document.querySelector('.banner-wrapper');
    html2canvas(bannerWrapper).then(canvas => {
        const link = document.createElement('a');
        link.href = canvas.toDataURL('image/png');
        link.download = 'banner_with_booth.png';
        link.click();
    });
});