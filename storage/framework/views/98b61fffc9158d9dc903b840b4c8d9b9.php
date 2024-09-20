    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>School/College Management System</title>
        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <style>
            body {
                background-image: url('https://cdn.wallpapersafari.com/26/10/lV9LYT.jpg');
                background-size: cover;
                background-position: center;
                background-repeat: no-repeat;
                color: #fff;
                height: 100vh;
                display: flex;
                flex-direction: column;
                justify-content: center;
                margin: 0;
            }
            .container {
                text-align:left;
                margin-left: 60px;
            }
            .header-nav {
                position: absolute;
                top: 20px;
                right: 40px;
            }
            .header-nav a {
                margin: 0 10px;
            }
            .h1{
            color: #e2ce19;
            font-size: 450%;
            margin-right: 200px;
            }
            .btntext{
                font-size: 20px;
            }
            /* Media Queries for responsiveness */
        @media (max-width: 768px) {
            .container {
                margin-left: 20px;
                margin-right: 20px;
            }

            .h1 {
                font-size: 6vw; /* Adjust font size for smaller screens */
                text-align: center;
                margin: 0;
            }

            .header-nav {
                top: 10px;
                right: 20px;
            }

            .header-nav a {
                font-size: 14px;
                padding: 8px 16px;
            }
        }

        @media (max-width: 576px) {
            .header-nav {
                top: 10px;
                right: 10px;
            }

            .h1 {
                font-size: 8vw; /* Further adjust for mobile devices */
                text-align: center;
            }

            .header-nav a {
                margin: 0 5px;
                font-size: 12px;
                padding: 6px 12px;
            }
        }
        </style>
    </head>
    <body>
        <div class="container">
            <h1 class="h1">Welcome to School/College Management System</h1>
            <div class="header-nav">
                <a href="" class="btn btn-warning px-4 py-2 btntext">Student Registration</a>
                <a href="" class="btn btn-success px-4 py-2 btntext">Teacher Registration</a>
            </div>
        </div>

        <!-- Bootstrap JS -->
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    </body>
    </html>
<?php /**PATH C:\Users\BAPS\Documents\Chirag Panchal Learning\School-Collage-Management-app\resources\views\welcome.blade.php ENDPATH**/ ?>