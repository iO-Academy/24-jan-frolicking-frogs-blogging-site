<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Blog - Example Title</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="selection:bg-teal-200">
<nav class="flex justify-between items-center py-5 px-4 mb-10 border-b border-solid">
    <a href="index.php"><h1 class="text-5xl">Blog</h1></a>
    <div class="flex gap-5">
        <a href="addPost.php">Create Post</a>
        <a href="login.php">Login</a>
        <a href="register.php">Register</a>
    </div>
</nav>

<section class="container md:w-1/2 mx-auto">
    <article class="p-8 border border-solid rounded-md">
        <span class="px-3 py-2 bg bg-rose-600 inline-block mb-4 rounded-sm">Controversial</span>
        <span class="px-3 py-2 bg bg-slate-200 inline-block mb-4 rounded-sm">Gaming</span>
        <div class="flex justify-between items-center flex-col md:flex-row mb-4">
            <h2 class="text-4xl">Example title</h2>
            <span class="text-xl">100 likes - 50 dislikes</span>
        </div>
        <p class="text-2xl mb-10">01/01/2024 - By Bob</p>
        <p>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum tristique lorem sit amet mi scelerisque, eu imperdiet tortor lobortis. Nunc accumsan felis at arcu pellentesque vehicula. Mauris blandit ante eu urna sagittis, sed iaculis est pellentesque. Sed porttitor, tortor eu consequat venenatis, lectus sem mollis libero, ut aliquam diam lorem eu quam. Morbi viverra efficitur orci, pretium tincidunt dolor porttitor luctus. Suspendisse potenti. Proin in tortor ut enim blandit sollicitudin. Duis et sem varius, faucibus eros quis, bibendum nulla.<br />
            Phasellus nisl elit, scelerisque vel arcu nec, scelerisque cursus mauris. Pellentesque congue sed libero sit amet feugiat. Donec quis ipsum rutrum augue pharetra efficitur eget a nunc. Praesent convallis leo euismod blandit dictum. Proin congue, ligula id consequat vestibulum, augue metus lacinia sem, in malesuada enim mauris nec est. Donec mauris diam, sodales vitae rutrum sit amet, molestie auctor nunc. Nullam et nunc eu diam aliquet faucibus. Nulla commodo feugiat lectus nec eleifend.<br />
            Nulla vel porta nisi. Integer vel sem turpis. Integer porta, tellus sit amet maximus vulputate, enim libero interdum nulla, pellentesque consequat nulla nulla vitae magna. Ut nec felis non lectus ornare placerat. Nam tincidunt facilisis odio, eu maximus tortor tristique ut. Donec sagittis at dolor a malesuada. Sed vitae egestas enim. Proin pretium id diam id faucibus. Donec molestie velit id interdum molestie. Ut fermentum ligula nec ipsum venenatis vehicula. Curabitur massa felis, pellentesque a congue quis, eleifend a mi. Fusce sagittis justo a sapien rhoncus scelerisque. Sed tempor mauris vel elementum dapibus. Aliquam non luctus elit. Donec efficitur maximus aliquet.
        </p>
        <div class="flex justify-center gap-5">
            <a class="px-3 py-2 mt-4 text-lg bg-green-300 hover:bg-green-400 hover:text-white transition inline-block rounded-sm" href="#">Like</a>
            <a class="px-3 py-2 mt-4 text-lg bg-red-300 hover:bg-red-400 hover:text-white transition inline-block rounded-sm" href="#">Dislike</a>
        </div>
        <div class="flex justify-center">
            <a class="px-3 py-2 mt-4 text-lg bg-indigo-400 hover:bg-indigo-700 hover:text-white transition inline-block rounded-sm" href="index.php">View all posts</a>
        </div>
    </article>
</section>

<section class="container md:w-1/2 mx-auto mt-5">
    <form class="p-8 border border-solid rounded-md bg-slate-200">
        <div class="mb-5">
            <label class="mb-3 block" for="content">Comment:</label>
            <textarea class="w-full" id="content" rows="5"></textarea>
        </div>

        <input class="px-3 py-2 mt-4 text-lg bg-indigo-400 hover:bg-indigo-700 hover:text-white transition inline-block rounded-sm" type="submit" value="Post Comment" />
    </form>
</section>

<section class="container md:w-1/2 mx-auto mt-5 mb-10">
    <div class="p-8 border border-solid rounded-md bg-slate-200">
        <div class="text-2xl mb-3">Steve Smith - 01/01/2024</div>
        <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum tristique lorem sit amet mi scelerisque, eu imperdiet tortor lobortis.</p>
    </div>
</section>

</body>
</html>