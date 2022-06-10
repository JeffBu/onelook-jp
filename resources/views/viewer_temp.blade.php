<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Video Viewing</title>
    <link href="/dist/output.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit&display=swap" rel="stylesheet">

</head>

<body class="justify-center items-center bg-theme-white text-theme-black font-['Calibri']">

    <!--header-->
    <header class="flex shadow bg-sky-700 justify-between items-center py-5 px-5 h-14 text-base tracking-widest fixed w-full z-50"
    id="header_frame">

        <div class="justify-center items-center">
            <div class="font-semibold text-theme-white text-xl">OneLook</div>
        </div>
        
    </header>
    <!--header ends here-->

    <!--content-->
    <div class="flex justify-center items-start text-lg pt-4 w-full">
        <div class="flex flex-col justify-center items-center gap-8 w-64 pt-14 px-2 text-left"></div>

        <div class="flex-1 justify-center text-center items-center text-lg pt-14">
            <div class="text-center text-4xl font-bold text-cyan-600 pb-4">Notification of Mr. Yamada</div>

            <div>
                <img src="/img/video-playback.png" alt="" class="rounded-lg border border-cyan-800 mb-1">
            </div>

            <div class="flex justify-between text-cyan-700 text-base px-1">
                <div>Contributed By: user1234</div>
                <div>Posted: 04/01/2021 | 10:00am ~ Until: 04/04/2021 | 10:00am</div>
            </div>

            <!--
            <div class="rounded-md border border-cyan-800 w-full">
                <table class="text-center w-full">
                    <thead>
                        <tr class="divide-x divide-cyan-800 text-cyan-600">
                            <th>Video Name</th>
                            <th>Contributor</th>
                            <th>Posted Date</th>
                            <th>Deadline for viewing</th>
                            <th>Sponsoring</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-cyan-800 border-t border-cyan-800 text-cyan-800">
                        <tr class="divide-x divide-y divide-cyan-800">
                            <td>Notification of Mr. Yamada</td>
                            <td>Username</td>
                            <td>April 1, 2021 | 10:00</td>
                            <td>April 4, 2021 | 10:00</td>
                            <td>-</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            -->

            <div class="h-32"></div>
        </div>

        <div class="flex flex-col justify-center items-center gap-8 w-64 pt-14 px-2 text-left"></div>
    </div>
    <!--content ends here-->

    <!--footer-->
    <!--footer ends here
    <footer class="flex shadow bg-cyan-700 text-theme-white justify-center items-start py-5 px-5 text-base gap-32 tracking-widest w-full">
        <div class="flex flex-col gap-2">
            <div class="text-theme-yellow font-medium">Service Features</div>
            <div class="text-sm">Video Creation</div>
        </div>
        <div class="flex flex-col gap-2">
            <div class="text-theme-yellow font-medium">Plan</div>
            <div class="text-sm">Free Plan</div>
            <div class="text-sm">Personal Plan</div>
        </div>
        <div class="flex flex-col gap-2">
            <div class="text-theme-yellow font-medium">Support</div>
            <div class="text-sm">Get Help</div>
        </div>
        <div class="flex flex-col gap-2">
            <div class="text-theme-yellow font-medium">Company</div>
            <div class="text-sm">About Us</div>
            <div class="text-sm">Special Commercial Code</div>
            <div class="text-sm">Privacy Policy</div>
        </div>
    </footer>
    -->

    <!--scripts-->
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        tailwind.config = {
          theme: {
            extend: {
                colors: {
                    transparent: 'transparent',
                    current: 'currentColor',
                    'theme-white': '#f6f6e9',
                    'theme-black': '#2a221b',
                    'theme-yellow': '#ffc300',
                    'theme-cream': '#ffffcc',
                    'theme-blue': '#61a6ab',
                    'theme-pink': '#f7b9a1',
                    'theme-orange': '#ed5b2d',
                }
            }
          }
        }
      </script>
    <!--scripts ends here-->

</body>
</html>