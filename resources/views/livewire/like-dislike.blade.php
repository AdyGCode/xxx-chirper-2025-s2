<div class="mt-1">
    <div class="inline-flex rounded-md bg-gray-100 px-2 py-1 space-x-2">
        <div class="flex">
            <a wire:click="like()" class="cursor-pointer">
                <i class="fa-solid fa-thumbs-up"></i>
            </a>
            {{ $likes }}
        </div>
        <div class="flex">
            <a wire:click="dislike()" class="cursor-pointer">
                <i class="fa-solid fa-thumbs-down"></i>
            </a>
            {{ $dislikes }}
        </div>
    </div>
</div>
