<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OneLook</title>
    <link href="{{asset('css/app.css')}}" rel="stylesheet">

    <style>
        .active {
            text-decoration: underline;
            text-decoration-color: #ff9011;
            text-underline-offset: 4px;
            text-decoration-thickness: 2px;
        }

    </style>
</head>

<body class="justify-center items-center bg-theme-white text-theme-black font-['Calibri']">

    <!--header-->
    <header class="flex shadow bg-sky-700 justify-between items-center py-5 px-5 h-14 tracking-widest fixed w-full z-50"
    id="header_frame">

        <div class="items-center w-32">
            <div class="font-semibold text-theme-white text-xl">OneLook</div>
        </div>
        
        <div class="flex justify-center items-center gap-7 py-6 font-semibold text-xl text-theme-white">
            <a href="#home" id="home-tab">Home</a>
            <a href="#video-maker" id="video-maker-tab">Video Maker</a>
            <a href="#post-list" id="post-list-tab">Post List</a>
            <a href="#member" id="member-tab">Member</a>
            <a href="#info" id="info-tab">Information</a>
            <a href="#faq" id="faq-tab">FAQ</a>
        </div>

        <div class="px-14 items-center w-32">
            <div class="flex items-center gap-3 cursor-pointer text-theme-white hover:text-theme-yellow" id="user">
                <p class="font-semibold flex items-center gap-3">user <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M3 3a1 1 0 00-1 1v12a1 1 0 102 0V4a1 1 0 00-1-1zm10.293 9.293a1 1 0 001.414 1.414l3-3a1 1 0 000-1.414l-3-3a1 1 0 10-1.414 1.414L14.586 9H7a1 1 0 100 2h7.586l-1.293 1.293z" clip-rule="evenodd" />
                </svg></p>
            </div>
            <!--<div class="hidden items-center border border-cyan-700 bg-theme-white justify-center mt-1 w-28 cursor-pointer absolute"
            id="logout">
                <a href="#" class="py-2 flex justify-center gap-2 text-cyan-600 font-semibold hover:text-theme-yellow">Log Out <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M3 3a1 1 0 00-1 1v12a1 1 0 102 0V4a1 1 0 00-1-1zm10.293 9.293a1 1 0 001.414 1.414l3-3a1 1 0 000-1.414l-3-3a1 1 0 10-1.414 1.414L14.586 9H7a1 1 0 100 2h7.586l-1.293 1.293z" clip-rule="evenodd" />
                    </svg>
                </a>
            </div>-->
        </div>
    </header>
    <!--header ends here-->

    <!--content-->
    <div class="flex justify-center items-start text-lg pt-4 w-full">
        <!--<div class="flex flex-col justify-center items-center gap-8 w-64 pt-14 px-2 text-left"></div>-->

        <div class="flex-1 justify-center items-center px-8 pt-20 mt-3">
            <div class="scroll-mt-24" id="home">
                <div class="flex items-center text-left gap-10 px-10 w-full border border-cyan-800 h-28 rounded-md">
                    <img src="{{asset('media/3.png')}}" alt="" class="h-14">
                    <p>You can easily create an explanatory video of the target file.</p>
                </div>
                <div class="flex items-center text-left gap-10 px-10 mt-8 border border-cyan-800 h-28 rounded-md">
                    <img src="{{asset('media/4.png')}}" alt="" class="h-12">
                    <p>This is a list of videos created in the past. From here you can copy the invitation link or send a viewing invitation email directly.</p>
                </div>
                <div class="flex items-center text-left gap-10 px-10 mt-8 w-full border border-cyan-800 h-28 rounded-md">
                    <div>
                        <img src="{{asset('media/5.png')}}" alt="" class="h-14">
                    </div>
                    <p>If you have any questions that cannot be answered by, please contact us from here.</p>
                </div>
            </div>

            <div>
                <div class="mt-96"></div>
                <h2 class="text-2xl font-bold text-cyan-700 scroll-mt-24" id="video-maker">Video Maker</h2>
                <p class="py-8">Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt iste voluptatum, ex sapiente consectetur non modi nihil expedita harum enim. Eum molestiae harum, vero mollitia reprehenderit commodi voluptatum incidunt voluptas? Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt iste voluptatum, ex sapiente consectetur non modi nihil expedita harum enim. Eum molestiae harum, vero mollitia reprehenderit commodi voluptatum incidunt voluptas? Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt iste voluptatum, ex sapiente consectetur non modi nihil expedita harum enim. Eum molestiae harum, vero mollitia reprehenderit commodi voluptatum incidunt voluptas? Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt iste voluptatum, ex sapiente consectetur non modi nihil expedita harum enim. Eum molestiae harum, vero mollitia reprehenderit commodi voluptatum incidunt voluptas? Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt iste voluptatum, ex sapiente consectetur non modi nihil expedita harum enim. Eum molestiae harum, vero mollitia reprehenderit commodi voluptatum incidunt voluptas?</p>
            </div>

            <div>
                <div class="mt-96"></div>
                <h2 class="text-2xl font-bold text-cyan-700 scroll-mt-24" id="post-list">Post List</h2>
                <p class="py-8">Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt iste voluptatum, ex sapiente consectetur non modi nihil expedita harum enim. Eum molestiae harum, vero mollitia reprehenderit commodi voluptatum incidunt voluptas? Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt iste voluptatum, ex sapiente consectetur non modi nihil expedita harum enim. Eum molestiae harum, vero mollitia reprehenderit commodi voluptatum incidunt voluptas? Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt iste voluptatum, ex sapiente consectetur non modi nihil expedita harum enim. Eum molestiae harum, vero mollitia reprehenderit commodi voluptatum incidunt voluptas? Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt iste voluptatum, ex sapiente consectetur non modi nihil expedita harum enim. Eum molestiae harum, vero mollitia reprehenderit commodi voluptatum incidunt voluptas? Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt iste voluptatum, ex sapiente consectetur non modi nihil expedita harum enim. Eum molestiae harum, vero mollitia reprehenderit commodi voluptatum incidunt voluptas?</p>
            </div>

            <div>
                <div class="mt-96"></div>
                <h2 class="text-2xl font-bold text-cyan-700 scroll-mt-24" id="member">Member</h2>
                <p class="py-8">Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt iste voluptatum, ex sapiente consectetur non modi nihil expedita harum enim. Eum molestiae harum, vero mollitia reprehenderit commodi voluptatum incidunt voluptas? Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt iste voluptatum, ex sapiente consectetur non modi nihil expedita harum enim. Eum molestiae harum, vero mollitia reprehenderit commodi voluptatum incidunt voluptas? Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt iste voluptatum, ex sapiente consectetur non modi nihil expedita harum enim. Eum molestiae harum, vero mollitia reprehenderit commodi voluptatum incidunt voluptas? Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt iste voluptatum, ex sapiente consectetur non modi nihil expedita harum enim. Eum molestiae harum, vero mollitia reprehenderit commodi voluptatum incidunt voluptas? Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt iste voluptatum, ex sapiente consectetur non modi nihil expedita harum enim. Eum molestiae harum, vero mollitia reprehenderit commodi voluptatum incidunt voluptas?</p>
            </div>

            <div>
                <div class="mt-96"></div>
                <h2 class="text-2xl font-bold text-cyan-700 scroll-mt-24" id="info">Info</h2>
                <p class="py-8">Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt iste voluptatum, ex sapiente consectetur non modi nihil expedita harum enim. Eum molestiae harum, vero mollitia reprehenderit commodi voluptatum incidunt voluptas? Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt iste voluptatum, ex sapiente consectetur non modi nihil expedita harum enim. Eum molestiae harum, vero mollitia reprehenderit commodi voluptatum incidunt voluptas? Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt iste voluptatum, ex sapiente consectetur non modi nihil expedita harum enim. Eum molestiae harum, vero mollitia reprehenderit commodi voluptatum incidunt voluptas? Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt iste voluptatum, ex sapiente consectetur non modi nihil expedita harum enim. Eum molestiae harum, vero mollitia reprehenderit commodi voluptatum incidunt voluptas? Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt iste voluptatum, ex sapiente consectetur non modi nihil expedita harum enim. Eum molestiae harum, vero mollitia reprehenderit commodi voluptatum incidunt voluptas?</p>
            </div>

            <div>
                <div class="mt-96"></div>
                <h2 class="text-2xl font-bold text-cyan-700 scroll-mt-24" id="faq">FAQ</h2>
                <p class="py-8">Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt iste voluptatum, ex sapiente consectetur non modi nihil expedita harum enim. Eum molestiae harum, vero mollitia reprehenderit commodi voluptatum incidunt voluptas? Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt iste voluptatum, ex sapiente consectetur non modi nihil expedita harum enim. Eum molestiae harum, vero mollitia reprehenderit commodi voluptatum incidunt voluptas? Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt iste voluptatum, ex sapiente consectetur non modi nihil expedita harum enim. Eum molestiae harum, vero mollitia reprehenderit commodi voluptatum incidunt voluptas? Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt iste voluptatum, ex sapiente consectetur non modi nihil expedita harum enim. Eum molestiae harum, vero mollitia reprehenderit commodi voluptatum incidunt voluptas? Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt iste voluptatum, ex sapiente consectetur non modi nihil expedita harum enim. Eum molestiae harum, vero mollitia reprehenderit commodi voluptatum incidunt voluptas?</p>
            </div>

            <div>
                <div class="mt-96"></div>
            </div>
        </div>

        <div class="flex flex-col justify-center items-center gap-8 w-80 pt-14 px-2 text-left">
            <div class="w-full">
                <div class="font-bold text-cyan-600 text-center text-xl pb-2">News</div>
                <div class="border border-cyan-800 rounded-md px-2 py-2">
                    <table class="w-full text-base">
                        <tbody>
                            <tr>
                                <td class="text-xs">2021/10/01</td>
                            </tr>
                            <tr>
                                <td class="border-b border-cyan-800 pb-2">Maintenance Notification</td>
                            </tr>
                            <tr>
                                <td class="text-xs pt-2">2021/01/01</td>
                            </tr>
                            <tr>
                                <td class="border-b border-cyan-800 pb-2">Happy New Year</td>
                            </tr>
                            <tr>
                                <td class="text-xs pt-2">2020/12/24</td>
                            </tr>
                            <tr>
                                <td class="border-b border-cyan-800 pb-2">Merry Christmas</td>
                            </tr>
                            <tr>
                                <td class="text-xs pt-2">2020/10/31</td>
                            </tr>
                            <tr>
                                <td>Happy Halloween</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="w-full">
                <div class="font-bold text-cyan-600 text-center text-xl pb-2">Post History</div>
                <div class="border border-cyan-800 rounded-md px-2 py-2">
                    <table class="w-full text-base">
                        <tbody>
                            <tr>
                                <td class="text-xs">2021/10/01</td>
                            </tr>
                            <tr>
                                <td class="border-b border-cyan-800 pb-2">The test was posted.</td>
                            </tr>
                            <tr>
                                <td class="text-xs pt-2">2021/01/01</td>
                            </tr>
                            <tr>
                                <td class="border-b border-cyan-800 pb-2">A little illegal was deleted by the operation.</td>
                            </tr>
                            <tr>
                                <td class="text-xs pt-2">2020/12/30</td>
                            </tr>
                            <tr>
                                <td>There is a little information about illegality, so please check your email.</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="h-32"></div>
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
    </footer>-->

    <!--scripts-->

    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{asset('js/app.js')}}"></script>

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
                    'theme-orange': '#ff9011',
                }
            }
          }
        }
    </script>

    <script>
        $(document).ready(function(){
            $('#home-tab').addClass('active');
            
            jQuery('#home-tab').on('click', function() {
                $('#home-tab').addClass('active');
                $('#video-maker-tab').removeClass('active');
                $('#post-list-tab').removeClass('active');
                $('#member-tab').removeClass('active');
                $('#info-tab').removeClass('active');
                $('#faq-tab').removeClass('active');
            });

            jQuery('#video-maker-tab').on('click', function() {
                $('#home-tab').removeClass('active');
                $('#video-maker-tab').addClass('active');
                $('#post-list-tab').removeClass('active');
                $('#member-tab').removeClass('active');
                $('#info-tab').removeClass('active');
                $('#faq-tab').removeClass('active');
            });

            jQuery('#post-list-tab').on('click', function() {
                $('#home-tab').removeClass('active');
                $('#video-maker-tab').removeClass('active');
                $('#post-list-tab').addClass('active');
                $('#member-tab').removeClass('active');
                $('#info-tab').removeClass('active');
                $('#faq-tab').removeClass('active');
            });

            jQuery('#member-tab').on('click', function() {
                $('#home-tab').removeClass('active');
                $('#video-maker-tab').removeClass('active');
                $('#post-list-tab').removeClass('active');
                $('#member-tab').addClass('active');
                $('#info-tab').removeClass('active');
                $('#faq-tab').removeClass('active');
            });

            jQuery('#info-tab').on('click', function() {
                $('#home-tab').removeClass('active');
                $('#video-maker-tab').removeClass('active');
                $('#post-list-tab').removeClass('active');
                $('#member-tab').removeClass('active');
                $('#info-tab').addClass('active');
                $('#faq-tab').removeClass('active');
            });

            jQuery('#faq-tab').on('click', function() {
                $('#home-tab').removeClass('active');
                $('#video-maker-tab').removeClass('active');
                $('#post-list-tab').removeClass('active');
                $('#member-tab').removeClass('active');
                $('#info-tab').removeClass('active');
                $('#faq-tab').addClass('active');
            });
        });

        jQuery('#user').on('click', function() {
            $('#logout').toggle();
        });
        
    </script>

    <!--scripts ends here-->

</body>
</html>