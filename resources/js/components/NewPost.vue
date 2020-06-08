<template>
    <div class="bg-white w-2/3 p-4 rounded-md shadow">
        <div class="flex items-center justify-between">
            <div id="user-image" class="w-8">
                <img src="https://widgetwhats.com/app/uploads/2019/11/free-profile-photo-whatsapp-4.png" alt="user-image" class="w-10 h-10 object-cover rounded-full">
            </div>
            <div class="flex-1 mx-4">
                <input type="text" name="body" 
                    class="pl-4 bg-gray-200 w-full rounded-md h-10 focus:outline-none text-sm" placeholder="Add a post">
            </div>
            <button class="w-10 h-10 bg-gray-200 rounded-full flex items-center justify-center focus:outline-none">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="fill-current w-6 h-6"><path d="M21.8 4H2.2c-.2 0-.3.2-.3.3v15.3c0 .3.1.4.3.4h19.6c.2 0 .3-.1.3-.3V4.3c0-.1-.1-.3-.3-.3zm-1.6 13.4l-4.4-4.6c0-.1-.1-.1-.2 0l-3.1 2.7-3.9-4.8h-.1s-.1 0-.1.1L3.8 17V6h16.4v11.4zm-4.9-6.8c.9 0 1.6-.7 1.6-1.6 0-.9-.7-1.6-1.6-1.6-.9 0-1.6.7-1.6 1.6.1.9.8 1.6 1.6 1.6z"/></svg>
            </button>
        </div>

    </div>
</template>

<script>
export default {
    
}
</script>