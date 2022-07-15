@extends('authenticated-user.components.layout')
@section('css')
@endsection
@section('head')
    @include('authenticated-user.components.head')
@endsection
@section('content')
    <!--content-->
    <div class="flex justify-center items-start text-lg w-full">
        <!--<div class="flex flex-col justify-center items-center gap-8 w-64 pt-14 px-2 text-left"></div>-->
        <div class="flex flex-col w-3/5">

            <div class="flex-1 justify-center items-center pt-16 mt-3">
                <div class="grid grid-rows-3 justify-center items-center scroll-mt-24 gap-6 w-full" id="home">
                    <div class="flex flex-col items-center text-left pb-10 gap-10 w-full h-full border border-sky-600 rounded-lg">
                        <span class="flex justify-center items-center px-4 py-2 w-full font-semibold text-lg text-white bg-sky-600 rounded-t-md">問合せ1</span>
                        <div class="flex flex-row items-center px-4 gap-4">
                            <img src="{{asset('media/letter-q.png')}}" alt="" class="h-16 w-16">
                            <span>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Voluptatibus minus fugiat perspiciatis nulla sunt deleniti. Iste, aspernatur minus corporis numquam voluptates repudiandae modi quidem alias illum natus eveniet nemo blanditiis.</span>
                        </div>
                        <div class="flex flex-row items-center px-4 gap-4">
                            <img src="{{asset('media/letter-a.png')}}" alt="" class="h-16 w-16">
                            <span>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Voluptatibus minus fugiat perspiciatis nulla sunt deleniti. Iste, aspernatur minus corporis numquam voluptates repudiandae modi quidem alias illum natus eveniet nemo blanditiis.</span>
                        </div>
                    </div>
                    
                    <div class="flex flex-col items-center text-left pb-10 gap-10 w-full h-full border border-sky-600 rounded-lg">
                        <span class="flex justify-center items-center px-4 py-2 w-full font-semibold text-lg text-white bg-sky-600 rounded-t-md">問合せ2</span>
                        <div class="flex flex-row items-center px-4 gap-4">
                            <img src="{{asset('media/letter-q.png')}}" alt="" class="h-16 w-16">
                            <span>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Voluptatibus minus fugiat perspiciatis nulla sunt deleniti. Iste, aspernatur minus corporis numquam voluptates repudiandae modi quidem alias illum natus eveniet nemo blanditiis.</span>
                        </div>
                        <div class="flex flex-row items-center px-4 gap-4">
                            <img src="{{asset('media/letter-a.png')}}" alt="" class="h-16 w-16">
                            <span>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Voluptatibus minus fugiat perspiciatis nulla sunt deleniti. Iste, aspernatur minus corporis numquam voluptates repudiandae modi quidem alias illum natus eveniet nemo blanditiis.</span>
                        </div>
                    </div>

                    <div class="flex flex-col items-center text-left pb-10 gap-10 w-full h-full border border-sky-600 rounded-lg">
                        <span class="flex justify-center items-center px-4 py-2 w-full font-semibold text-lg text-white bg-sky-600 rounded-t-md">問合せ3</span>
                        <div class="flex flex-row items-center px-4 gap-4">
                            <img src="{{asset('media/letter-q.png')}}" alt="" class="h-16 w-16">
                            <span>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Voluptatibus minus fugiat perspiciatis nulla sunt deleniti. Iste, aspernatur minus corporis numquam voluptates repudiandae modi quidem alias illum natus eveniet nemo blanditiis.</span>
                        </div>
                        <div class="flex flex-row items-center px-4 gap-4">
                            <img src="{{asset('media/letter-a.png')}}" alt="" class="h-16 w-16">
                            <span>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Voluptatibus minus fugiat perspiciatis nulla sunt deleniti. Iste, aspernatur minus corporis numquam voluptates repudiandae modi quidem alias illum natus eveniet nemo blanditiis.</span>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>

    <div class="h-32"></div>
    <!--content ends here-->
@endsection
@section('foot')
    @include('authenticated-user.components.foot')
@endsection
@section('js')
    <script>
        tailwind.config = {
          theme: {
            extend: {
                colors: {
                    transparent: 'transparent',
                    current: 'currentColor',
                    'theme-white': '#ffffff',
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
        
        $(document).ready(function(){
            $('#faq-tab').addClass('active');
        });

    </script>

    <!--scripts ends here-->
@endsection
