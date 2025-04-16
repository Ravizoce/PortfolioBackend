<aside class="flex flex-col md:flex-row">
    <nav>
        <div class="bg-black shadow-xl h-16 bottom-0 fixed md:h-screen w-full md:w-48">
            <div
                class="md:mt-12 md:w-52 md:fixed md:left-0 md:top-0 content-center md:content-start text-left justify-between">
                <ul class="list-reset flex flex-row md:flex-col py-0 md:py-3 px-1 md:px-2 text-center md:text-left">
                    <li class="mr-3 flex-1">
                        <a href="{{ route('dashboard') }}"
                            class="block py-1 md:py-3 pl-1 align-middle text-white no-underline hover:text-white border-b-2 {{ request()->routeIs('dashboard')  ? "border-blue-600" :'border-gray-800 hover:border-pink-600' }}">
                            <i class="fas fa-chart-area pr-0 md:pr-3 "></i>
                            <span class="pb-1 md:pb-0 text-xs md:text-base text-white md:text-white block md:inline-block">
                                Analytics
                            </span>
                        </a>
                    </li>
                    <li class="mr-3 flex-1">
                        <a href="{{route("profile.index")}}"
                            class="block py-1 md:py-3 pl-1 align-middle text-white no-underline hover:text-white border-b-2 {{ request()->routeIs("profile.index") ? "border-blue-600 " :'border-gray-800 hover:border-red-600' }} ">
                            <i class="fas fa-user pr-0 md:pr-3"></i>
                            <span class="pb-1 md:pb-0 text-xs md:text-base text-gray-600 md:text-gray-400 block md:inline-block">
                                Profile
                            </span>
                        </a>
                    </li>
                    <li class="mr-3 flex-1">
                        <a href="{{route("education.index")}}"
                            class="block py-1 md:py-3 pl-1 align-middle text-white no-underline hover:text-white border-b-2 {{ request()->routeIs("skill.index") ? "border-blue-600" :'border-gray-800 hover:border-green-700' }} ">
                            <i class="fas fa-layer-group pr-0 md:pr-2"></i>
                            <span class="pb-1 md:pb-0 text-xs md:text-base text-gray-500 md:text-gray-400 block md:inline-block">
                                Skills
                            </span>
                        </a>
                    </li>
                    <li class="mr-3 flex-1">
                        <a href="{{route("education.index")}}"
                            class="block py-1 md:py-3 pl-1 align-middle text-white no-underline hover:text-white border-b-2 {{ request()->routeIs("education.index") ? "border-blue-600" :'border-gray-800 hover:border-rose-400' }} ">
                            <i class="fas fa-graduation-cap pr-0 md:pr-2"></i>
                            <span class="pb-1 md:pb-0 text-xs md:text-base text-gray-600 md:text-gray-400 block md:inline-block">
                                Education
                            </span>
                        </a>
                    </li>

                    <li class="mr-3 flex-1">
                        <a href="{{route("experience.index")}}"
                            class="block py-1 md:py-3 pl-0 md:pl-1 align-middle text-white no-underline hover:text-white border-b-2 {{ request()->routeIs("experience.index") ? "border-blue-600" :'border-gray-800 hover:border-zinc-500' }} ">
                            <i class="fas fa-briefcase pr-0 md:pr-3"></i>
                            <span class="pb-1 md:pb-0 text-xs md:text-base text-gray-600 md:text-gray-400 block md:inline-block">
                                Experience
                            </span>
                        </a>
                    </li>
                    <li class="mr-3 flex-1">
                        <a href="#"
                            class="block py-1 md:py-3 pl-0 md:pl-1 align-middle text-white no-underline hover:text-white border-b-2 {{ false ? "border-blue-600" :'border-gray-800 hover:border-purple-700' }}">
                            <i class="fa fa-folder-open pr-0 md:pr-3"></i>
                            <span class="pb-1 md:pb-0 text-xs md:text-base text-gray-600 md:text-gray-400 block md:inline-block">
                                Project
                            </span>
                        </a>
                    </li>
                    <li class="mr-3 flex-1">
                        <a href="#"
                            class="block py-1 md:py-3 pl-0 md:pl-1 align-middle text-white no-underline hover:text-white border-b-2 {{ false ? "border-blue-600" :'border-gray-800 hover:border-fuchsia-500' }}">
                            <i class="fa fa-share-alt pr-0 md:pr-3"></i>
                            <span class="pb-1 md:pb-0 text-xs md:text-base text-gray-600 md:text-gray-400 block md:inline-block">
                                Social
                            </span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</aside>