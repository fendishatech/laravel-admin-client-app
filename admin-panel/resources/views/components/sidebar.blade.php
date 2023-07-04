<div class="sidebar py-4">
    <h2 class="text-white px-6 py-2 bg-green-600 font-bold mb-4">{{ $title }}</h2>
    <ul>
        <li
            class="py-2 text-white flex items-center justify-start px-6 hover:text-slate-900 hover:bg-gray-100 hover:rounded-l-[18px]">
            <a href="/home" class="w-full">Home</a>
        </li>
        <li
            class="py-2 text-white flex items-center justify-start px-6 hover:text-gray-900 hover:bg-gray-100 hover:rounded-l-[18px]">
            <a href="/users" class="w-full">Users</a>
        </li>
        {{-- <li class="{{ $isActive('/contact') ? 'active' : '' }}"><a href="/contact">Contact</a></li> --}}
    </ul>
    <!-- Sidebar content here -->
</div>
