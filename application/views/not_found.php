<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap">

    <title>404 - Page Not Found</title>
    <style>
        /* Reset some default styles */
        body,
        html {
            margin: 0;
            padding: 0;
            height: 100%;
            font-family: 'Roboto', sans-serif;
            overflow: hidden;
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background: #f8f9fa;
            position: relative;
        }

        .error-content {
            text-align: center;
            position: relative;
            z-index: 10;
        }

        .error-code {
            font-size: 70px;
            font-weight: bold;
            color: #056b61;
            margin: 0;
            animation: bounce 2s infinite;
        }

        .error-message {
            font-size: 24px;
            color: #333;
            margin: 0;
            animation: fadeIn 2s ease-in-out;
        }

        .error-description {
            font-size: 18px;
            color: #666;
            margin: 20px 0;
            animation: fadeIn 3s ease-in-out;
        }

        .home-link {
            text-decoration: none;
            color: #056b61;
            font-size: 18px;
            border: 2px solid #056b61;
            padding: 10px 20px;
            border-radius: 5px;
            transition: background-color 0.3s, color 0.3s;
        }

        .home-link:hover {
            background-color: #056b61;
            color: #fff;
        }

        /* Bounce animation for error code */
        @keyframes bounce {

            0%,
            20%,
            50%,
            80%,
            100% {
                transform: translateY(0);
            }

            40% {
                transform: translateY(-30px);
            }

            60% {
                transform: translateY(-15px);
            }
        }

        /* Fade in animation for text elements */
        @keyframes fadeIn {
            0% {
                opacity: 0;
            }

            100% {
                opacity: 1;
            }
        }

        /* Floating animation for the entire content */
        @keyframes float {

            0%,
            100% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-20px);
            }
        }

        .error-content {
            animation: float 3s ease-in-out infinite;
        }

        /* Ribbon/tape effect */
        .ribbon {
            position: absolute;
            top: 0;
            left: 0;
            width: 50px;
            height: 50px;
            background: #056b61;
            border-radius: 50%;
            pointer-events: none;
            transition: transform 0.2s ease-out, opacity 0.5s ease-out;
            z-index: 5;
            opacity: 0;
            /* Start hidden */
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="error-content">
            <div class="error-code">Belum Berfungsi ini Halaman Boskuuuu...</div>
            <div class="error-message">Oops! Page Not Found</div>
            <div class="error-description">It looks like the page you’re looking for doesn’t exist.</div>
            <a href="<?= base_url('dashboard') ?>" class="home-link">Go to Dashboard</a>
        </div>
        <div id="ribbon" class="ribbon"></div>
    </div>

    <script>
        let ribbon = document.getElementById('ribbon');
        let timeout;
        const delay = 2000; // 2 seconds

        function updateRibbonPosition(e) {
            let x = e.clientX;
            let y = e.clientY;
            ribbon.style.transform = `translate(${x - 25}px, ${y - 25}px)`; // Center the ribbon around the cursor
        }

        document.addEventListener('mousemove', function(e) {
            clearTimeout(timeout);
            ribbon.style.opacity = 1; // Show ribbon when mouse is moving
            updateRibbonPosition(e);

            // Hide the ribbon after 2 seconds of no movement
            timeout = setTimeout(() => {
                ribbon.style.opacity = 0;
            }, delay);
        });

        // Hide ribbon if mouse leaves the viewport
        document.addEventListener('mouseleave', function() {
            ribbon.style.opacity = 0;
        });
    </script>
</body>

</html>