<?php
include('header.php'); // Include header.php
?>

<main>
    <!-- Start Banner Section -->
    <section class="banner">
        <div class="container">
            <div class="banner-container">
                <div class="banner-content">
                    <h1>Renewable Energy India E-Banners</h1>
                    <strong>Drive more people to your booth by creating customized banners for FREE</strong>
                    <div class="steps">
                        <h3>Do it in 2 easy steps:</h3>
                        <ol>
                            <li>Enter your company's booth number and upload logo</li>
                            <li>Download the image</li>
                        </ol>
                    </div>
                    <p class="notice">
                        <strong>Important Notice:</strong> These downloadable e-banners are intended solely for exhibitors of Renewable Energy India. Unauthorized use or distribution of these materials is strictly prohibited. Misuse will be subject to legal action.
                    </p>
                </div>
                <form id="uploadForm" class="banner-form" action="upload.php" method="POST" enctype="multipart/form-data">
                    <div class="input-container">
                        <label for="booth-number">Enter your booth no <img src="images/red-star.svg" alt="red-star"></label>
                        <!-- <input type="number" id="booth-number" name="booth-number" maxlength="10" required> -->
                        <input type="number" id="booth-number" name="booth-number" required oninput="if(this.value.length > 10) this.value = this.value.slice(0, 10)">

                    </div>
                    <div class="input-container">
                        <label for="logo-upload">Select your logo <img src="images/red-star.svg" alt="red-star"></label>
                        <input type="file" id="logo-upload" name="logo-upload" accept="image/*" required>
                    </div>
                    <button class="btn-green" type="submit">Generate E-Banner</button>
                </form>
            </div>
        </div>
    </section>
    <!-- End Banner Section -->

    
</main>

<?php
include('footer.php'); // Include footer.php
?>



