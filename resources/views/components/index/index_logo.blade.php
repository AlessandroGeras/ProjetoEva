<html>
<div id="index_logo" class="inline-block -mt-24 w-full h-36 bg-black lg:mt-0 sm:h-48 dark:bg-gray-700">
    <div id="index_login" class="block m-auto center">
        <div class="h4 text-center text-white sm:text-[56px]">Bem vindo ao projeto Eva</div> 

        @guest
        <div class="flex m-auto w-20 text-black p-2 sm:p-4">
            <a class="mx-auto block text-black bg-white"href="{{route('login')}}">
                <div class="text-black text-xs p-1 sm:p-2 sm:text-base">LOGIN</div>
            </a>
        </div>
        @endguest

    </div>
</div>
</html>