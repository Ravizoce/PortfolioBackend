@extends("layouts.base")
@section("contents")

<x-PageTitle pageTitle="dashboard"/>

<div class="flex flex-wrap">
    <div class="w-full md:w-1/2 xl:w-1/3 p-6">
        <!--Metric Card-->
        <div class="bg-gradient-to-b from-green-200 to-green-100 border-b-4 border-green-600 rounded-lg shadow-xl p-5">
            <div class="flex flex-row items-center">
                <div class="flex-shrink pr-4">
                    <div class="rounded-full p-5 bg-green-600"><i class="fa fa-wallet fa-2x fa-inverse"></i></div>
                </div>
                <div class="flex-1 text-right md:text-center">
                    <h5 class="font-bold uppercase text-gray-600">Total Revenue</h5>
                    <h3 class="font-bold text-3xl">$3249 <span class="text-green-500"><i
                                class="fas fa-caret-up"></i></span></h3>
                </div>
            </div>
        </div>
        <!--/Metric Card-->
    </div>
    <div class="w-full md:w-1/2 xl:w-1/3 p-6">
        <!--Metric Card-->
        <div class="bg-gradient-to-b from-pink-200 to-pink-100 border-b-4 border-pink-500 rounded-lg shadow-xl p-5">
            <div class="flex flex-row items-center">
                <div class="flex-shrink pr-4">
                    <div class="rounded-full p-5 bg-pink-600"><i class="fas fa-users fa-2x fa-inverse"></i></div>
                </div>
                <div class="flex-1 text-right md:text-center">
                    <h5 class="font-bold uppercase text-gray-600">Total Users</h5>
                    <h3 class="font-bold text-3xl">249 <span class="text-pink-500"><i
                                class="fas fa-exchange-alt"></i></span></h3>
                </div>
            </div>
        </div>
        <!--/Metric Card-->
    </div>
    <div class="w-full md:w-1/2 xl:w-1/3 p-6">
        <!--Metric Card-->
        <div
            class="bg-gradient-to-b from-yellow-200 to-yellow-100 border-b-4 border-yellow-600 rounded-lg shadow-xl p-5">
            <div class="flex flex-row items-center">
                <div class="flex-shrink pr-4">
                    <div class="rounded-full p-5 bg-yellow-600"><i class="fas fa-user-plus fa-2x fa-inverse"></i></div>
                </div>
                <div class="flex-1 text-right md:text-center">
                    <h5 class="font-bold uppercase text-gray-600">New Users</h5>
                    <h3 class="font-bold text-3xl">2 <span class="text-yellow-600"><i
                                class="fas fa-caret-up"></i></span></h3>
                </div>
            </div>
        </div>
        <!--/Metric Card-->
    </div>
    <div class="w-full md:w-1/2 xl:w-1/3 p-6">
        <!--Metric Card-->
        <div class="bg-gradient-to-b from-blue-200 to-blue-100 border-b-4 border-blue-500 rounded-lg shadow-xl p-5">
            <div class="flex flex-row items-center">
                <div class="flex-shrink pr-4">
                    <div class="rounded-full p-5 bg-blue-600"><i class="fas fa-server fa-2x fa-inverse"></i></div>
                </div>
                <div class="flex-1 text-right md:text-center">
                    <h5 class="font-bold uppercase text-gray-600">Server Uptime</h5>
                    <h3 class="font-bold text-3xl">152 days</h3>
                </div>
            </div>
        </div>
        <!--/Metric Card-->
    </div>
    <div class="w-full md:w-1/2 xl:w-1/3 p-6">
        <!--Metric Card-->
        <div
            class="bg-gradient-to-b from-indigo-200 to-indigo-100 border-b-4 border-indigo-500 rounded-lg shadow-xl p-5">
            <div class="flex flex-row items-center">
                <div class="flex-shrink pr-4">
                    <div class="rounded-full p-5 bg-indigo-600"><i class="fas fa-tasks fa-2x fa-inverse"></i></div>
                </div>
                <div class="flex-1 text-right md:text-center">
                    <h5 class="font-bold uppercase text-gray-600">To Do List</h5>
                    <h3 class="font-bold text-3xl">7 tasks</h3>
                </div>
            </div>
        </div>
        <!--/Metric Card-->
    </div>
</div>


<div class="flex flex-row flex-wrap flex-grow mt-2">
    <div class="w-full md:w-1/2 xl:w-1/3 p-6">
        <!--Table Card-->
        <div class="bg-white border-transparent rounded-lg shadow-xl">
            <div
                class="bg-gradient-to-b from-gray-300 to-gray-100 uppercase text-gray-800 border-b-2 border-gray-300 rounded-tl-lg rounded-tr-lg p-2">
                <h5 class="font-bold uppercase text-gray-600">Graph</h5>
            </div>
            <div class="p-5">
                <table class="w-full p-5 text-gray-700">
                    <thead>
                        <tr>
                            <th class="text-left text-blue-900">Name</th>
                            <th class="text-left text-blue-900">Side</th>
                            <th class="text-left text-blue-900">Role</th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr>
                            <td>Obi Wan Kenobi</td>
                            <td>Light</td>
                            <td>Jedi</td>
                        </tr>
                        <tr>
                            <td>Greedo</td>
                            <td>South</td>
                            <td>Scumbag</td>
                        </tr>
                        <tr>
                            <td>Darth Vader</td>
                            <td>Dark</td>
                            <td>Sith</td>
                        </tr>
                    </tbody>
                </table>

                <p class="py-2"><a href="#">See More issues...</a></p>

            </div>
        </div>
        <!--/table Card-->
    </div>

    <div class="w-full md:w-1/2 xl:w-1/3 p-6">
        <!--Advert Card-->
        <div class="bg-white border-transparent rounded-lg shadow-xl">
            <div
                class="bg-gradient-to-b from-gray-300 to-gray-100 uppercase text-gray-800 border-b-2 border-gray-300 rounded-tl-lg rounded-tr-lg p-2">
                <h5 class="font-bold uppercase text-gray-600">Advert</h5>
            </div>
            <div class="p-5 text-center">


                <script async type="text/javascript"
                    src="//cdn.carbonads.com/carbon.js?serve=CK7D52JJ&placement=wwwtailwindtoolboxcom"
                    id="_carbonads_js"></script>


            </div>
        </div>
        <!--/Advert Card-->
    </div>


</div>
<div>
    <p class="px-6 font-bold text-gray-600">Distributed By: <a href="https://themewagon.com/"
            target="_blank">ThemeWagon</a></p>
</div>
</div>

@endsection