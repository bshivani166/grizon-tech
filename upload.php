<?php
include('header.php'); // Include header.php
?>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (isset($_FILES['logo-upload']) && $_FILES['logo-upload']['error'] === UPLOAD_ERR_OK) {
        $boothNumber = htmlspecialchars($_POST['booth-number']);
        $logo = $_FILES['logo-upload'];

        // Define upload directory and file name
        $uploadDir = 'uploads/';
        $uploadFile = $uploadDir . basename($logo['name']);

        // Move uploaded file
        if (move_uploaded_file($logo['tmp_name'], $uploadFile)) {
            // Display the generated banner
            echo "<!DOCTYPE html>
            <html lang='en'>
            <head>
                <meta charset='UTF-8'>
                <meta name='viewport' content='width=device-width, initial-scale=1.0'>
                <link rel='stylesheet' href='css/style.css'>
                <link rel='stylesheet' href='css/banner.css'>
                <title>E-Banner Download</title>
            </head>
            <body>
                <main>
                    <section class='renewable-banner'>
                        <div class='container'>
                            <div class='renewable-container'>
                                <h1>Banner Generated Successfully!</h1>
                                <strong>Place your customised event banners on your:</strong>
                                <p>Email signature | Social media platforms | Newsletters | Webpages</p>
                                <div class='banner-list'>
                                    <div class='banner-item'>
                                        <h2>Invite (1118 X 2444 Banner)</h2>
                                        <div class='banner-wrapper'>
                                            <div class='banner-bg'>
                                            <img src='images/REI-E-banners-1118-x-2444.jpg'>
                                            </div>
                                            <div class='banner-info'>
                                                <h3>$boothNumber</h3>
                                                <div class='banner-logo'>
                                                    <img src='$uploadFile' alt='Uploaded Logo'>
                                                </div>
                                            </div>
                                        </div>
                                        <a class='btn-green'>Download</a>
                                    </div>
                                    <div class='second-row'>
                                        <div class='banner-item'>
                                            <h2>Email (750 X 221 Banner)</h2>
                                            <div class='banner-wrapper'>
                                                <div class='banner-bg'>
                                                <img src='images/REI-E-banners750-X-221.jpg'>
                                                </div>
                                                <div class='banner-info'>
                                                    <h3>$boothNumber</h3>
                                                    <div class='banner-logo'>
                                                        <img src='$uploadFile' alt='Uploaded Logo'>
                                                    </div>
                                                </div>
                                            </div>
                                            <a class='btn-green'>Download</a>
                                        </div>
                                        <div class='banner-item'>
                                            <h2>Signature (1248 X 221 Banner)</h2>
                                            <div class='banner-wrapper'>
                                                <div class='banner-bg'>
                                                <img src='images/REI-E-banners-1248-X-221.jpg'>
                                                </div>
                                                <div class='banner-info'>
                                                    <h3>$boothNumber</h3>
                                                    <div class='banner-logo'>
                                                        <img src='$uploadFile' alt='Uploaded Logo'>
                                                    </div>
                                                </div>
                                            </div>
                                            <a class='btn-green'>Download</a>
                                        </div>
                                    </div>
                                </div>  
                            </div>
                        </div>
                    </section>   
                </main>
            </body>
            </html>";
        } else {
            echo "Failed to upload logo.";
        }
    } else {
        echo "No file uploaded or upload error.";
    }
} else {
    echo "Invalid request method.";
}
?>
<?php
include('footer.php'); // Include footer.php
?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
<script>
document.addEventListener('click', function (e) {
    if (e.target.classList.contains('btn-green')) {
        // Find the closest banner-wrapper relative to the clicked button
        const bannerWrapper = e.target.closest('.banner-item').querySelector('.banner-wrapper');
        
        // Generate and download the image
        html2canvas(bannerWrapper).then(canvas => {
            const link = document.createElement('a');
            link.href = canvas.toDataURL('image/png');
            link.download = 'banner_with_booth.png';
            link.click();
        });
    }
});
console.log('html2canvas loaded:', typeof html2canvas !== 'undefined');
</script>

