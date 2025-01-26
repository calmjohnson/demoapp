@php
    use Illuminate\Support\Str;
    $myIP = $getRecord()->address;
    $ipOctets = explode('.', $myIP);
    $newIp = $ipOctets[0] . '.' . $ipOctets[1] . '.' . preg_replace('/./', 'X', $ipOctets[2]) . '.' . preg_replace('/./', 'X', $ipOctets[3]);
@endphp
<div class="flex flex-col gap-2">
    <div class="flex justify-between items-center">
        <div class="flex items-center space-x-3">
            <!--Status-->
            <span class="relative flex size-3">
                <span 
                    @class([
                        'absolute inline-flex h-full w-full animate-ping rounded-full opacity-75', 
                        'bg-green-400' => $getRecord()->status,
                        'bg-red-400' => ! $getRecord()->status
                        ])></span>
                <span 
                    @class([
                        'relative inline-flex size-3 rounded-full', 
                        'bg-green-500' => $getRecord()->status,
                        'bg-red-500' => ! $getRecord()->status
                        ])></span>
            </span>
            <!--Status-->
            <!--IP-->
            <h1 class="text-xl font-black">{{ $newIp }}</h1>
            <!--IP-->
            <!--Traffic-->
            <div class="flex items-center gap-1 border border-slate-500 rounded-md p-1">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" stroke-width="1.5" 
                    class="size-4" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9.348 14.652a3.75 3.75 0 0 1 0-5.304m5.304 0a3.75 3.75 0 0 1 0 5.304m-7.425 2.121a6.75 6.75 0 0 1 0-9.546m9.546 0a6.75 6.75 0 0 1 0 9.546M5.106 18.894c-3.808-3.807-3.808-9.98 0-13.788m13.788 0c3.808 3.807 3.808 9.98 0 13.788M12 12h.008v.008H12V12Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z"/></svg>
                <span class="text-xs">{{ $getRecord()->traffic < 5 ? 'Very Noisy' : 'Quiet' }}</span>
            </div>
            <!--Traffic-->
        </div>
        <!--Tags-->
        <div class="flex items-center gap-2 text-xs">
            <span class="p-1 rounded-md shadow bg-slate-800 border border-slate-500">Tag5</span>
            <span class="p-1 rounded-md shadow bg-slate-800 border border-slate-500">Tag:554</span>
        </div>
        <!--Tags-->
    </div>
    <!--Status and Time-->
    <div class="flex items-center gap-5">
        <span
            @class([
                'font-medium', 
                'font-green-500' => $getRecord()->status,
                'text-red-500' => ! $getRecord()->status
                ])
        >{{ $getRecord()->status ? 'Good IP' : 'Malicious IP' }}</span>
        <div class="flex items-center gap-1 text-sm">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" stroke-width="1.5" class="size-4" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z"/><path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/></svg>
            <span>{{ $getRecord()->created_at->diffForHumans()}}</span>
        </div>
    </div>
    <!--Status and Time-->
    <!--IP Country and Company-->
    <div class="flex items-center gap-2 text-xs font-medium text-slate-300">
        <span>{{$newIp}}</span>
        <span class="size-1 rounded-full bg-slate-300"></span>
        <span>{{ $getRecord()->country }}</span>
        <img src="https://placehold.co/60x60.png" class="size-6 rounded-full" alt="">
        <span class="size-1 rounded-full bg-slate-300"></span>
        <span>{{ $getRecord()->provider }}</span>
    </div>
    <!--IP Country and Company-->
</div>